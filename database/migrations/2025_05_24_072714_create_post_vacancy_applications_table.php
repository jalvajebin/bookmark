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
        Schema::create('post_vacancy_applications', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('school_name');
            $table->string('name'); 
            $table->string('job_title');
            $table->text('address');
            $table->string('city');
            $table->string('country');
            $table->string('email');
            $table->string('phone');
            $table->string('curriculum'); 
            $table->integer('vacancy');
            $table->boolean('privacy_notice_accepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_vacancy_applications');
    }
};
