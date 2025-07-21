<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB; // <- letakkan di sini, DI LUAR class

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
        if (env('APP_ENV') !== 'local' && env('APP_URL') !== 'http://127.0.0.1:8000') {
            URL::forceScheme('https');
        }

        // Ganti schema ke "reservasi"
        DB::statement('SET search_path TO reservasi');
    }
}
