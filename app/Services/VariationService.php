<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationAttribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VariationService
{
    /**
     * Replace ALL variations for a product with the given set.
     *
     * Input shape:
     * [
     *   'attributes' => ['Size', 'Color'],   // optional, ordered; controls tree output order
     *   'variations' => [
     *       ['sku' => '...', 'price' => 100, 'quantity' => 15, 'options' => ['Size' => 'M', 'Color' => 'Red']],
     *   ],
     * ]
     */
    public function replace(Product $product, array $payload): array
    {
        return DB::transaction(function () use ($product, $payload) {
            $variations = $payload['variations'] ?? [];
            $this->validateUniqueCombos($variations);

            // Wipe old
            $oldIds = $product->variations()->pluck('id');
            ProductVariationAttribute::whereIn('product_variation_id', $oldIds)->delete();
            ProductVariation::whereIn('id', $oldIds)->delete();

            $attributeCache = [];

            foreach ($variations as $i => $v) {
                $variation = $product->variations()->create([
                    'sku'       => $v['sku'] ?? $this->autoSku($product, $v['options'] ?? []),
                    'price'     => $v['price']    ?? 0,
                    'quantity'  => $v['quantity'] ?? 0,
                    'is_active' => $v['is_active'] ?? true,
                ]);

                foreach (($v['options'] ?? []) as $attrName => $value) {
                    $attrId = $this->resolveAttributeId($attrName, $attributeCache);
                    $variation->attributes()->create([
                        'attribute_id' => $attrId,
                        'value'        => (string) $value,
                    ]);
                }
            }

            $order = $payload['attributes'] ?? null;
            return [
                'flat' => $this->flatList($product),
                'tree' => $this->buildTree($product, $order),
            ];
        });
    }

    /**
     * Update or create one variation by SKU (or by id).
     */
    public function upsert(Product $product, array $data): ProductVariation
    {
        return DB::transaction(function () use ($product, $data) {
            $variation = isset($data['id'])
                ? $product->variations()->findOrFail($data['id'])
                : $product->variations()->firstOrNew(['sku' => $data['sku'] ?? null]);

            $variation->fill([
                'sku'       => $data['sku']       ?? $variation->sku ?? $this->autoSku($product, $data['options'] ?? []),
                'price'     => $data['price']     ?? $variation->price ?? 0,
                'quantity'  => $data['quantity']  ?? $variation->quantity ?? 0,
                'is_active' => $data['is_active'] ?? $variation->is_active ?? true,
            ])->product()->associate($product)->save();

            if (array_key_exists('options', $data)) {
                $variation->attributes()->delete();
                $cache = [];
                foreach ($data['options'] as $name => $value) {
                    $variation->attributes()->create([
                        'attribute_id' => $this->resolveAttributeId($name, $cache),
                        'value'        => (string) $value,
                    ]);
                }
            }

            return $variation->load('attributes.attribute');
        });
    }

    public function delete(Product $product, int $variationId): void
    {
        $variation = $product->variations()->findOrFail($variationId);
        DB::transaction(function () use ($variation) {
            $variation->attributes()->delete();
            $variation->delete();
        });
    }

    /**
     * Flat list for API responses.
     */
    public function flatList(Product $product): array
    {
        return $product->variations()
            ->with('attributes.attribute')
            ->get()
            ->map(fn ($v) => [
                'id'        => $v->id,
                'sku'       => $v->sku,
                'price'     => $v->price,
                'quantity'  => $v->quantity,
                'is_active' => (bool) $v->is_active,
                'options'   => $v->attributes->mapWithKeys(fn ($a) => [
                    optional($a->attribute)->name_en ?? "attr_{$a->attribute_id}" => $a->value,
                ])->toArray(),
            ])
            ->values()
            ->toArray();
    }

    /**
     * Tree representation built on read by grouping flat variations.
     * $order: optional array of attribute names defining the nesting order.
     */
    public function buildTree(Product $product, ?array $order = null): array
    {
        $variations = $this->flatList($product);
        if (empty($variations)) return [];

        // Infer order if not provided: first variation's option keys, then any extras
        if (!$order) {
            $order = array_keys($variations[0]['options'] ?? []);
            foreach ($variations as $v) {
                foreach (array_keys($v['options']) as $k) {
                    if (!in_array($k, $order, true)) $order[] = $k;
                }
            }
        }

        return $this->groupByLevel($variations, $order, 0);
    }

    private function groupByLevel(array $variations, array $order, int $level): array
    {
        if ($level >= count($order)) {
            return array_map(fn ($v) => [
                'leaf'      => true,
                'id'        => $v['id'],
                'sku'       => $v['sku'],
                'price'     => $v['price'],
                'quantity'  => $v['quantity'],
                'is_active' => $v['is_active'],
            ], $variations);
        }

        $attr = $order[$level];
        $groups = [];
        foreach ($variations as $v) {
            $value = $v['options'][$attr] ?? null;
            $groups[$value][] = $v;
        }

        $out = [];
        foreach ($groups as $value => $members) {
            $children = $this->groupByLevel($members, $order, $level + 1);
            $node = [
                'attribute_name' => $attr,
                'value'          => $value,
            ];
            // If next level produced leaves (single-row groups), inline them
            if ($level + 1 >= count($order) && count($members) === 1) {
                $leaf = $children[0];
                $node += [
                    'id'       => $leaf['id'],
                    'sku'      => $leaf['sku'],
                    'price'    => $leaf['price'],
                    'quantity' => $leaf['quantity'],
                ];
            } else {
                $node['children'] = $children;
            }
            $out[] = $node;
        }
        return $out;
    }

    private function resolveAttributeId(string $name, array &$cache): int
    {
        $key = mb_strtolower(trim($name));
        if (isset($cache[$key])) return $cache[$key];

        $attr = Attribute::where('name_en', $name)
            ->orWhere('name_ar', $name)
            ->first();

        if (!$attr) {
            $attr = Attribute::create([
                'name_en' => $name,
                'name_ar' => $name,
                'enable'  => 1,
            ]);
        }
        return $cache[$key] = $attr->id;
    }

    private function autoSku(Product $product, array $options): string
    {
        $parts = ['P' . $product->id];
        foreach ($options as $v) {
            $parts[] = Str::upper(Str::slug((string) $v, ''));
        }
        $base = implode('-', array_filter($parts));
        $sku  = $base;
        $i    = 1;
        while (ProductVariation::where('sku', $sku)->exists()) {
            $sku = $base . '-' . (++$i);
        }
        return $sku;
    }

    private function validateUniqueCombos(array $variations): void
    {
        $seen = [];
        foreach ($variations as $i => $v) {
            $opts = $v['options'] ?? [];
            ksort($opts);
            $sig = json_encode($opts);
            if (isset($seen[$sig])) {
                abort(422, "Duplicate option combination at index $i: $sig");
            }
            $seen[$sig] = true;
        }
    }
}
