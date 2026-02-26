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
    Schema::create('sections', function (Blueprint $table) {
        $table->id();
        $table->string('key');          // Identitas (hero, services, etc)
        $table->string('label');        // Nama Tampilan (Hero Section)
        $table->string('blade_file');   // Nama file view
        $table->boolean('is_visible')->default(true);
        $table->integer('order')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
