<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Events\ConnectionEstablished;
use Illuminate\Support\ServiceProvider; // ✅ Tambahkan ini!

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

        // Jalankan hanya saat koneksi database berhasil
        Event::listen(ConnectionEstablished::class, function (ConnectionEstablished $event) {
            if ($event->connection->getDriverName() === 'pgsql') {
                $schema = env('DB_SCHEMA', 'public');
                $event->connection->statement("SET search_path TO {$schema}");
            }
        });
    }
}
