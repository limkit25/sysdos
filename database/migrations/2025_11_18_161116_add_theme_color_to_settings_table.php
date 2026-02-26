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
        // Default warna biru muda seperti yang Anda minta sebelumnya (#4dabf7)
        $table->string('theme_color')->default('#4dabf7')->after('address');
    });
}

public function down(): void
{
    Schema::table('settings', function (Blueprint $table) {
        $table->dropColumn('theme_color');
    });
}
};
