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
        Schema::create('login_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('judul');
            $table->string('no_telepon')->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('unit_kerja_id');
            $table->unsignedBigInteger('peran_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('sub_kategori_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_requests');
    }
};
