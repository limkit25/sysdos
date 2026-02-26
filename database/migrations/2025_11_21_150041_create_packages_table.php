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
    Schema::create('packages', function (Blueprint $table) {
        $table->id();
        $table->string('name');          // Nama Paket (Basic, Pro)
        $table->decimal('price', 15, 0); // Harga (1000000)
        $table->string('cycle');         // Siklus (per bulan, per project)
        $table->text('features');        // Daftar fitur (dipisah baris baru)
        $table->boolean('is_popular')->default(false); // Untuk highlight
        $table->string('cta_link')->nullable(); // Link tombol pesan
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
