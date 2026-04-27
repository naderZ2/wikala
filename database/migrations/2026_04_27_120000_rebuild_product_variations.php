<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::transaction(function () {
            // 1) Drop old broken FK on product_variation_attributes.attribute_id
            $fk = $this->findFk('product_variation_attributes', 'attribute_id');
            if ($fk) {
                Schema::table('product_variation_attributes', function (Blueprint $t) use ($fk) {
                    $t->dropForeign($fk);
                });
            }

            // 2) Normalize existing tree rows that used attribute_id = 0 with "Name:Value"
            $hackRows = DB::table('product_variation_attributes')
                ->where('attribute_id', 0)
                ->where('value', 'like', '%:%')
                ->get(['id', 'value']);

            foreach ($hackRows as $row) {
                [$name, $val] = array_pad(explode(':', $row->value, 2), 2, null);
                if (!$name || $val === null) continue;

                $attr = DB::table('attributes')
                    ->where('name_en', $name)->orWhere('name_ar', $name)
                    ->first(['id']);

                if (!$attr) {
                    $attrId = DB::table('attributes')->insertGetId([
                        'name_en'    => $name,
                        'name_ar'    => $name,
                        'enable'     => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    $attrId = $attr->id;
                }

                DB::table('product_variation_attributes')
                    ->where('id', $row->id)
                    ->update(['attribute_id' => $attrId, 'value' => $val]);
            }

            // 3) Re-add the FK now that data is clean
            Schema::table('product_variation_attributes', function (Blueprint $t) {
                $t->foreign('attribute_id')
                  ->references('id')->on('attributes')
                  ->cascadeOnDelete();
            });

            // 4) Flatten the tree: collapse leaf nodes and drop parent_id.
            //    For each leaf variation, copy its parents' attributes onto it,
            //    then delete the inner (non-leaf) variations.
            if (Schema::hasColumn('product_variations', 'parent_id')) {
                $this->flattenTreeIntoLeaves();

                // Drop FK + column
                $parentFk = $this->findFk('product_variations', 'parent_id');
                Schema::table('product_variations', function (Blueprint $t) use ($parentFk) {
                    if ($parentFk) $t->dropForeign($parentFk);
                    $t->dropColumn('parent_id');
                });
            }

            // 5) Indexes / constraints
            Schema::table('product_variations', function (Blueprint $t) {
                if (!$this->hasIndex('product_variations', 'product_variations_sku_unique')) {
                    $t->unique('sku');
                }
                if (!Schema::hasColumn('product_variations', 'is_active')) {
                    $t->boolean('is_active')->default(true)->after('quantity');
                }
            });

            Schema::table('product_variation_attributes', function (Blueprint $t) {
                if (!$this->hasIndex('product_variation_attributes', 'pva_variation_attribute_unique')) {
                    $t->unique(['product_variation_id', 'attribute_id'], 'pva_variation_attribute_unique');
                }
            });
        });
    }

    public function down(): void
    {
        Schema::table('product_variation_attributes', function (Blueprint $t) {
            if ($this->hasIndex('product_variation_attributes', 'pva_variation_attribute_unique')) {
                $t->dropUnique('pva_variation_attribute_unique');
            }
        });

        Schema::table('product_variations', function (Blueprint $t) {
            if ($this->hasIndex('product_variations', 'product_variations_sku_unique')) {
                $t->dropUnique('product_variations_sku_unique');
            }
            if (Schema::hasColumn('product_variations', 'is_active')) {
                $t->dropColumn('is_active');
            }
            $t->unsignedBigInteger('parent_id')->nullable()->after('product_id');
            $t->foreign('parent_id')->references('id')->on('product_variations')->cascadeOnDelete();
        });
    }

    /* ---------- helpers ---------- */

    private function findFk(string $table, string $column): ?string
    {
        $row = DB::selectOne(
            "SELECT CONSTRAINT_NAME AS name
             FROM information_schema.KEY_COLUMN_USAGE
             WHERE TABLE_SCHEMA = DATABASE()
               AND TABLE_NAME = ?
               AND COLUMN_NAME = ?
               AND REFERENCED_TABLE_NAME IS NOT NULL
             LIMIT 1",
            [$table, $column]
        );
        return $row->name ?? null;
    }

    private function hasIndex(string $table, string $index): bool
    {
        $row = DB::selectOne(
            "SELECT 1 AS x FROM information_schema.STATISTICS
             WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND INDEX_NAME = ?
             LIMIT 1",
            [$table, $index]
        );
        return (bool) $row;
    }

    private function flattenTreeIntoLeaves(): void
    {
        $byProduct = DB::table('product_variations')
            ->select('id', 'product_id', 'parent_id', 'price', 'quantity', 'sku')
            ->get()
            ->groupBy('product_id');

        foreach ($byProduct as $productId => $rows) {
            $rowsById  = $rows->keyBy('id');
            $childIds  = $rows->pluck('parent_id')->filter()->unique()->values();
            $isParent  = $childIds->flip();

            // Leaves = nodes that no other row references as parent
            foreach ($rows as $row) {
                if (isset($isParent[$row->id])) continue; // skip inner nodes

                // Walk up to root collecting attribute rows
                $chain = [$row->id];
                $cur   = $row;
                while ($cur->parent_id && isset($rowsById[$cur->parent_id])) {
                    $cur = $rowsById[$cur->parent_id];
                    $chain[] = $cur->id;
                }

                // Reassign all parent attribute rows to this leaf
                DB::table('product_variation_attributes')
                    ->whereIn('product_variation_id', $chain)
                    ->where('product_variation_id', '!=', $row->id)
                    ->update(['product_variation_id' => $row->id]);
            }

            // Delete inner variations
            $innerIds = $rows->whereNotNull('parent_id')->pluck('id')->all();
            if (!empty($innerIds)) {
                $leafIds = $rows->reject(fn ($r) => isset($isParent[$r->id]))->pluck('id')->all();
                $toDelete = array_values(array_diff($rows->pluck('id')->all(), $leafIds));
                if ($toDelete) {
                    DB::table('product_variations')->whereIn('id', $toDelete)->delete();
                }
            }
        }
    }
};
