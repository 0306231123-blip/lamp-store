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
        Schema::create('user', function (Blueprint $table) {
    $table->string('UserName', 50);
    $table->string('Name', 50);
    $table->integer('SDT');
    $table->longText('Email');
    $table->string('Pass', 20);
    $table->integer('Role');
    $table->string('TrangThai', 50);
    $table->primary(['UserName', 'Name']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
