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
        Schema::create('learn_about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('heading')->nullable();
            $table->string('button_title')->nullable();
            $table->string('button_link')->nullable();
            $table->longText('employee_description')->nullable();
            $table->string('employee_content_1')->nullable();
            $table->string('employee_content_2')->nullable();
            $table->string('employee_content_3')->nullable();
            $table->longText('employer_description')->nullable();
            $table->string('employer_content_1')->nullable();
            $table->string('employer_content_2')->nullable();
            $table->string('employer_content_3')->nullable();
            $table->string('employee_alt')->nullable();
            $table->string('employer_alt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learn_about_us');
    }
};
