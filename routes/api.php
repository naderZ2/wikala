<?php
namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

//Country
// Route::get('countries', [Api\CountriesController::class, 'index']);
Route::get('about_us', [Client\AboutUsController::class, 'index']);
Route::get('reminder', [Admin\NotificationController::class, 'reminder']);



// Route::get('auth/google/', [Client\Auth\SocialController::class, 'redirect']);





// Route::get('auth/google/', [Client\Auth\SocialController::class, 'redirect']);



Route::middleware(['checkLanguage'])->group(function () {
    Route::post('contactUs', [Client\ContactUsController::class, 'store']);
    Route::post('contact_us_store', [Client\ContactUsController::class, 'storeContactUs'])->name('contactUs');

    Route::get('success', [Client\PaymentController::class, 'successUrl']);
    Route::get('fail', [Client\PaymentController::class, 'failUrl']);
    Route::post('check_client_exists', [Client\Auth\UserAuthController::class, 'checkClientExists']);

    Route::get('cities', [Client\CityController::class, 'cities']);
    Route::get('regions', [Client\CityController::class, 'regions']);

    
    Route::post('send_otp_password', [Client\Auth\UserAuthController::class, 'sendOtpPassword']);
    Route::post('send_otp_register', [Client\Auth\UserAuthController::class, 'sendOtpRegister']);
    Route::post('reset_password', [Client\Auth\ResetPasswordController::class, 'resetPassword']);
    
    Route::get('testotpwasage', [Client\Auth\UserAuthController::class, 'testotpwasage']);
    Route::post('login', [Client\Auth\UserAuthController::class, 'login']);
    Route::post('register', [Client\Auth\UserAuthController::class, 'register']);

    //Banner
    Route::get('banners', [Client\BannerController::class, 'index']);
    
    //Products
        Route::get('most_selling', [Client\ProductController::class, 'index']);

    Route::get('products', [Client\ProductController::class, 'index']);
    Route::get('product_details', [Client\ProductController::class, 'details']);


    //events
        Route::get('event_categories', [Client\EventController::class, 'index']);
        
        Route::get('families', [Client\EventController::class, 'families']);
        Route::get('events', [Client\EventController::class, 'events']);

    //Categories
    Route::get('categories', [Client\CategoryController::class, 'index']);

    Route::get('main_categories', [Client\CategoryController::class, 'mainCategories']);
    Route::get('category_sellers', [Client\CategoryController::class, 'categorySellers']);
    Route::get('categoryUnderSeller', [Client\CategoryController::class, 'categoryUnderSeller']);

Route::middleware(['auth:api'])->group(function () {
    
        // Route::post('save_special_request', [Client\SpecialRequestController::class, 'saveSpecialRequest'] )->name('save_special_request');
        
        // Route::post('save_special_request_details', [Client\SpecialRequestController::class, 'saveSpecialRequestDetails'] )->name('save_special_request');


    
                Route::post('pay', [Client\PaymentController::class, 'payment']);

      Route::get('notifications', [Client\NotificationController::class, 'index']);
      
      Route::post('read_notification', [Client\NotificationController::class, 'readNotification']);


        Route::get('favourite_sellers', [Client\FavouriteSellerController::class, 'favourite_sellers']);
        
        Route::get('myFavourite_sellers', [Client\FavouriteSellerController::class, 'myIndex']);

        Route::post('favourite_sellers', [Client\FavouriteSellerController::class, 'store']);
        Route::delete('favourite_sellers', [Client\FavouriteSellerController::class, 'delete']);
        Route::get('user_daily_events', [Client\EventController::class, 'userDailyEvents']);
         Route::get('user_events', [Client\EventController::class, 'userEvents']);
        Route::post('user_daily_events', [Client\EventController::class, 'addUserDailyEvent']);
        Route::post('add_daily_events', [Client\EventController::class, 'addDailyEvents']);
         Route::post('edit_daily_events', [Client\EventController::class, 'editDailyEvents']);
        Route::delete('user_daily_events', [Client\EventController::class, 'deleteUserDailyEvent']);
        
        Route::delete('daily_event', [Client\EventController::class, 'deleteDailyEvent']);

     Route::get('myFavourite_products', [Client\FavouriteProductController::class, 'myIndex']);

    Route::get('favourite_products', [Client\FavouriteProductController::class, 'index']);
    Route::post('favourite_products', [Client\FavouriteProductController::class, 'store']);
    Route::delete('favourite_products', [Client\FavouriteProductController::class, 'delete']);

    Route::post('edit_password', [Client\Auth\ResetPasswordController::class, 'editPassword']);

    Route::post('add_client_region', [Client\CityController::class, 'addClientRegion']);
    Route::post('select_main_address', [Client\CityController::class, 'updateMainAddress']);
    Route::post('edit_client_region', [Client\CityController::class, 'editClientRegion']);
    Route::delete('delete_client_region', [Client\CityController::class, 'deleteClientRegion']);


    //Discount
    Route::post('check_availabilty', [Client\DiscountController::class, 'checkAvailabilty']);

    //basket
    Route::get('myBasket', [Client\BasketController::class, 'index']);
    // Route::get('order_tracking', [Client\OrderController::class, 'tracking']);
    Route::post('addToBasket', [Client\BasketController::class, 'addToBasket']);
    Route::post('cancelItem', [Client\BasketController::class, 'cancelItem']);

    //Order
    Route::get('myOrders', [Client\OrderController::class, 'index']);
    Route::get('order_tracking', [Client\OrderController::class, 'tracking']);
    Route::post('add_order', [Client\OrderController::class, 'store']);
    Route::post('cancel_order', [Client\OrderController::class, 'cancelOrder']);

    //Auth
    Route::get('logout', [Client\Auth\UserAuthController::class, 'logout']);

    //Profile
    Route::get('profile', [Client\ProfileController::class, 'index']);
    Route::delete('profile', [Client\ProfileController::class, 'destroy']);
    Route::post('edit_profile', [Client\ProfileController::class, 'update']);
    Route::post('edit_lang', [Client\ProfileController::class, 'updateLang']);


});


});
