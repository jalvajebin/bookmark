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
        Schema::dropIfExists('jobs');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('table_name', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->decimal('salary_min', 8, 2);
            $table->decimal('salary_max', 8, 2);
            $table->date('posted_date');
            $table->date('start_date')->nullable();
            $table->string('alt')->nullable();
            $table->text('description');
            $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }
};
