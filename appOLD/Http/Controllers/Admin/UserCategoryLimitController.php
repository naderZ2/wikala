<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use App\Models\UserCategoryLimit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCategoryLimitController extends Controller
{
    /**
     * Get category path with parent hierarchy.
     */
    private function getCategoryPath($category)
    {
        $path = [];
        $current = $category;

        while ($current) {
            $name = request()->header('Lang') == "en" ? $current->name_en : $current->name_ar;
            array_unshift($path, $name);
            $current = $current->parent;
        }

        return implode(' - ', $path);
    }

    /**
     * Display user's category limits.
     */
    public function index($userId)
    {
        $this->lang();
        $user = User::findOrFail($userId);

        // Get all end-point categories with user's limits (both free and not free)
        $categories = Category::where('end_point', 1)
            ->with('parent.parent.parent') // Load up to 3 levels of parents
            ->select('id', 'name_ar', 'name_en', 'free_ads_limit', 'parent_id', 'is_free')
            ->get()
            ->map(function ($category) use ($user) {
                $userLimit = $user->getCategoryLimit($category->id);
                $usedAds = $user->ads()->where('category_id', $category->id)->count();

                return [
                    'category_id' => $category->id,
                    'category_name' => $this->getCategoryPath($category),
                    'is_free' => $category->is_free,
                    'default_limit' => $category->free_ads_limit,
                    'user_limit' => $userLimit ? $userLimit->free_ads_limit : null,
                    'used_ads_count' => $userLimit ? $userLimit->used_ads_count : $usedAds,
                    'has_custom_limit' => $userLimit !== null,
                ];
            });

        return view('admin.users.category_limits', compact('user', 'categories'));
    }

    /**
     * Show edit form for specific user/category limit.
     */
    public function edit($userId, $categoryId)
    {
        $this->lang();
        $user = User::findOrFail($userId);
        $category = Category::findOrFail($categoryId);
        $userLimit = UserCategoryLimit::where('user_id', $userId)
            ->where('category_id', $categoryId)
            ->first();

        return view('admin.users.edit_category_limit', compact('user', 'category', 'userLimit'));
    }

    /**
     * Update or create user's category limit.
     */
    public function update(Request $request, $userId, $categoryId)
    {
        $request->validate([
            'free_ads_limit' => 'required|integer|min:0',
            'used_ads_count' => 'nullable|integer|min:0',
        ]);

        $userLimit = UserCategoryLimit::updateOrCreate(
            [
                'user_id' => $userId,
                'category_id' => $categoryId,
            ],
            [
                'free_ads_limit' => $request->free_ads_limit,
                'used_ads_count' => $request->used_ads_count ?? 0,
            ]
        );

        return redirect()
            ->route('admin.userCategoryLimits.index', $userId)
            ->with('success', trans('lang.updated'));
    }

    /**
     * Reset user's limit to default (delete custom limit).
     */
    public function destroy($userId, $categoryId)
    {
        UserCategoryLimit::where('user_id', $userId)
            ->where('category_id', $categoryId)
            ->delete();

        return redirect()
            ->route('admin.userCategoryLimits.index', $userId)
            ->with('success', trans('lang.deleted'));
    }
}
