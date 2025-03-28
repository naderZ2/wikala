<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\CategoryAttribute;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryAttribute\EditRequest;
use App\Http\Requests\Admin\CategoryAttribute\StoreRequests;

class CategoryAttributeController extends Controller
{
    public function index()
    {
        $this->lang();
        $categoryAttributes = CategoryAttribute::with("attribute:id,$this->name","category:id,$this->name")->get();
        // Log::info($categoryAttributes);
        return view('admin.categories_attributes.index', compact('categoryAttributes'));
    }
    
    public function create()
    {
        $this->lang();
        $categories = Category::select($this->name, 'id')->get();
        $attributes = Attribute::select($this->name, 'id')->get();
        // return view('admin.categories_attributes.add');
        return view('admin.categories_attributes.add', compact('categories', 'attributes'));
    }

    public function store(StoreRequests $request)
    {
        
        

        CategoryAttribute::create($request->validated());

        
        return redirect()->route('category-attributes.index')->with('success',trans('lang.created'));
    }

    public function edit($id)
    {
        $this->lang();
        $categories = Category::select($this->name, 'id')->get();
        $attributes = Attribute::select($this->name, 'id')->get();
        $categoryAttribute = CategoryAttribute::findOrFail($id);
        return view('admin.categories_attributes.edit', compact('categories', 'attributes', 'categoryAttribute'));
    }

    public function update(EditRequest $request, $id)
    {
        
        // $request->validated();
        $categoryAttribute = CategoryAttribute::findOrFail($id);
        $categoryAttribute->update($request->validated());

        return redirect()->route('category-attributes.index')->with('success',trans('lang.updated'));
    }

    public function destroy(Request $request)
    {
        $categoryAttribute = CategoryAttribute::findOrFail($request->id);
        $categoryAttribute->delete();
        // return redirect()->route('category-attributes.index')->with('success', 'Category Attribute deleted successfully.');
        return to_route('category-attributes.index')->with('success');;
    }

    public function enable($id)
    {
        $categoryAttribute = CategoryAttribute::findOrFail($id);
        $categoryAttribute->enable = !$categoryAttribute->enable; // Toggle enable/disable
        $categoryAttribute->save();

        return redirect()->route('category-attributes.index')->with('success', 'Category Attribute status updated successfully.');
    }
}
