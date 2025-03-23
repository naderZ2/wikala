<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\{StoreRequest,EditRequest};
use App\Traits\FileUploadTrait;

class CategoryController extends Controller
{
        use FileUploadTrait;

    public function index(){
        $this->lang();
        $categories=Category
        ::whereIn('id', [65, 66])
        ->select('id','name_ar','name_en','image','end_point','parent_id','order')
        ->orderBy('order')
        ->get();
        return view('admin.category.index',compact('categories'));  
    }
    
    public function details($id){
        $this->lang();
        $categories=Category
        ::where('parent_id',$id)
        ->select('id','name_ar','name_en','image','end_point','parent_id','order')
        ->orderBy('order')
        ->get();
        
        return view('admin.category.details',compact('categories'));  
        // return $categories;  
    }

    public function create(){
        $this->lang();
        $categories=Category::whereEndPoint(0)
        ->whereIn('id', [65, 66])
        ->get(['id',$this->name]);
        return view('admin.category.add',compact('categories'));  
    }
    
     public function store(StoreRequest $request)
    {
        $file = $request->file('image');
        $data = $request->validated();
    
        if (is_array($request->parent_id)) {
            // Handle the array case
            $data['image'] = $this->uploadFile($file, 'categories');
    
            foreach ($request->parent_id as $parentId) {
                $newData = $data;
                $newData['parent_id'] = $parentId;
    
                // If not the first parent ID, copy the file
                if ($parentId !== $request->parent_id[0]) {
                    $newData['image'] = $this->copyFile($data['image'], time() . rand(100, 999));
                }
    
                Category::create($newData);
            }
    
            // return "Array case handled successfully";
        } else {
            // Handle the single value case
            $data['parent_id'] = $request->parent_id;
            $data['image'] = $this->uploadFile($file, 'categories');
            Category::create($data);
    
          
        }
          return to_route('category.index')->with('success', trans('lang.created'));
    }

    


    public function update(EditRequest $request){
        $Category=Category::find($request->id);
        $data=$request->validated();
        if($request->image){
          $data['image'] = $this->uploadFile($request->image, 'categories',$Category->image);
        }
        $Category->update($data);
        return  to_route('category.index')->with('success',trans('lang.updated')); 
    }
    
     public function updateStatus($id){
        $Category=Category::find($id);
        $data=$Category->end_point==0?1:0;
      
        $Category->update(['end_point'=>$data]);
        return  back()->with('success',trans('lang.updated')); 
    }
}
