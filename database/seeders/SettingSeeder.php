<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'site_name' => 'SysDev Digital',
            'email'     => 'admin@sysdev.com',
            'phone'     => '+62 812-3456-7890',
            'address'   => 'Jl. Jendral Sudirman No. Kav 50, Jakarta Selatan',
            'facebook'  => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'linkedin'  => 'https://linkedin.com',
        ]);
    }
}