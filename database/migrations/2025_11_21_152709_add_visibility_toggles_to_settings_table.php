<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('settings', function (Blueprint $table) {
        // Default true artinya section tampil secara bawaan
        $table->boolean('show_hero')->default(true);
        $table->boolean('show_partners')->default(true);
        $table->boolean('show_services')->default(true);
        $table->boolean('show_pricing')->default(true);
        $table->boolean('show_portfolio')->default(true);
        $table->boolean('show_testimonials')->default(true);
        $table->boolean('show_contact')->default(true);
    });
}

public function down(): void
{
    Schema::table('settings', function (Blueprint $table) {
        $table->dropColumn([
            'show_hero', 'show_partners', 'show_services', 'show_pricing', 
            'show_portfolio', 'show_testimonials', 'show_contact'
        ]);
    });
}
};
