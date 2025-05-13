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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description_one');
            $table->string('description_two');

            $table->string('alt_one')->nullable();
            $table->string('alt_two')->nullable();
            $table->string('alt_three')->nullable();
            $table->string('alt_four')->nullable();
            $table->string('alt_five')->nullable();
            $table->string('alt_six')->nullable();

            $table->string('slug')->unique()->nullable();
 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
