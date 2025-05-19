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
        Schema::create('career_hubs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('tag')->nullable();
            $table->timestamp('date')->nullable();
            $table->longText('description')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_hubs');
    }
};
