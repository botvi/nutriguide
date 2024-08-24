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
        Schema::create('data_ceks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('rentang_umur');
            $table->string('waktu_makan');
            $table->string('menu');
            $table->json('bahan_makanan'); // Store as JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_ceks');
    }
};
