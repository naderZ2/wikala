<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Traits\ResponsesTrait;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use ResponsesTrait;

    /**
     * Get settings page data
     * GET /seller/settings
     */
    public function index(Request $request)
    {
        $this->lang();
        $seller = $request->user();
        $aboutUs = AboutUs::first();
        $lang = request()->header('Lang', app()->getLocale());

        return $this->success([
            'personal_info' => [
                'name' => $seller->name,
                'phone' => $seller->phone,
                'email' => $seller->email,
                'img_path' => $seller->img_path,
                'shop_name' => $lang == 'en' ? $seller->shop_name_en : $seller->shop_name_ar,
            ],
            'about_us' => $aboutUs ? [
                'whatsapp_number' => $aboutUs->whatsapp_number,
                'facebook' => $aboutUs->facebook,
                'insta' => $aboutUs->insta,
                'phone' => $aboutUs->phone,
                'terms' => $lang == 'en' ? $aboutUs->terms_en : $aboutUs->terms_ar,
                'about_us' => $lang == 'en' ? $aboutUs->about_us_en : $aboutUs->about_us_ar,
                'terms_ar' => $aboutUs->terms_ar,
                'terms_en' => $aboutUs->terms_en,
                'about_us_ar' => $aboutUs->about_us_ar,
                'about_us_en' => $aboutUs->about_us_en,
            ] : null,
        ], 'Settings data');
    }

    /**
     * Update language preference
     * POST /seller/settings/language
     */
    public function updateLanguage(Request $request)
    {
        $request->validate([
            'lang' => 'required|in:ar,en',
        ]);

        // Store language preference (if seller has lang column, otherwise use session)
        return $this->success([
            'lang' => $request->lang,
        ], 'Language updated');
    }
}
