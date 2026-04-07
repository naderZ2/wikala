<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Seller,Category,Product,City};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Seller\{StoreRequest,EditRequest};

class SellerController extends Controller
{
    public function index(Request $request){
        $this->lang();
        $status = $request->get('status', 'all');

        $query = Seller::with("categories:id,$this->name")->whereNull('parent_id');

        if ($status === 'pending') {
            $query->where('active', 0);
        } elseif ($status === 'active') {
            $query->where('active', 1);
        }

        $sellers = $query->orderBy('created_at', 'desc')->get();

        // Counts for tabs
        $allCount = Seller::count();
        $pendingCount = Seller::where('active', 0)->count();
        $activeCount = Seller::where('active', 1)->count();

        return view('admin.seller.index', compact('sellers', 'status', 'allCount', 'pendingCount', 'activeCount'));
    }

    public function create(){
        $this->lang();
        // $categories=Category::whereNull('parent_id')->get(['id',$this->name]);
               $categories=Category::whereNotNull('parent_id')
        ->with("parent:id,$this->name")
        ->get(['id',$this->name,'parent_id']);
        $cities=City::whereNotNull('parent_id')->get(['id',$this->name]);
        return view('admin.seller.add',compact('categories','cities'));
    }

    public function store(StoreRequest $request){
        $seller = Seller::create($request->validated());
        $seller->categories()->sync($request->categories);
        $seller->cities()->sync($request->cities);
        return  to_route('seller.index')->with('success',trans('lang.created')); 
    }

    public function edit($id){
        $this->lang();
        $seller=Seller::find($id);
        $categories=Category::whereNotNull('parent_id')
        ->with("parent:id,$this->name")
        ->get(['id',$this->name,'parent_id']);
        $cities=City::whereNotNull('parent_id')->get(['id',$this->name]);
        $sellerCategories=$seller->categories->pluck('pivot.category_id');
        $sellerCities=$seller->cities->pluck('pivot.city_id');
        return view('admin.seller.edit',compact('categories','seller','sellerCategories','cities','sellerCities'));
    }
    
    public function update(EditRequest $request,$id){
        $seller=Seller::find($id);
        $seller->update($request->validated());
        $seller->categories()->sync($request->categories);
        $seller->cities()->sync($request->cities);
        return  to_route('seller.index')->with('success',trans('lang.updated')); 
    }

    public function changeActivityStatus(Request $request){
        $id=$request->id;
        $seller=Seller::find($id);
        $status = $seller->active == 0 ?1:0;
        $seller->active=$status;
        $seller->save();
        Product::whereSellerId($id)->update(['is_available' => $status]);
        return  to_route('seller.index')->with('success',trans('lang.updated')); 
    }
    public function deliveryOptions($id) {
        $this->lang();
        $seller = Seller::findOrFail($id);
        $cities = City::whereNull('parent_id')->with('regions')->get();
        // $sellerAreas = \DB::table('city_seller')
        $sellerAreas = \Illuminate\Support\Facades\DB::table('city_seller')
            ->where('seller_id', $seller->id)
            ->get()
            ->keyBy(function ($item) {
                return $item->city_id . '_' . ($item->region_id ?? 0);
            });
            
        return view('admin.seller.delivery', compact('seller', 'cities', 'sellerAreas'));
    }

    public function updateDeliveryOptions(Request $request, $id) {
        $seller = Seller::findOrFail($id);
        
        $deliveryData = $request->input('delivery', []);
        
        // Remove old delivery options
        \Illuminate\Support\Facades\DB::table('city_seller')->where('seller_id', $seller->id)->delete();
        
        $insertData = [];
        foreach ($deliveryData as $cityId => $regions) {
            foreach ($regions as $regionId => $options) {
                if (isset($options['active']) && $options['active'] == 1) {
                    $insertData[] = [
                        'seller_id' => $seller->id,
                        'city_id' => $cityId,
                        'region_id' => $regionId == '0' ? null : $regionId,
                        'delivery_price' => $options['price'] ?? 0,
                        'active' => 1,
                    ];
                }
            }
        }
        
        if (!empty($insertData)) {
            \Illuminate\Support\Facades\DB::table('city_seller')->insert($insertData);
        }
        
        return to_route('seller.index')->with('success', trans('lang.updated')); 
    }
}
