<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // (Yang buat HTTPS tadi)
use Illuminate\Support\Facades\View; // <--- WAJIB TAMBAH INI
use App\Models\Setting; // <--- WAJIB TAMBAH INI (Supaya model Setting dikenali)

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
        // Paksa HTTPS (Jika ada kode ini sebelumnya)
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Share Pengaturan Website ke Semua View
        try {
            // PENTING: Karena kita sudah tambah 'use' di atas,
            // maka di sini cukup panggil View:: dan Setting:: saja.
            View::share('site_settings', Setting::first());
        } catch (\Exception $e) {
            // Do nothing (agar tidak error saat migrate awal)
        }
    }
}
