<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller;

/*
|--------------------------------------------------------------------------
| Seller API Routes
|--------------------------------------------------------------------------
| Prefix: /seller (set in RouteServiceProvider)
| Middleware: api (set in RouteServiceProvider)
*/

// ==========================================
// Public routes (no auth required)
// ==========================================
Route::post('login', [Seller\Auth\LoginController::class, 'login']);
Route::post('register', [Seller\Auth\LoginController::class, 'register']);
Route::post('verify-otp', [Seller\Auth\LoginController::class, 'verifyOtp']);

// ==========================================
// Protected routes (auth:seller-api required)
// ==========================================
Route::middleware('auth:seller-api')->group(function () {

    // Auth
    Route::post('logout', [Seller\Auth\LoginController::class, 'logout']);

    // Dashboard / Home
    Route::get('home', [Seller\StatisticsController::class, 'index']);

    // Profile
    Route::get('profile', [Seller\ProfileController::class, 'index']);
    Route::put('profile', [Seller\ProfileController::class, 'update']);
    Route::post('profile', [Seller\ProfileController::class, 'update']); // POST for file uploads
    Route::delete('profile', [Seller\ProfileController::class, 'destroy']);

    // Products
    Route::get('products', [Seller\ProductController::class, 'index']);
    Route::post('products', [Seller\ProductController::class, 'store']);
    Route::get('products/{id}', [Seller\ProductController::class, 'show']);
    Route::put('products/{id}', [Seller\ProductController::class, 'update']);
    Route::post('products/{id}', [Seller\ProductController::class, 'update']); // POST for file uploads
    Route::delete('products/{id}', [Seller\ProductController::class, 'destroy']);
    Route::post('products/{id}/variations', [Seller\ProductController::class, 'storeVariations']);

    // Categories (for product form)
    Route::get('categories', [Seller\ProductController::class, 'categories']);

    // Orders
    Route::get('orders', [Seller\OrderController::class, 'index']);
    Route::get('orders/{id}', [Seller\OrderController::class, 'details']);
    Route::put('orders/{id}/status', [Seller\OrderController::class, 'changeOrderStatus']);
    Route::get('orders/{id}/invoice', [Seller\OrderController::class, 'generateInvoice']);

    // Delivery Options
    Route::get('delivery-options', [Seller\DeliveryController::class, 'index']);
    Route::put('delivery-options', [Seller\DeliveryController::class, 'update']);
    Route::post('delivery-options', [Seller\DeliveryController::class, 'update']); // POST alternative

    // Settings
    Route::get('settings', [Seller\SettingsController::class, 'index']);
    Route::post('settings/language', [Seller\SettingsController::class, 'updateLanguage']);

    // Seller Services
    Route::get('services', [Seller\SellerServicesController::class, 'index']);
    Route::post('services', [Seller\SellerServicesController::class, 'store']);
    Route::put('services/{id}/toggle', [Seller\SellerServicesController::class, 'updateAvailability']);
    Route::get('services/products-by-category', [Seller\SellerServicesController::class, 'getProductsByCategory']);
});