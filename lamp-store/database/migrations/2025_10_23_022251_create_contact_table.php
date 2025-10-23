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
       Schema::create('contact', function (Blueprint $table) {
    $table->string('Name', 50);
    $table->longText('Email');
    $table->integer('SDT');
    $table->string('Content', 100);
    $table->string('TrangThai', 20);
    $table->integer('UserID');
    $table->primary(['Name', 'UserID']);
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
