<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Models\CategoryAttribute;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    use ResponsesTrait;
    // public function getAttributesByCategoryId(Request $request)
    // {
    //     $request->validate([
    //         'category_id' => 'required|exists:categories,id',
    //     ]);

    //     $attributes = CategoryAttribute::where('category_id', $request->category_id)
            
    //         ->with('attribute:id,name_ar,name_en,type,enable')
    //         ->get();

    //     // return response()->json(['attributes' => $attributes]);
    //     return $this->success($attributes);

    // }


    public function getAttributesByCategoryId(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $attributes = CategoryAttribute::where('category_id', $request->category_id)
            ->with(['attribute' => function ($query) {
                $query->select('id', 'name_ar', 'name_en', 'type', 'enable')
                        ->where('enable', 1);
            }])
            ->get()
            ->filter(function ($item) {
                return $item->attribute !== null;
            })
            ->values();
    
        return $this->success($attributes);
    }
    

}