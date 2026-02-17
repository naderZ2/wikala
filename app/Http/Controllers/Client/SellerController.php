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
        $sellers = Seller::where('active', 1)
            ->withAvg('reviews', 'rating')
            ->with(['products' => function($q){
                $q->where('is_available', 1)->latest()
                  ->with(["category:id,$this->name", "attributes.attribute"])
                  ->select('id', $this->name, $this->description, $this->title, 'price', 'old_price', 'main_image', 'serving', 'category_id');
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
        $seller = Seller::where('id', $id)
            ->where('active', 1)
            ->with(['products' => function($q){
                $q->where('is_available', 1)->latest()
                  ->with(["category:id,$this->name", "attributes.attribute"])
                  ->select('id', $this->name, $this->description, $this->title, 'price', 'old_price', 'main_image', 'serving', 'category_id');
            }])
            ->withAvg('reviews', 'rating')
            ->first();
        dd($sellers);

        if (!$seller) {
            return $this->fail('Seller not found or inactive');
        }

        $seller->rate = round($seller->reviews_avg_rating ?? 0, 1);
        $seller->image = $seller->img_path; 
        $seller->description = $seller->about ?? $seller->details;

        return $this->success($seller);
    }
}
