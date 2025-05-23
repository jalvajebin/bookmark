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
        Schema::create('submit_cv_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date'); // Date of birth
            $table->enum('gender', ['male', 'female', 'Prefer not to say']);
            $table->string('email');
            $table->string('phone');
            $table->string('passport'); // Stored as plain ID or "other"
            $table->string('birth_country');
            $table->string('current_country');
            $table->string('teaching_destination');
            $table->text('undergrad_subject');
            $table->text('teaching_qualification_subject');
            $table->string('teaching_license');
            $table->string('current_job_title');
            $table->string('seeking_role');
            $table->enum('international_experience', ['Yes', 'No']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submit_cv_applications');
    }
};
