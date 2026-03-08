<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Traits\ResponsesTrait;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    use ResponsesTrait;

    public function index()
    {
        $this->lang();
        $nameCol = app()->getLocale() == 'en' || request()->header('Lang') == 'en' ? 'name_en' : 'name_ar';

        $sellers = Seller::where('active', 1)
            ->withAvg('reviews', 'rating')
            ->with(['products' => function($q) use ($nameCol) {
                $q->where('is_available', 1)->latest()
                    ->with([
                        "category" => function($cq) use ($nameCol) {
                            $cq->select('id', "$nameCol as name");
                        },
                        "attributes.attribute"
                    ])
                    ->select('id', 'seller_id', $this->name, $this->description, $this->title, 'price', 'old_price', 'main_image', 'serving', 'category_id');
            }])
            ->get()
            ->map(function($seller){
                $seller->rate = round($seller->reviews_avg_rating ?? 0, 1);
                $seller->image = $seller->img_path;
                $seller->description = $seller->about ?? $seller->details;
                return $seller;
            });
        return $this->success($sellers);
    }

    public function show($id)
    {
        $this->lang();
        $nameCol = app()->getLocale() == 'en' || request()->header('Lang') == 'en' ? 'name_en' : 'name_ar';

        $seller = Seller::where('id', $id)
            ->where('active', 1)
            ->with(['products' => function($q) use ($nameCol) {
                $q->where('is_available', 1)->latest()
                  ->with([
                      "category" => function($cq) use ($nameCol) {
                          $cq->select('id', "$nameCol as name");
                      },
                      "attributes.attribute"
                  ])
                  ->select('id', 'seller_id', $this->name, $this->description, $this->title, 'price', 'old_price', 'main_image', 'serving', 'category_id');
            }])
            ->withAvg('reviews', 'rating')
            ->first();

        if (!$seller) {
            return $this->fail('Seller not found or inactive');
        }

        $seller->rate = round($seller->reviews_avg_rating ?? 0, 1);
        $seller->image = $seller->img_path;
        $seller->description = $seller->about ?? $seller->details;

        return $this->success($seller);
    }
}
