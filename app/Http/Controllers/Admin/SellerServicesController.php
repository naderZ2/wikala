<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\SellerServicesAvailability;

class SellerServicesController extends Controller
{


    public function index(){
        $this->lang();
        $sellerServices=SellerServicesAvailability::with('category','product','seller')->get();
        // log::info($sellerServices);
        return view('admin.sellerServices.index',compact('sellerServices'));
    }
    
    
    public function updateAvailability(int $id){
        $sellerServices =SellerServicesAvailability::find($id);
        $status= $sellerServices->availability == 0?1:0;
        $sellerServices->update(['availability' => $status]);
        return to_route('admin.sellerServices.index')->with('success',trans('lang.updated'));
    }
    
    
    public function create()
    {

     // Fetch categories
    $sellers = Seller::where('active',1)->with('categories')->get(); // Fetch sellers along with categories

    // return view('admin.product.create', compact('categories', 'sellers'));




        // Pass the data to the view
        return view('admin.sellerServices.create', compact('sellers'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'seller_id' => 'required|exists:sellers,id',
            'product_id' => 'required|exists:products,id',
            'date' => 'required',
        ]);

        // Create a new SellerServicesAvailability entry
        $availability = SellerServicesAvailability::create([
            'seller_id' => $request->seller_id,
            'category_id' => $request->category_id,
            'product_id' => $request->product_id,
            'date' => $request->date
        ]);
        // Redirect or return response
        return redirect()->route('admin.sellerServices.index')->with('success',trans('lang.created'));
    }

    


    public function getCategoriesBySeller(Request $request)
    {
        $sellerId = $request->input('seller_id');
    
        // Fetch categories associated with the selected seller
        $categories = Category::whereHas('sellers', function ($query) use ($sellerId) {
            $query->where('sellers.id', $sellerId);
        })->get();
    
        return response()->json(['categories' => $categories]);
    }
    
    public function getProductsByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');
    
        // Fetch products associated with the selected category
        $products = Product::where('category_id', $categoryId)->where('is_available', 1)->get();
    
        return response()->json(['products' => $products]);
    }
    

}
