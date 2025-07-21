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
    use Illuminate\Support\Facades\DB;

public function boot(): void
{
    // Set schema PostgreSQL Supabase
    DB::statement('SET search_path TO reservasi');
}

}
