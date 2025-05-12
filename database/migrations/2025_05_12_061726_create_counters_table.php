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
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->string('counter_1_name')->nullable();
            $table->string('count1')->nullable();
            $table->string('counter_1_alt')->nullable();
            $table->string('counter_2_name')->nullable();
            $table->string('count2')->nullable();
            $table->string('counter_2_alt')->nullable();
            $table->string('counter_3_name')->nullable();
            $table->string('count3')->nullable();
            $table->string('counter_3_alt')->nullable();
            $table->string('counter_4_name')->nullable();
            $table->string('count4')->nullable();
            $table->string('counter_4_alt')->nullable();
            $table->string('counter_5_name')->nullable();
            $table->string('count5')->nullable();
            $table->string('counter_6_name')->nullable();
            $table->string('count6')->nullable();
            $table->string('counter_7_name')->nullable();
            $table->string('count7')->nullable();
            $table->string('counter_8_name')->nullable();
            $table->string('count8')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
