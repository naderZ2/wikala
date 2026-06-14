<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Authenticate the /broadcasting/auth endpoint against every guard the
        // app uses: web/admin/seller (session) and api/seller-api/driver-api
        // (passport tokens). The `web` group supplies the session for the
        // session guards; token clients are exempt from CSRF (see VerifyCsrfToken).
        Broadcast::routes([
            'middleware' => ['web', 'auth:web,admin,seller,api,seller-api,driver-api'],
        ]);

        require base_path('routes/channels.php');
    }
}
