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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('location')->nullable();
            $table->integer('category')->nullable();
            $table->string('company_name')->nullable();
            $table->date('date')->nullable();
            $table->string('job_type')->nullable();
            $table->longText('description')->nullable();
            $table->string('salary_rang')->nullable();
            $table->integer('school_type')->nullable();
            $table->integer('specialism')->nullable();
            $table->integer('position_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
