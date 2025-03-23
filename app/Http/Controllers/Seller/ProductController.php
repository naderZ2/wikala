<?php

namespace App\Http\Controllers\Seller;

use App\Models\{Product,Category,ProductImage};
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Seller\Product\EditRequest;
use App\Http\Requests\Seller\Product\StoreRequest;

class ProductController extends Controller
{    
    use FileUploadTrait;
    public function index(){
        $this->lang();
        $products=Product::whereSellerId(auth()->id())->with('images:id,product_id,name',"category:id,$this->name")
        ->select('id',$this->name,$this->description,$this->title,'category_id',"price","quantity",'main_image')
        ->get();
        return view('seller.product.index',compact('products'));
    }

    function checkChildren($children, &$temp){
        foreach($children as $child){
            if($child->end_point == 1){
                $temp []=$child->id;
            }
            else{
                $this->checkChildren($child->children,$temp);
            }
        }
    }

    public function create(){
        $this->lang();
         $sellerCategories=auth()->user()->categories;
        $sellerCategoriesIds=$sellerCategories->pluck('pivot.category_id');
        // $temp = [];
        $categories=Category::whereIn('id',$sellerCategoriesIds)
        ->get(['id' , 'parent_id' , $this->name , 'end_point']);
        // // $this->checkChildren($categories,$temp);
        // $categories=Category::whereIn('id',$temp)
        // ->get(['id' , 'parent_id' , $this->name , 'end_point']);

        return view('seller.product.add',compact('categories'));        
    }


    // public function create(){
    //     $this->lang();
    //      $sellerCategories=auth()->user()->categories;
    //     $sellerCategoriesIds=$sellerCategories->pluck('pivot.category_id');
    //     // $temp = [];
    //     $categories=Category::whereIn('id',$sellerCategoriesIds)
    //     ->get(['id' , 'parent_id'  , 'end_point']);
    //     $this->checkChildren($categories,$temp);
    //     $categories=Category::whereIn('id',$temp)
    //     ->get(['id' , 'parent_id' , $this->name , 'end_point']);

    //     return view('seller.product.add',compact('categories'));        
    // }
    public function store(StoreRequest $request){
        $data=$request->validated();
        $data['seller_id'] = auth()->id();
        $data['main_image'] = $this->uploadFile($request->main_image,'products');
        $product = Product::create($data);
        foreach($request->images as $img){
            $product->images()->create([
                'name' =>  $this->uploadFile($img,'products'),
            ]);
        }
        return  to_route('seller.product.index')->with('success',trans('lang.created')); 
    }

    public function edit($id){
        $product=Product::whereId($id)->with('images:id,product_id,name')->first();
        return view("seller.product.edit",compact('product'));
    }

    public function update(EditRequest $request){
        $product=Product::find($request->id);
        $data= $request->validated();
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
        $product->update($data);
        return  to_route('seller.product.index')->with('success',trans('lang.updated')); 
    }

    public function destroy(){
        #TODO complete

    }
}
