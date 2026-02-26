<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['key' => 'hero', 'label' => 'Hero Section', 'blade_file' => 'sections.hero', 'order' => 1],
            ['key' => 'partners', 'label' => 'Logo Partner', 'blade_file' => 'sections.partners', 'order' => 2],
            ['key' => 'services', 'label' => 'Layanan', 'blade_file' => 'sections.services', 'order' => 3],
            ['key' => 'pricing', 'label' => 'Paket Harga', 'blade_file' => 'sections.pricing', 'order' => 4],
            ['key' => 'portfolio', 'label' => 'Portfolio', 'blade_file' => 'sections.portfolio', 'order' => 5],
            ['key' => 'testimonials', 'label' => 'Testimoni', 'blade_file' => 'sections.testimonials', 'order' => 6],
            ['key' => 'contact', 'label' => 'Kontak Form', 'blade_file' => 'sections.contact', 'order' => 7],
        ];

        foreach ($sections as $sec) {
            Section::create($sec);
        }
    }
}