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
        Schema::create('websitesetting', function (Blueprint $table) {
    $table->longText('LogoWeb');
    $table->string('TenWeb', 30)->primary();
    $table->string('MoTa', 100);
    $table->string('FB', 20);
    $table->string('YT', 20);
    $table->string('Linkedin', 50);
    $table->string('DiaChi', 50);
    $table->string('TrangThai', 50);
    $table->integer('UserID_Create');
    $table->integer('UserID_Update');
    $table->string('Map', 50);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websitesetting');
    }
};
