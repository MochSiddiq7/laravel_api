<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
 

    public function boot(): void
    {
        // Paksa HTTPS jika bukan local
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    
        // SET schema PostgreSQL ke 'reservasi'
        DB::statement('SET search_path TO reservasi');
    }
    
}
