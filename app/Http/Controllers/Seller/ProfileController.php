<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Traits\{ResponsesTrait, FileUploadTrait};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    use ResponsesTrait, FileUploadTrait;

    /**
     * Get seller profile
     * GET /seller/profile
     */
    public function index(Request $request)
    {
        $this->lang();
        $seller = $request->user();
        $seller->load('categories', 'cities');

        $lang = request()->header('Lang', app()->getLocale());

        return $this->success([
            'id' => $seller->id,
            'name' => $seller->name,
            'phone' => $seller->phone,
            'email' => $seller->email,
            'shop_name' => $lang == 'en' ? $seller->shop_name_en : $seller->shop_name_ar,
            'shop_name_en' => $seller->shop_name_en,
            'shop_name_ar' => $seller->shop_name_ar,
            'img_path' => $seller->img_path,
            'banner' => $seller->banner,
            'details' => $seller->details,
            'about' => $seller->about,
            'active' => $seller->active,
            'categories' => $seller->categories->map(function ($cat) use ($lang) {
                return [
                    'id' => $cat->id,
                    'name' => $lang == 'en' ? $cat->name_en : $cat->name_ar,
                    'name_en' => $cat->name_en,
                    'name_ar' => $cat->name_ar,
                ];
            }),
        ], 'Seller profile');
    }

    /**
     * Update seller profile
     * PUT /seller/profile
     */
    public function update(Request $request)
    {
        $seller = $request->user();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|unique:sellers,phone,' . $seller->id,
            'password' => 'nullable|string|min:6',
            'shop_name_en' => 'nullable|string|max:255',
            'shop_name_ar' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'about' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'categories' => 'nullable|array|max:3',
            'categories.*' => 'exists:categories,id',
            'logo' => 'nullable|image|max:2048',
            'banner' => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'name', 'phone', 'shop_name_en', 'shop_name_ar',
            'details', 'about'
        ]);

        // Handle password change
        if ($request->password) {
            $data['password'] = $request->password;
        }

        // Handle logo upload 
        if ($request->hasFile('logo')) {
            $seller->img_path = $request->file('logo');
            $seller->save();
        }

        // Handle banner upload
        if ($request->hasFile('banner')) {
            if ($seller->banner && File::exists(public_path($seller->banner))) {
                File::delete(public_path($seller->banner));
            }
            $path = $request->file('banner')->store('uploads/banners', 'public');
            $data['banner'] = $path;
        }

        $seller->update(array_filter($data));

        // Update categories (max 3)
        if ($request->categories) {
            $seller->categories()->sync(array_slice($request->categories, 0, 3));
        } elseif ($request->category_id) {
            $seller->categories()->sync([$request->category_id]);
        }

        return $this->success($seller->fresh()->load('categories'), 'Profile updated successfully');
    }

    /**
     * Delete seller account
     * DELETE /seller/profile
     */
    public function destroy(Request $request)
    {
        $seller = $request->user();

        // Revoke tokens
        $seller->tokens()->delete();

        // Delete seller
        $seller->delete();

        return $this->success(null, 'Account deleted successfully');
    }
}
