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
        Schema::create('job_area_user_job', function (Blueprint $table) {
            $table->unsignedBigInteger('user_job_id');
            $table->unsignedBigInteger('job_area_id');
            $table->timestamps();

            $table->foreign('user_job_id')->references('id')->on('user_jobs')->onDelete('cascade');
            $table->foreign('job_area_id')->references('id')->on('job_areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_job_job_area');
    }
};
