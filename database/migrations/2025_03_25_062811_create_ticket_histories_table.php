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
        Schema::create('ticket_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('status_id');
            $table->text('description');
            $table->timestamps(); // Ini secara otomatis menambahkan created_at dan updated_at
    
            // Relasi ke tabel tickets
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            
            // Relasi ke tabel master_status
            $table->foreign('status_id')->references('id')->on('master_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_histories');
    }
};
