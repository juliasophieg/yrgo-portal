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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('liker_id');
            $table->unsignedBigInteger('liked_user_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('liker_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('liked_user_id')->references('id')->on('users')->onDelete('cascade');

            // Ensure a user can like another user only once
            $table->unique(['liker_id', 'liked_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
