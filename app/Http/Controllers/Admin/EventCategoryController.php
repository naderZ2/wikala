<?php

namespace App\Http\Controllers\Admin;

use App\Models\EventCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventCategory\{StoreRequest,EditRequest};

class EventCategoryController extends Controller
{
    public function index(){
        $this->lang();
        $categories=EventCategory::select('id','name_ar','name_en','image','order')->orderBy('order')->get();
        return view('admin.events.index_category',compact('categories'));  
    }

    public function create(){
        $this->lang();
        return view('admin.events.add_category');  
    }
    
    public function store(StoreRequest $request){
        EventCategory::create($request->validated());
        return  to_route('event_category.index')->with('success',trans('lang.created')); 
    }

    public function update(EditRequest $request){
        $Category=EventCategory::find($request->id);
        $Category->update($request->validated());
        return  to_route('event_category.index')->with('success',trans('lang.updated')); 
    }

    public function destroy ($id){
        $event=EventCategory::find($id);
        $event->delete();
        return  to_route('event_category.index')->with('success');
    }
   
    // public function moveDown($id)
    // {
    //     $category = EventCategory::findOrFail($id);
    //     $nextCategory = EventCategory::where('order', $category->order + 1)->first();
    
    //     if ($nextCategory) {
    //         $nextCategory->order = $nextCategory->order - 1;
    //         $nextCategory->save();
    //     }
    
    //     $category->order = $category->order + 1;
    //     $category->save();
    
    //     return redirect()->back();
    // }
    
    // public function moveUp($id)
    // {
    //     $category = EventCategory::findOrFail($id);
    //     $previousCategory = EventCategory::where('order', $category->order - 1)->first();
    
    //     if ($previousCategory) {
    //         $previousCategory->order = $previousCategory->order + 1;
    //         $previousCategory->save();
    //     }
    
    //     $category->order = $category->order - 1;
    //     $category->save();
    
    //     return redirect()->back();
    // }
}
