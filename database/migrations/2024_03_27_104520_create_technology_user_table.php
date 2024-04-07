<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('technologies_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users")->onDelete('cascade');
            $table->foreignId('technologies_id')->constrained("technologies")->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('technologies_user_job', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_job_id')->constrained("user_jobs")->onDelete('cascade');
            $table->foreignId('technologies_id')->constrained("technologies")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologies_user');
        Schema::dropIfExists('technologies_user_job');
    }
};
