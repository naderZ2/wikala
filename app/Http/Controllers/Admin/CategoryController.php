<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\{StoreRequest, EditRequest};
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    use FileUploadTrait;

    // public function index(){
    //     $this->lang();
    //     $categories=Category::with("parent:id,$this->name")
    //     ->select('id','name_ar','name_en','image','end_point','parent_id')
    //     ->get();
    //     return view('admin.category.index',compact('categories'));  
    // }
    public function index()
    {
        $this->lang();

        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->select('id', 'name_ar', 'name_en', 'image', 'end_point', 'parent_id', 'order', 'is_free', 'free_ads_limit')
            ->orderBy('order')
            ->get();

        // dd($categories);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $this->lang();
        $categories = Category::whereEndPoint(0)->get(['id', $this->name]);
        return view('admin.category.add', compact('categories'));
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

    // public function update(EditRequest $request){
    //     $Category=Category::find($request->id);
    //     $Category->update($request->validated());
    //     return  to_route('categorys.index')->with('success',trans('lang.updated')); 
    // }


    // public function details($id){
    //     $this->lang();
    //     $categories=Category
    //     ::where('parent_id',$id)
    //     ->select('id','name_ar','name_en','image','end_point','parent_id','order')
    //     ->orderBy('order')
    //     ->get();

    //     return view('admin.category.details',compact('categories'));  
    //     // return $categories;  
    // }
    public function details($id)
    {
        $this->lang();

        $categories = Category::where('parent_id', $id)
            ->with('children')                   // برضه نحسب عدد الـ sub
            ->select('id', 'name_ar', 'name_en', 'image', 'end_point', 'parent_id', 'order', 'is_free', 'free_ads_limit')
            ->orderBy('order')
            ->get();

        return view('admin.category.details', compact('categories'));
    }


    public function update(EditRequest $request)
    {
        $Category = Category::find($request->id);
        $data = $request->validated();
        if ($request->image) {
            $data['image'] = $this->uploadFile($request->image, 'categories', $Category->image);
        }
        $Category->update($data);
        return  to_route('category.index')->with('success', trans('lang.updated'));
    }

    public function updateStatus($id)
    {
        $Category = Category::find($id);
        $data = $Category->end_point == 0 ? 1 : 0;

        $Category->update(['end_point' => $data]);
        return  back()->with('success', trans('lang.updated'));
    }
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);

        if ($category->children()->exists()) {
            return back()->with('error', __('lang.cannot_delete_has_children'));
        }

        if ($category->image && file_exists(public_path($category->image))) {
            @unlink(public_path($category->image));
        }

        $category->delete();

        return back()->with('success', __('lang.deleted'));
    }
}
