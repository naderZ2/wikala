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
Route::post('forgot-password', [Seller\Auth\LoginController::class, 'forgotPassword']);
Route::post('reset-password', [Seller\Auth\LoginController::class, 'resetPassword']);
Route::post('resend-otp', [Seller\Auth\LoginController::class, 'resendOtp']);
Route::get('payment/success', [Seller\PlanPaymentController::class, 'paymentSuccess'])->name('seller.payment.success');
Route::get('payment/fail', [Seller\PlanPaymentController::class, 'paymentFail'])->name('seller.payment.fail');
Route::get('payment/slider/success', [Seller\SliderController::class, 'paymentSuccess'])->name('seller.slider_payment.success');
Route::get('payment/slider/fail', [Seller\SliderController::class, 'paymentFail'])->name('seller.slider_payment.fail');
Route::get('plans', [Seller\PlanPaymentController::class, 'getPlans']);
Route::post('select-plan', [Seller\PlanPaymentController::class, 'selectPlan']);

// ==========================================
// Protected routes (auth:seller-api required)
// ==========================================
Route::middleware(['auth:seller-api', 'checkSellerPlanPayment'])->group(function () {

    // Auth
    Route::post('logout', [Seller\Auth\LoginController::class, 'logout']);

    // Dashboard / Home
    Route::get('home', [Seller\StatisticsController::class, 'index']);

    // Profile (View works without permission for the logged in user)
    Route::get('profile', [Seller\ProfileController::class, 'index']);
    
    // Notifications
    Route::get('notifications', [Seller\NotificationController::class, 'index']);
    
    // Products (Viewing products open to all employees)
    Route::get('products', [Seller\ProductController::class, 'index']);
    Route::get('products/{id}', [Seller\ProductController::class, 'show']);
    Route::get('categories', [Seller\ProductController::class, 'categories']);

    Route::group(['middleware' => ['permission:manage-products,seller-api']], function () {
        Route::post('products', [Seller\ProductController::class, 'store']);
        Route::put('products/{id}', [Seller\ProductController::class, 'update']);
        Route::post('products/{id}', [Seller\ProductController::class, 'update']); // POST for file uploads
        Route::delete('products/{id}', [Seller\ProductController::class, 'destroy']);
        Route::post('products/{id}/variations', [Seller\ProductController::class, 'storeVariations']);
        Route::put('products/{productId}/variations/{variationId}', [Seller\ProductController::class, 'updateVariation']);
        Route::delete('products/{productId}/variations/{variationId}', [Seller\ProductController::class, 'deleteVariation']);

        // Tree-structured variations
        Route::post('products/{id}/variation-tree', [Seller\ProductController::class, 'storeTreeVariations']);
        Route::get('products/{id}/variation-tree', [Seller\ProductController::class, 'getVariationTree']);
    });

    // Orders (Viewing orders open to all employees)
    Route::get('orders', [Seller\OrderController::class, 'index']);
    Route::get('orders/{id}', [Seller\OrderController::class, 'details']);
    Route::get('orders/{id}/invoice', [Seller\OrderController::class, 'generateInvoice']);
    Route::get('orders/{id}/tracking', [Seller\OrderController::class, 'tracking']);

    Route::group(['middleware' => ['permission:manage-orders,seller-api']], function () {
        Route::put('orders/{id}/status', [Seller\OrderController::class, 'changeOrderStatus']);
    });

    // Coupons (read-only list of active coupons)
    Route::get('coupons', [Seller\CouponController::class, 'index']);

    // Settings / Settings Management
    Route::get('settings', [Seller\SettingsController::class, 'index']);
    Route::get('delivery-options', [Seller\DeliveryController::class, 'index']);
    Route::get('services', [Seller\SellerServicesController::class, 'index']);
    Route::get('services/products-by-category', [Seller\SellerServicesController::class, 'getProductsByCategory']);

    Route::group(['middleware' => ['permission:manage-settings,seller-api']], function () {
        Route::put('profile', [Seller\ProfileController::class, 'update']);
        Route::post('profile', [Seller\ProfileController::class, 'update']); // POST for file uploads
        Route::delete('profile', [Seller\ProfileController::class, 'destroy']);
        Route::put('delivery-options', [Seller\DeliveryController::class, 'update']);
        Route::post('delivery-options', [Seller\DeliveryController::class, 'update']); // POST alternative
        Route::post('settings/language', [Seller\SettingsController::class, 'updateLanguage']);
        Route::post('services', [Seller\SellerServicesController::class, 'store']);
        Route::put('services/{id}/toggle', [Seller\SellerServicesController::class, 'updateAvailability']);

        // Homepage Sliders
        Route::get('sliders', [Seller\SliderController::class, 'index']);
        Route::post('sliders', [Seller\SliderController::class, 'store']);
        Route::post('sliders/{id}/pay', [Seller\SliderController::class, 'pay']);
    });

    // Employees Management
    Route::get('permissions', [Seller\RoleController::class, 'permissions']);
    
    Route::group(['middleware' => ['permission:manage-employees,seller-api']], function () {
        Route::apiResource('roles', Seller\RoleController::class)->names('seller.roles');
        Route::apiResource('employees', Seller\EmployeeController::class)->names('seller.employees');
    });
});