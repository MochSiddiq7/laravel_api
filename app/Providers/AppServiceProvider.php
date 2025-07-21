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
    // Paksa HTTPS jika di production
    if ($this->app->environment('production')) {
        URL::forceScheme('https');
    }

    // Jalankan SET search_path hanya jika pakai PostgreSQL dan database terkoneksi
    try {
        if (DB::connection()->getDriverName() === 'pgsql') {
            DB::statement('SET search_path TO reservasi');
        }
    } catch (\Exception $e) {
        // Biarkan kosong, artinya jika belum konek DB (saat package:discover), jangan error
    }
}

    
}
