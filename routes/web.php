<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Client\Events\RequestSending;
use App\Http\Controllers\Admin\AttributeController;

// Route::get('test')->name('');
Route::view('test2', 'test')->name('test');
Route::view('terms_ar', 'terms_ar');
Route::view('terms_en', 'terms_en');



// Route::get('auth/google/callback', function (Request $request) {
    
//     dd($request->all());
// });


// Route::get('auth/google/redirect', function (Request $request) {
//     return Socialite::driver('google')->redirect();
// });

Route::middleware(['web'])->get('login/redirect', [Client\Auth\SocialController::class, 'redirect'] );

Route::middleware(['web'])->get('login/google/callback', [Client\Auth\SocialController::class, 'handleGoogleCallback'] );

// Route::middleware(['web'])->get('login/google/callback', function (Request $request) {
//     Log::info('Google callback', $request->all());

//     // Get user data from Google via Socialite
//     // $user = Socialite::driver('google')->user();

//     $githubUser = Socialite::driver('google')->user();
 
//     $user = User::updateOrCreate([
//         'github_id' => $githubUser->id,
//     ], [
//         'name' => $githubUser->name,
//         'email' => $githubUser->email,
//         'github_token' => $githubUser->token,
//         'github_refresh_token' => $githubUser->refreshToken,
//     ]);
//     Auth::login($user);
//     // Optionally, you can log or save the user's information here
//     dd($githubUser->token); // This will show the user data returned by Google
// });



Route::group(['middleware' => ['guest:admin']], function(){ 
    
    Route::get('/', function () {
        return redirect()->route('login-bs-validation');
    })->name('/');

    Route::view('login', 'authentication.login-bs-validation')->name('login');

});

Route::get('notifications_reminder', [Admin\NotificationController::class, 'reminder'])->name('admin.notifications.reminder');


Route::get('contact_us', [Admin\ContactUsControll::class, 'index'])->name('admin.contact_us.index');
// Route::view('/contact_us', 'admin/contact/index');



Route::group(['middleware' => ['auth:admin','CheckUserActiviation']], function(){ 
    
    Route::prefix('dashboard')->group(function () {
        // SpecialRequestController
        Route::get('home', [Admin\StatisticsController::class, 'index'])->name('index');
        Route::get('/seller/details', [Admin\StatisticsController::class, 'getSellerDetails'])->name('seller.details');

        Route::get('permissions/{id}', [Admin\RolePermissionController::class, 'show'])->name('admin.permission');
        Route::post('role_permissions', [Admin\RolePermissionController::class, 'update'])->name('admin.role_permission');

        Route::resource('city', 'Admin\CityController');
        Route::get('get_city', [Admin\CityController::class,'get_city'])->name('get_city');
        Route::get('city/{id}/edit', [Admin\CityController::class,'edit'])->name('dashboard.city.edit');
        Route::post('edit_city', [Admin\CityController::class, 'update'])->name('dashboard.city.update');
        Route::delete('delete_city', [Admin\CityController::class, 'destroy'])->name('dashboard.city.destroy');

        Route::resource('discounts', 'Admin\DiscountController');
        Route::get('change_active\{id}',[Admin\DiscountController::class, 'changeActive'])->name('change_active');
        // Route::view('home', 'dashboard.index')->name('index');

        Route::view('dashboard-02', 'dashboard.dashboard-02')->name('dashboard-02');
        Route::resource('banner', 'Admin\BannerController');
        Route::post('edit_banner', [Admin\BannerController::class, 'update'])->name('dashboard.banner.update');
        Route::delete('delete_banner', [Admin\BannerController::class, 'destroy'])->name('dashboard.banner.destroy');
        Route::resource('slider', 'Admin\SliderController');
        Route::post('edit_slider', [Admin\SliderController::class, 'update'])->name('dashboard.slider.update');
        Route::delete('delete_slider', [Admin\SliderController::class, 'destroy'])->name('slider.destroy');
        Route::resource('category', 'Admin\CategoryController');
            Route::get('category_details\{id}', [Admin\CategoryController::class, 'details'])->name('category_details');
            
        Route::get('category_updateStatus\{id}', [Admin\CategoryController::class, 'updateStatus'])->name('category_updateStatus');
        Route::post('edit_category', [Admin\CategoryController::class, 'update'])->name('category.update');
        
          
    
        // Route::resource('sections', 'Admin\SectionsController');

        // Route::post('edit_section', [Admin\SectionsController::class, 'update'])->name('sections.update');

        Route::resource('attributes', AttributeController::class);
        Route::get('attributes/{id}/enable', [AttributeController::class, 'enable'])->name('attributes.enable');
        Route::delete('attributes/delete', [AttributeController::class, 'destroy'])->name('attributes.delete');
        
        
        Route::resource('category-attributes', Admin\CategoryAttributeController::class);
        Route::delete('category-attributes/delete', [Admin\CategoryAttributeController::class, 'destroy'])->name('categories_attributes.delete');

        Route::get('category-attributes/{id}/enable', [Admin\CategoryAttributeController::class, 'enable'])->name('category-attributes.enable');


    });


    Route::resource('discounts', 'Admin\DiscountController');
    Route::get('change_active\{id}',[Admin\DiscountController::class, 'changeActive'])->name('change_active');

    Route::prefix('events')->group(function () {
            
        Route::get('daily_events', [Admin\DailyEventController::class, 'events'])->name('daily_events.index');
        Route::post('daily_events\{id}', [Admin\DailyEventController::class, 'destroy'])->name('daily_events.destroy');
        Route::post('daily_events/rejection', [Admin\DailyEventController::class, 'rejection'])->name('daily_events.rejection');
        
        
        
        Route::get('daily_event_details\{id}', [Admin\DailyEventController::class, 'details'])->name('daily_events.details');
        Route::get('daily_event_status\{id}', [Admin\DailyEventController::class, 'changeStatus'])->name('daily_events.change_status');
        
        Route::get('daily_events/create', [Admin\DailyEventController::class, 'create'])->name('daily_events.create');
        
        Route::resource('event_category', 'Admin\EventCategoryController');
        Route::post('edit_event_category', [Admin\EventCategoryController::class, 'update'])->name('event_category.update');
        Route::post('edit_event_category\{id}', [Admin\EventCategoryController::class, 'destroy'])->name('event_category.destroy');
        Route::post('\event-categories\{id}\move-up', [Admin\EventCategoryController::class, 'moveUp'])->name('event-categories.moveUp');
        Route::post('\event-categories\{id}\move-down', [Admin\EventCategoryController::class, 'moveDown'])->name('event-categories.moveDown');
        
    });
        



    Route::prefix('users')->group(function () {


        Route::get('clients', [Admin\UsersController::class, 'index'])->name('admin.clients');

        Route::post('clients', [Admin\UsersController::class, 'resetPassword'])->name('admin.clients.reset_password');
        
        Route::get('we', [Admin\AdminController::class, 'update']);

        Route::resource('admins', 'Admin\AdminController');

        // Route::resource('consultants', 'Admin\ConsultantsController');
        // Route::post('update_consultant\{id}', [Admin\ConsultantsController::class, 'update'])->name('consultant.update');

        Route::resource('seller', 'Admin\SellerController');
        Route::put('update_seller\{id}', [Admin\SellerController::class, 'update'])->name('seller.update');
        Route::post('change_activity_status', [Admin\SellerController::class, 'changeActivityStatus'])->name('seller.change_activity_status');
        
        Route::resource('driver', 'Admin\DriverController');
        Route::put('update_driver\{id}', [Admin\DriverController::class, 'update'])->name('driver.update');
        Route::post('change_driver_status', [Admin\DriverController::class, 'changeActivityStatus'])->name('driver.change_activity_status');

        Route::resource('roles', 'Admin\RoleController');
        Route::post('edit_role', [Admin\RoleController::class, 'update'])->name('roles.update');

    });


    Route::get('logout', [Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');

    Route::prefix('chat')->group(function () {
        // Route::get('view_consultations', [Admin\ConsultationsController::class, 'index'])->name('admin.consultation.index');
        // Route::get('view_consultation\{id}', [Admin\ConsultationsController::class, 'details'])->name('admin.consultation.review');
    });
  
    Route::prefix('settings')->group(function () {
        Route::get('settings', [Admin\AboutUsController::class, 'edit'])->name('settings.edit');
        Route::post('edit_settings', [Admin\AboutUsController::class, 'update'])->name('settings.update');
    });

    Route::prefix('evaluations')->group(function () {
        // Route::get('view_evaluations', [Admin\EvaluationController::class, 'index'])->name('admin.evaluations.index');
        // Route::get('view_evaluations2', [Admin\EvaluationController::class, 'index'])->name('admin_evaluations');
        
        // Route::get('accept_evaluation/{id}', [Admin\EvaluationController::class, 'accept'])->name('admin.evaluations.accept');
        
        // Route::get('refuse_evaluation/{id}', [Admin\EvaluationController::class, 'refuse'])->name('admin.evaluations.refuse');
    });
   
    Route::prefix('notifications')->group(function () {
        Route::get('view_notifications', [Admin\NotificationController::class, 'index'])->name('admin.notifications.index');
        Route::post('store_notification', [Admin\NotificationController::class, 'store'])->name('admin.notifications.store');
        Route::get('add_notification', [Admin\NotificationController::class, 'create'])->name('admin.notifications.create');
        Route::get('delete_notification', [Admin\NotificationController::class, 'destroy'])->name('admin.notifications.delete');
    });

    Route::prefix('orders')->group(function () {

        
        Route::get('products', [Admin\ProductController::class, 'index'])->name('product.index');
        Route::get('products/{product}/edit', [Admin\ProductController::class, 'edit'])->name('product.edit');
        Route::get('products/create', [Admin\ProductController::class, 'create'])->name('product.create');
        Route::post('products/store', [Admin\ProductController::class, 'store'])->name('product.store');
        Route::get('edit_product/{id}', [Admin\ProductController::class, 'update'])->name('product.update');
        Route::get('hide_product/{id}', [Admin\ProductController::class, 'hide_product'])->name('product.hide_product');
        Route::put('updateProduct/{id}', [Admin\ProductController::class, 'updateProduct'])->name('product.updateProduct');

        Route::get('orders', [Admin\OrderController::class, 'index'])->name('order.index');
        Route::get('orders/completed', [Admin\OrderController::class, 'index'])->name('order.completed');
        Route::get('orders/new', [Admin\OrderController::class, 'index'])->name('order.new');
        Route::get('orders/under_preparation', [Admin\OrderController::class, 'index'])->name('order.under_preparation');
        
        Route::get('order/{id}', [Admin\OrderController::class, 'details'])->name('order.details');
        Route::get('invoice/{id}', [Admin\OrderController::class, 'generateInvoice'])->name('order.generate_nvoice');
        Route::get('invoice/show/{id}', [Admin\OrderController::class, 'ShowInvoice'])->name('order.show_invoice');
        Route::get('change_status/{id}/{action}', [Admin\OrderController::class, 'changeOrderStatus'])->name('order.change_status');
        Route::post('assign_driver', [Admin\OrderController::class, 'assignDriver'])->name('order.assign_driver');

     

        // Route::get('packages',[Admin\PackageController::class, 'index'])->name('admin.packages');
        // Route::get('subscriptions',[Admin\PackageController::class, 'subscriptions'])->name('admin.subscriptions');
        // Route::post('packages',[Admin\PackageController::class, 'store'])->name('admin.package.store');
        // Route::post('edit_package',[Admin\PackageController::class, 'update'])->name('admin.package.edit');
        // Route::get('delete_package',[Admin\PackageController::class, 'destroy'])->name('admin.package.delete');
    });
    
    Route::prefix('special_request')->group(function () {
        Route::get('index', [Admin\SpecialRequestController::class, 'index'])->name('admin.specialRequest.index');
        Route::get('details/{id}', [Admin\SpecialRequestController::class, 'details'])->name('admin.specialRequest.details');
        Route::get('{id}/create', [Admin\SpecialRequestController::class, 'create'])->name('admin.specialRequest.create');
        Route::post('{id}/store', [Admin\SpecialRequestController::class, 'store'])->name('admin.specialRequest.store');
    });

    Route::prefix('seller_services')->group(function () {
        Route::get('index', [Admin\SellerServicesController::class, 'index'])->name('admin.sellerServices.index');
        Route::get('edit_availability/{id}', [Admin\SellerServicesController::class, 'updateAvailability'])->name('admin.sellerServices.updateAvailability');
        Route::get('create', [Admin\SellerServicesController::class, 'create'])->name('admin.sellerServices.create');
        Route::post('/store', [Admin\SellerServicesController::class, 'store'])->name('admin.sellerServices.store');

        Route::get('/get-categories-by-seller', [Admin\SellerServicesController::class, 'getCategoriesBySeller'])->name('admin.sellerServices.get.categories.by.seller');
        Route::get('/get-products-by-category', [Admin\SellerServicesController::class, 'getProductsByCategory'])->name('admin.productServices.get.products.by.category');



    });




// seller serves availability 



});

Route::post('login', [Admin\Auth\LoginController::class, 'login'])->name('admin.login');


Route::get('/', function () {
    return redirect()->route('login');
})->name('/');
Route::view('login-bs-validation','authentication.login-bs-validation')->name('login-bs-validation');
//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'de', 'es','fr','pt', 'cn', 'ae'])) {
        abort(400);
    }   
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');
    


Route::prefix('widgets')->group(function () {
    Route::view('general-widget', 'widgets.general-widget')->name('general-widget');
    Route::view('chart-widget', 'widgets.chart-widget')->name('chart-widget');
});

Route::prefix('page-layouts')->group(function () {
    Route::view('box-layout', 'page-layout.box-layout')->name('box-layout');    
    Route::view('layout-rtl', 'page-layout.layout-rtl')->name('layout-rtl');    
    Route::view('layout-dark', 'page-layout.layout-dark')->name('layout-dark');    
    Route::view('hide-on-scroll', 'page-layout.hide-on-scroll')->name('hide-on-scroll');    
    Route::view('footer-light', 'page-layout.footer-light')->name('footer-light');    
    Route::view('footer-dark', 'page-layout.footer-dark')->name('footer-dark');    
    Route::view('footer-fixed', 'page-layout.footer-fixed')->name('footer-fixed');    
}); 

Route::prefix('project')->group(function () {
    Route::view('projects', 'project.projects')->name('projects');
    Route::view('projectcreate', 'project.projectcreate')->name('projectcreate');
});

Route::view('file-manager', 'file-manager')->name('file-manager');
Route::view('kanban', 'kanban')->name('kanban');

Route::prefix('ecommerce')->group(function () {
    Route::view('product', 'apps.product')->name('product');
    Route::view('product-page', 'apps.product-page')->name('product-page');
    Route::view('list-products', 'apps.list-products')->name('list-products');
    Route::view('payment-details', 'apps.payment-details')->name('payment-details');
    Route::view('order-history', 'apps.order-history')->name('order-history');
    Route::view('invoice-template', 'apps.invoice-template')->name('invoice-template');
    Route::view('cart', 'apps.cart')->name('cart');
    Route::view('list-wish', 'apps.list-wish')->name('list-wish');
    Route::view('checkout', 'apps.checkout')->name('checkout');
    Route::view('pricing', 'apps.pricing')->name('pricing');
});

Route::prefix('email')->group(function () {
    Route::view('email-application', 'apps.email-application')->name('email-application');
    Route::view('email-compose', 'apps.email-compose')->name('email-compose');
});

Route::prefix('chat')->group(function () {
    Route::view('chat', 'apps.chat')->name('chat');
    Route::view('chat-video', 'apps.chat-video')->name('chat-video');
});

Route::prefix('users')->group(function () {
    Route::view('user-profile', 'apps.user-profile')->name('user-profile');
    Route::view('edit-profile', 'apps.edit-profile')->name('edit-profile');
    Route::view('user-cards', 'apps.user-cards')->name('user-cards');
});


Route::view('bookmark', 'apps.bookmark')->name('bookmark');
Route::view('contacts', 'apps.contacts')->name('contacts');
Route::view('task', 'apps.task')->name('task');
Route::view('calendar-basic', 'apps.calendar-basic')->name('calendar-basic');
Route::view('social-app', 'apps.social-app')->name('social-app');
Route::view('to-do', 'apps.to-do')->name('to-do');
Route::view('search', 'apps.search')->name('search');

Route::prefix('ui-kits')->group(function () {
    Route::view('state-color', 'ui-kits.state-color')->name('state-color');
    Route::view('typography', 'ui-kits.typography')->name('typography');
    Route::view('avatars', 'ui-kits.avatars')->name('avatars');
    Route::view('helper-classes', 'ui-kits.helper-classes')->name('helper-classes');
    Route::view('grid', 'ui-kits.grid')->name('grid');
    Route::view('tag-pills', 'ui-kits.tag-pills')->name('tag-pills');
    Route::view('progress-bar', 'ui-kits.progress-bar')->name('progress-bar');
    Route::view('modal', 'ui-kits.modal')->name('modal');
    Route::view('alert', 'ui-kits.alert')->name('alert');
    Route::view('popover', 'ui-kits.popover')->name('popover');
    Route::view('tooltip', 'ui-kits.tooltip')->name('tooltip');
    Route::view('loader', 'ui-kits.loader')->name('loader');
    Route::view('dropdown', 'ui-kits.dropdown')->name('dropdown');
    Route::view('accordion', 'ui-kits.accordion')->name('accordion');
    Route::view('tab-bootstrap', 'ui-kits.tab-bootstrap')->name('tab-bootstrap');
    Route::view('tab-material', 'ui-kits.tab-material')->name('tab-material');
    Route::view('box-shadow', 'ui-kits.box-shadow')->name('box-shadow');
    Route::view('list', 'ui-kits.list')->name('list');
});

Route::prefix('bonus-ui')->group(function () {
    Route::view('scrollable', 'bonus-ui.scrollable')->name('scrollable');
    Route::view('tree', 'bonus-ui.tree')->name('tree');
    Route::view('bootstrap-notify', 'bonus-ui.bootstrap-notify')->name('bootstrap-notify');
    Route::view('rating', 'bonus-ui.rating')->name('rating');
    Route::view('dropzone', 'bonus-ui.dropzone')->name('dropzone');
    Route::view('tour', 'bonus-ui.tour')->name('tour');
    Route::view('sweet-alert2', 'bonus-ui.sweet-alert2')->name('sweet-alert2');
    Route::view('modal-animated', 'bonus-ui.modal-animated')->name('modal-animated');
    Route::view('owl-carousel', 'bonus-ui.owl-carousel')->name('owl-carousel');
    Route::view('ribbons', 'bonus-ui.ribbons')->name('ribbons');
    Route::view('pagination', 'bonus-ui.pagination')->name('pagination');
    Route::view('breadcrumb', 'bonus-ui.breadcrumb')->name('breadcrumb');
    Route::view('range-slider', 'bonus-ui.range-slider')->name('range-slider');
    Route::view('image-cropper', 'bonus-ui.image-cropper')->name('image-cropper');
    Route::view('sticky', 'bonus-ui.sticky')->name('sticky');
    Route::view('basic-card', 'bonus-ui.basic-card')->name('basic-card');
    Route::view('creative-card', 'bonus-ui.creative-card')->name('creative-card');
    Route::view('tabbed-card', 'bonus-ui.tabbed-card')->name('tabbed-card');
    Route::view('dragable-card', 'bonus-ui.dragable-card')->name('dragable-card');
    Route::view('timeline-v-1', 'bonus-ui.timeline-v-1')->name('timeline-v-1');
    Route::view('timeline-v-2', 'bonus-ui.timeline-v-2')->name('timeline-v-2');
    Route::view('timeline-small', 'bonus-ui.timeline-small')->name('timeline-small');
});

Route::prefix('builders')->group(function () {
    Route::view('form-builder-1', 'builders.form-builder-1')->name('form-builder-1');
    Route::view('form-builder-2', 'builders.form-builder-2')->name('form-builder-2');
    Route::view('pagebuild', 'builders.pagebuild')->name('pagebuild');
    Route::view('button-builder', 'builders.button-builder')->name('button-builder');
});

Route::prefix('animation')->group(function () {
    Route::view('animate', 'animation.animate')->name('animate');
    Route::view('scroll-reval', 'animation.scroll-reval')->name('scroll-reval');
    Route::view('aos', 'animation.aos')->name('aos');
    Route::view('tilt', 'animation.tilt')->name('tilt');
    Route::view('wow', 'animation.wow')->name('wow');
});


Route::prefix('icons')->group(function () {
    Route::view('flag-icon', 'icons.flag-icon')->name('flag-icon');
    Route::view('font-awesome', 'icons.font-awesome')->name('font-awesome');
    Route::view('ico-icon', 'icons.ico-icon')->name('ico-icon');
    Route::view('themify-icon', 'icons.themify-icon')->name('themify-icon');
    Route::view('feather-icon', 'icons.feather-icon')->name('feather-icon');
    Route::view('whether-icon', 'icons.whether-icon')->name('whether-icon');
    Route::view('simple-line-icon', 'icons.simple-line-icon')->name('simple-line-icon');
    Route::view('material-design-icon', 'icons.material-design-icon')->name('material-design-icon');
    Route::view('pe7-icon', 'icons.pe7-icon')->name('pe7-icon');
    Route::view('typicons-icon', 'icons.typicons-icon')->name('typicons-icon');
    Route::view('ionic-icon', 'icons.ionic-icon')->name('ionic-icon');
});

Route::prefix('buttons')->group(function () {
    Route::view('buttons', 'buttons.buttons')->name('buttons');
    Route::view('buttons-flat', 'buttons.buttons-flat')->name('buttons-flat');
    Route::view('buttons-edge', 'buttons.buttons-edge')->name('buttons-edge');
    Route::view('raised-button', 'buttons.raised-button')->name('raised-button');
    Route::view('button-group', 'buttons.button-group')->name('button-group');
});

Route::prefix('forms')->group(function () {
    Route::view('form-validation', 'forms.form-validation')->name('form-validation');
    Route::view('base-input', 'forms.base-input')->name('base-input');
    Route::view('radio-checkbox-control', 'forms.radio-checkbox-control')->name('radio-checkbox-control');
    Route::view('input-group', 'forms.input-group')->name('input-group');
    Route::view('megaoptions', 'forms.megaoptions')->name('megaoptions');
    Route::view('datepicker', 'forms.datepicker')->name('datepicker');
    Route::view('time-picker', 'forms.time-picker')->name('time-picker');
    Route::view('datetimepicker', 'forms.datetimepicker')->name('datetimepicker');
    Route::view('daterangepicker', 'forms.daterangepicker')->name('daterangepicker');
    Route::view('touchspin', 'forms.touchspin')->name('touchspin');
    Route::view('select2', 'forms.select2')->name('select2');
    Route::view('switch', 'forms.switch')->name('switch');
    Route::view('typeahead', 'forms.typeahead')->name('typeahead');
    Route::view('clipboard', 'forms.clipboard')->name('clipboard');
    Route::view('default-form', 'forms.default-form')->name('default-form');
    Route::view('form-wizard', 'forms.form-wizard')->name('form-wizard');
    Route::view('form-wizard-two', 'forms.form-wizard-two')->name('form-wizard-two');
    Route::view('form-wizard-three', 'forms.form-wizard-three')->name('form-wizard-three');
    Route::post('form-wizard-three', function(){
        return redirect()->route('form-wizard-three');
    })->name('form-wizard-three-post');
});

Route::prefix('tables')->group(function () {
    Route::view('bootstrap-basic-table', 'tables.bootstrap-basic-table')->name('bootstrap-basic-table');
    Route::view('bootstrap-sizing-table', 'tables.bootstrap-sizing-table')->name('bootstrap-sizing-table');
    Route::view('bootstrap-border-table', 'tables.bootstrap-border-table')->name('bootstrap-border-table');
    Route::view('bootstrap-styling-table', 'tables.bootstrap-styling-table')->name('bootstrap-styling-table');
    Route::view('table-components', 'tables.table-components')->name('table-components');
    Route::view('datatable-basic-init', 'tables.datatable-basic-init')->name('datatable-basic-init');
    Route::view('datatable-advance', 'tables.datatable-advance')->name('datatable-advance');
    Route::view('datatable-styling', 'tables.datatable-styling')->name('datatable-styling');
    Route::view('datatable-ajax', 'tables.datatable-ajax')->name('datatable-ajax');
    Route::view('datatable-server-side', 'tables.datatable-server-side')->name('datatable-server-side');
    Route::view('datatable-plugin', 'tables.datatable-plugin')->name('datatable-plugin');
    Route::view('datatable-api', 'tables.datatable-api')->name('datatable-api');
    Route::view('datatable-data-source', 'tables.datatable-data-source')->name('datatable-data-source');
    Route::view('datatable-ext-autofill', 'tables.datatable-ext-autofill')->name('datatable-ext-autofill');
    Route::view('datatable-ext-basic-button', 'tables.datatable-ext-basic-button')->name('datatable-ext-basic-button');
    Route::view('datatable-ext-col-reorder', 'tables.datatable-ext-col-reorder')->name('datatable-ext-col-reorder');
    Route::view('datatable-ext-fixed-header', 'tables.datatable-ext-fixed-header')->name('datatable-ext-fixed-header');
    Route::view('datatable-ext-html-5-data-export', 'tables.datatable-ext-html-5-data-export')->name('datatable-ext-html-5-data-export');
    Route::view('datatable-ext-key-table', 'tables.datatable-ext-key-table')->name('datatable-ext-key-table');
    Route::view('datatable-ext-responsive', 'tables.datatable-ext-responsive')->name('datatable-ext-responsive');
    Route::view('datatable-ext-row-reorder', 'tables.datatable-ext-row-reorder')->name('datatable-ext-row-reorder');
    Route::view('datatable-ext-scroller', 'tables.datatable-ext-scroller')->name('datatable-ext-scroller');
    Route::view('jsgrid-table', 'tables.jsgrid-table')->name('jsgrid-table');
});

Route::prefix('charts')->group(function () {
    Route::view('echarts', 'charts.echarts')->name('echarts');
    Route::view('chart-apex', 'charts.chart-apex')->name('chart-apex');
    Route::view('chart-google', 'charts.chart-google')->name('chart-google');
    Route::view('chart-sparkline', 'charts.chart-sparkline')->name('chart-sparkline');
    Route::view('chart-flot', 'charts.chart-flot')->name('chart-flot');
    Route::view('chart-knob', 'charts.chart-knob')->name('chart-knob');
    Route::view('chart-morris', 'charts.chart-morris')->name('chart-morris');
    Route::view('chartjs', 'charts.chartjs')->name('chartjs');
    Route::view('chartist', 'charts.chartist')->name('chartist');
    Route::view('chart-peity', 'charts.chart-peity')->name('chart-peity');
});

Route::view('sample-page', 'pages.sample-page')->name('sample-page');
Route::view('internationalization', 'pages.internationalization')->name('internationalization');

Route::prefix('starter-kit')->group(function () {
});

Route::prefix('others')->group(function () {
    Route::view('400', 'errors.400')->name('error-400');
    Route::view('401', 'errors.401')->name('error-401');
    Route::view('403', 'errors.403')->name('error-403');
    Route::view('404', 'errors.404')->name('error-404');
    Route::view('500', 'errors.500')->name('error-500');
    Route::view('503', 'errors.503')->name('error-503');
});

Route::prefix('authentication')->group(function () {
    // Route::view('login', 'authentication.login-bs-validation')->name('login');
    Route::view('login-one', 'authentication.login-one')->name('login-one');
    Route::view('login-two', 'authentication.login-two')->name('login-two');
    Route::view('login-bs-tt-validation', 'authentication.login-bs-tt-validation')->name('login-bs-tt-validation');
    Route::view('login-sa-validation', 'authentication.login-sa-validation')->name('login-sa-validation');
    Route::view('sign-up', 'authentication.sign-up')->name('sign-up');
    Route::view('sign-up-one', 'authentication.sign-up-one')->name('sign-up-one');
    Route::view('sign-up-two', 'authentication.sign-up-two')->name('sign-up-two');
    Route::view('sign-up-wizard', 'authentication.sign-up-wizard')->name('sign-up-wizard');
    Route::view('unlock', 'authentication.unlock')->name('unlock');
    Route::view('forget-password', 'authentication.forget-password')->name('forget-password');
    Route::view('reset-password', 'authentication.reset-password')->name('reset-password');
    Route::view('maintenance', 'authentication.maintenance')->name('maintenance');
});

Route::view('comingsoon', 'comingsoon.comingsoon')->name('comingsoon');
Route::view('comingsoon-bg-video', 'comingsoon.comingsoon-bg-video')->name('comingsoon-bg-video');
Route::view('comingsoon-bg-img', 'comingsoon.comingsoon-bg-img')->name('comingsoon-bg-img');

Route::view('basic-template', 'email-templates.basic-template')->name('basic-template');
Route::view('email-header', 'email-templates.email-header')->name('email-header');
Route::view('template-email', 'email-templates.template-email')->name('template-email');
Route::view('template-email-2', 'email-templates.template-email-2')->name('template-email-2');
Route::view('ecommerce-templates', 'email-templates.ecommerce-templates')->name('ecommerce-templates');
Route::view('email-order-success', 'email-templates.email-order-success')->name('email-order-success');


Route::prefix('gallery')->group(function () {
    Route::view('/', 'apps.gallery')->name('gallery');
    Route::view('gallery-with-description', 'apps.gallery-with-description')->name('gallery-with-description');
    Route::view('gallery-masonry', 'apps.gallery-masonry')->name('gallery-masonry');
    Route::view('masonry-gallery-with-disc', 'apps.masonry-gallery-with-disc')->name('masonry-gallery-with-disc');
    Route::view('gallery-hover', 'apps.gallery-hover')->name('gallery-hover');
});

Route::prefix('blog')->group(function () {
    Route::view('/', 'apps.blog')->name('blog');
    Route::view('blog-single', 'apps.blog-single')->name('blog-single');
    Route::view('add-post', 'apps.add-post')->name('add-post');
});


Route::view('faq', 'apps.faq')->name('faq');

Route::prefix('job-search')->group(function () {
    Route::view('job-cards-view', 'apps.job-cards-view')->name('job-cards-view');
    Route::view('job-list-view', 'apps.job-list-view')->name('job-list-view');
    Route::view('job-details', 'apps.job-details')->name('job-details');
    Route::view('job-apply', 'apps.job-apply')->name('job-apply');
});

Route::prefix('learning')->group(function () {
    Route::view('learning-list-view', 'apps.learning-list-view')->name('learning-list-view');
    Route::view('learning-detailed', 'apps.learning-detailed')->name('learning-detailed');
});

Route::prefix('maps')->group(function () {
    Route::view('map-js', 'apps.map-js')->name('map-js');
    Route::view('vector-map', 'apps.vector-map')->name('vector-map');
});

Route::prefix('editors')->group(function () {
    Route::view('summernote', 'apps.summernote')->name('summernote');
    Route::view('ckeditor', 'apps.ckeditor')->name('ckeditor');
    Route::view('simple-mde', 'apps.simple-mde')->name('simple-mde');
    Route::view('ace-code-editor', 'apps.ace-code-editor')->name('ace-code-editor');
});

Route::view('knowledgebase', 'apps.knowledgebase')->name('knowledgebase');
Route::view('support-ticket', 'apps.support-ticket')->name('support-ticket');
Route::view('landing-page', 'pages.landing-page')->name('landing-page');

Route::prefix('layouts')->group(function () {
    Route::view('compact-sidebar', 'admin_unique_layouts.compact-sidebar'); //default //Dubai
    Route::view('box-layout', 'admin_unique_layouts.box-layout');    //default //New York //
    Route::view('dark-sidebar', 'admin_unique_layouts.dark-sidebar');

    Route::view('default-body', 'admin_unique_layouts.default-body');
    Route::view('compact-wrap', 'admin_unique_layouts.compact-wrap');
    Route::view('enterprice-type', 'admin_unique_layouts.enterprice-type');

    Route::view('compact-small', 'admin_unique_layouts.compact-small');
    Route::view('advance-type', 'admin_unique_layouts.advance-type');
    Route::view('material-layout', 'admin_unique_layouts.material-layout');

    Route::view('color-sidebar', 'admin_unique_layouts.color-sidebar');
    Route::view('material-icon', 'admin_unique_layouts.material-icon');
    Route::view('modern-layout', 'admin_unique_layouts.modern-layout');
});

Route::get('layout-{light}', function($light){
    session()->put('layout', $light);
    session()->get('layout');
    if($light == 'vertical-layout')
    {
        return redirect()->route('pages-vertical-layout');
    }
    return redirect()->route('index');
    // return 1;
});

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');