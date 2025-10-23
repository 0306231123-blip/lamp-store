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
        Schema::create('danhmuc', function (Blueprint $table) {
    $table->integer('ID')->primary();
    $table->string('TenDM', 50);
    $table->string('TrangThai', 100);
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhmuc');
    }
};
