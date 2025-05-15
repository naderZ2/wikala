<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::prefix('seller')->name('seller.')->group(function () {
 
    Route::group(['middleware' => ['guest:seller']], function(){ 
        Route::view('login','seller.auth.login');
        Route::post('login', [Seller\Auth\LoginController::class, 'login'])->name('login');
    });
    
    Route::group(['middleware' => ['auth:seller']], function(){ 
        Route::get('home', [Seller\StatisticsController::class, 'index'])->name('home');

        Route::get('logout', [Seller\Auth\LoginController::class, 'logout'])->name('logout');
    
        //Product
        Route::resource('product', Seller\ProductController::class);
        Route::post('edit_product', [Seller\ProductController::class, 'update'])->name('product.update');

    
        //Order 
        Route::get('orders/invoice/{id}', [Seller\OrderController::class, 'generateInvoice'])->name('order.generate_nvoice');

        Route::get('orders', [Seller\OrderController::class, 'index'])->name('order.index');
        Route::get('change_status/{id}/{action}', [Seller\OrderController::class, 'changeOrderStatus'])->name('order.change_status');


        Route::get('orders/completed', [Seller\OrderController::class, 'index'])->name('order.completed');
        Route::get('orders/new', [Seller\OrderController::class, 'index'])->name('order.new');
        Route::get('orders/under_preparation', [Seller\OrderController::class, 'index'])->name('order.under_preparation');

        Route::get('order/{id}', [Seller\OrderController::class, 'details'])->name('order.details');
    









        Route::prefix('/seller_services')->group(function () {
            Route::get('index', [Seller\SellerServicesController::class, 'index'])->name('sellerServices.index');
            Route::get('edit_availability/{id}', [Seller\SellerServicesController::class, 'updateAvailability'])->name('sellerServices.updateAvailability');
            Route::get('create', [Seller\SellerServicesController::class, 'create'])->name('sellerServices.create');
            Route::post('/store', [Seller\SellerServicesController::class, 'store'])->name('sellerServices.store');
            Route::get('/products-by-category', [Seller\SellerServicesController::class, 'getProductsByCategory'])->name('productServices.get.products.by.category');
        });








    });
});