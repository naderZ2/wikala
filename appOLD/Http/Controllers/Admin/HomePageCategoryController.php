<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\HomePageCategory;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomePageCategory\EditRequest;
use App\Http\Requests\Admin\HomePageCategory\StoreRequest;

class HomePageCategoryController extends Controller
{
    public function index()
    {
        $items = HomePageCategory::with('category')->orderBy('sort_order')->get();
        return view('admin.home_page_category.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.home_page_category.add', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        HomePageCategory::create($request->validated());
        return redirect()->route('home_page_category.index')->with('success', __('lang.created'));
    }

    public function edit($id)
    {
        $item = HomePageCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.home_page_category.edit', compact('item', 'categories'));
    }

    public function update(EditRequest $request, $id)
    {
        // Log::info('request: ' . $request->all());
        $item = HomePageCategory::findOrFail($id);
        $item->update($request->validated());
        return redirect()->route('home_page_category.index')->with('success', __('lang.updated'));
    }

    public function destroy($id)
    {
        $item = HomePageCategory::findOrFail($id);
        $item->delete();
        return redirect()->route('home_page_category.index')->with('success', __('lang.deleted'));
    }
}
