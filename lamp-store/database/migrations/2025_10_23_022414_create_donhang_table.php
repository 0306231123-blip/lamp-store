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
        Schema::create('donhang', function (Blueprint $table) {
    $table->integer('IDDonHang')->primary();
    $table->integer('UserID');
    $table->dateTime('TGMua');
    $table->integer('UserID_Sale');
    $table->string('TrangThai', 50);
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donhang');
    }
};
