<?php

namespace App\Http\Controllers\Seller;

use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SellerServicesAvailability;



class SellerServicesController extends Controller
{


    public function index(){
        $this->lang();
        $sellerServices=SellerServicesAvailability::where('seller_id',auth()->id())->with('category','product')->get();
        log::info($sellerServices);
        return view('seller.sellerServices.index',compact('sellerServices'));
    }
    
    
    public function updateAvailability(int $id){
        $sellerServices =SellerServicesAvailability::find($id);
        $status= $sellerServices->availability == 0?1:0;
        $sellerServices->update(['availability' => $status]);
        return to_route('seller.sellerServices.index')->with('success',trans('lang.updated'));
    }
    
    
    public function create()
    {
        $categories = Category::all(); 
        
        $sellers = Seller::with('categories')->get(); 
        return view('seller.sellerServices.create', compact('sellers',  'categories'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'date' => 'required',
        ]);

        // Create a new SellerServicesAvailability entry
        $availability = SellerServicesAvailability::create([
            'seller_id' => Auth::id(),
            'category_id' => $request->category_id,
            'product_id' => $request->product_id,
            'date' => $request->date,
        ]);

        // Redirect or return response
        return redirect()->route('seller.sellerServices.index')->with('success',trans('lang.created'));
    }

    


    public function getProductsByCategory(Request $request)
    {
        $categoryId = $request->category_id;
    
        if (!$categoryId) {
            return response()->json(['products' => []]);
        }
    
        $products = Product::where('category_id', $categoryId)->where('seller_id',auth()->id())->get(['id', 'name_en', 'name_ar']);
        return response()->json(['products' => $products]);
    }
    



}
