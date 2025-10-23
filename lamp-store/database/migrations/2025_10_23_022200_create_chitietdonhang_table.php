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
        Schema::create('chitietdonhang', function (Blueprint $table) {
    $table->integer('IDSP');
    $table->integer('IDDH');
    $table->decimal('DonGia', 10, 0);
    $table->integer('SoLuong');
    $table->primary(['IDSP', 'IDDH']);
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitietdonhang');
    }
};
