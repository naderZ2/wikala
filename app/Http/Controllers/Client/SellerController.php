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
            ->get()
            ->map(function($seller){
                $seller->rate = 5; // Placeholder rating
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
                $q->where('is_available', 1)->latest();
            }])
            ->first();

        if (!$seller) {
            return $this->fail('Seller not found or inactive');
        }

        $seller->rate = 5; // Placeholder rating
        $seller->image = $seller->img_path; 
        $seller->description = $seller->about ?? $seller->details;

        return $this->success($seller);
    }
}
