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
    if ($this->app->environment('production')) {
        URL::forceScheme('https');
    }

    try {
        if (DB::getDriverName() === 'pgsql') {
            // Ambil nama schema dari .env, default ke "public"
            $schema = env('DB_SCHEMA', 'public');
            DB::statement("SET search_path TO {$schema}");
        }
    } catch (\Throwable $e) {
        // Jangan gagal total saat build/deploy
        // Jika perlu debug: Log::error($e->getMessage());
    }
}

    
}
