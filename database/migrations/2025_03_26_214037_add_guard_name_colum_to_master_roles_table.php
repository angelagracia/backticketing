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
        Schema::table('master_roles', function (Blueprint $table) {
            $table->string('name', 100)->after('id');
            $table->string('guard_name', 255)->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('master_roles', function (Blueprint $table) {
            //
        });
    }
};
