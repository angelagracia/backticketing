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
        Schema::create('ticket_confirmation_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_confirmation_id');
            $table->string('file_path');
            $table->timestamps();

            $table->foreign('ticket_confirmation_id')->references('id')->on('ticket_confirmations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_confirmation_attachments');
    }
};
