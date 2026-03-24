<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(
            ['email' => 'admin@sysdev.com'],
            [
                'site_name' => 'SysDev Digital',
                'phone' => '+62 812-3456-7890',
                'address' => 'Jl. Jendral Sudirman No. Kav 50, Jakarta Selatan',
                'facebook' => 'https://facebook.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'theme_color' => '#4dabf7',
                'show_hero' => 1,
                'show_partners' => 1,
                'show_services' => 1,
                'show_pricing' => 1,
                'show_portfolio' => 1,
                'show_testimonials' => 1,
                'show_contact' => 1,
            ]
        );
    }
}