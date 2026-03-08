<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;

class ProductController extends Controller
{
    use FileUploadTrait;


    public function index(){
        $this->lang();
        $products=Product::with('images:id,product_id,name','seller:id,name',"category:id,$this->name",'variations.attributes')
        ->select('id',$this->name,$this->description,"price","quantity",'main_image','seller_id','category_id','is_available','old_price','rejection_reason')
        ->withTrashed()
        ->get();
        return view('admin.product.index',compact('products'));
    }
    public function create(){
        $this->lang();
        $categories=Category::get(['id' , 'parent_id' , $this->name , 'end_point']);
        $sellers=Seller::where('active','1')->get(['id','name']);
        // Log::info($categories);
        // Log::info($sellers);

        return view('admin.product.add',compact('categories','sellers'));

        // $temp = [];

    }
    public function edit(string $id ){
        $this->lang();
        $product=Product::withTrashed()->with('attributes', 'variations.attributes')->find($id );
        // dd($product->category_id);
        $categories=Category::get(['id' , 'parent_id' , $this->name , 'end_point']);
        $sellers=Seller::where('active','1')->get(['id','name']);
        return view('admin.product.edit',compact('product','categories','sellers'));
    }



    public function getCategoryAttributes(Request $request)
    {
        $category = Category::with('attributes')->find($request->category_id);
        if (!$category) {
            return response()->json(['attributes' => []]);
        }
        return response()->json(['attributes' => $category->attributes]);
    }

    public function store(StoreRequest $request){

        $data=$request->validated();
        $data['seller_id'] =$request->seller_id ;
        $data['main_image'] = $this->uploadFile($request->main_image,'products');
        $product = Product::create($data);
        
        if($request->has('attributes')){
            foreach($request->attributes as $attribute_id => $value){
                if($value){
                    $product->attributes()->create([
                        'attribute_id' => $attribute_id,
                        'value' => $value
                    ]);
                }
            }
        }

        if($request->has('variations')){
             foreach($request->variations as $variation){
                 $newVariation = $product->variations()->create([
                     'price' => $variation['price'] ?? null,
                     'quantity' => $variation['quantity'] ?? 0,
                     'sku' => $variation['sku'] ?? null,
                 ]);

                 if(isset($variation['attributes'])){
                     foreach($variation['attributes'] as $attrId => $val){
                         if($val){
                             $newVariation->attributes()->create([
                                 'attribute_id' => $attrId,
                                 'value' => $val
                             ]);
                         }
                     }
                 }
             }
        }

        foreach($request->images as $img){
            $product->images()->create([
                'name' =>  $this->uploadFile($img,'products'),
            ]);
        }
        // Log::info($data);
        return  to_route('product.index')->with('success',trans('lang.created'));

        // return 'test';
    }

    public function update($id){
        #TODO complete
        $product =Product::find($id);
        $status= $product->is_available == 0?1:0;
        $product->update(['is_available' => $status]);
        return to_route('product.index')->with('success',trans('lang.updated'));
    }
    
    public function updateProduct(Request $request){
        // Log::info('product');
        $product=Product::withTrashed()->find($request->id);
        // Log::info($product);
        // $data= $request->validated();
        $product->update([
            'title_ar'=>$request->title_ar,
            'title_en'=>$request->title_en,
            'is_available'=>$request->is_available,
            'serving'=>$request->serving,
            'seller_id'=>$request->seller_id,
            'category_id'=>$request->category_id,
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'description_en'=>$request->description_en,
            'description_ar'=>$request->description_ar,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'old_price'=>$request->old_price,
            'is_available'=>$request->is_available,
        ]);

        if($request->has('attributes')){
            // Remove old attributes to avoid duplication or stale data (simple approach) or update existing
            // For simplicity, we can delete and recreate or update if exists. 
            // Let's delete old ones for this product and re-create.
            $product->attributes()->forceDelete(); 
            
            foreach($request->attributes as $attribute_id => $value){
                if($value){
                    $product->attributes()->create([
                        'attribute_id' => $attribute_id,
                        'value' => $value
                    ]);
                }
            }
        }

        if($request->images){
            foreach($request->images as $img){
                $product->images()->create([
                    'name' =>  $this->uploadFile($img,'products'),
                ]);
            }
        }
        if($request->file('main_image')){
            if(File::exists(public_path($product->main_image))){
                $img =public_path($product->main_imag);
                File::delete($img);
            }
            $data['main_image'] = $this->uploadFile($request->file('main_image'),'products');
            $product->update(['main_image' => $data['main_image']]);
        }
        if($request->deleted_images){
            $images = ProductImage::find($request->deleted_images);
            foreach($images as $image){
                if(File::exists(public_path($image->name))){
                    $img =public_path($image->name);
                    File::delete($img);
                    $image->delete();
                }
            }
        }

        return  to_route('product.index')->with('success',trans('lang.updated'));
    }

    public function hide_product($id){

        // Log::info($id);
        $product =Product::withTrashed()->find($id);
        // Log::info($product);
        // $status= $product->deleted_at == null? 1:0;
        // $product->update(['is_available' => $status]);

        if(is_null($product->deleted_at)){
            // Log::info('delete');

            $product->delete();

        }else{
            // Log::info('restore');

            $product->restore();


        }


        return to_route('product.index')->with('success',trans('lang.updated'));

    }

    /**
     * Reject a product with a reason
     */
    public function rejectProduct(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:1000',
        ]);

        $product = Product::withTrashed()->find($id);
        $product->update([
            'is_available' => -1,
            'rejection_reason' => $request->rejection_reason,
        ]);

        return to_route('product.index')->with('success', trans('lang.updated'));
    }

    /**
     * Approve a product (set is_available = 1, clear rejection reason)
     */
    public function approveProduct($id)
    {
        $product = Product::withTrashed()->find($id);
        $product->update([
            'is_available' => 1,
            'rejection_reason' => null,
        ]);

        return to_route('product.index')->with('success', trans('lang.updated'));
    }

}
