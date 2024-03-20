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
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("company_name")->default("Företags Namn");
            $table->string("company_contact_number")->default("000000000");
            $table->string("company_contact_email")->default("example@email.com");
            $table->integer("employees")->default(0);
            $table->string("company_industry")->default("");
            $table->string("company_website")->default("www.website.se");
            $table->string("looking_for")->default("What are you looking for?");
            $table->integer("total_positions")->default(0);
            $table->string("location")->default("Göteborg");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_infos');
    }
};
