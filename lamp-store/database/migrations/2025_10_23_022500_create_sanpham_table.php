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
        Schema::create('sanpham', function (Blueprint $table) {
    $table->integer('MaSP')->primary();
    $table->string('TenSP', 50);
    $table->decimal('Gia', 10, 0);
    $table->decimal('GiaKhuyenMai', 10, 0);
    $table->longText('Hinh');
    $table->string('MoTa', 50);
    $table->integer('MaDM');
    $table->string('Tags', 20);
    $table->string('TrangThai', 30);
    $table->integer('UserID');
    $table->string('Loai', 20);
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};
