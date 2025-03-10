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
        Schema::table('users', function (Blueprint $table) {
            $table->string('job')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->nullable(); // Agregar phone
            $table->string('address')->nullable(); // Agregar address
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['job', 'contact_number', 'image', 'phone', 'address']);        });
    }
};
