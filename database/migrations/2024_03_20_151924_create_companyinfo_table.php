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
            $table->string("company_name")->default("Företagsnamn");
            $table->string("company_contact_number")->nullable()->default(null);
            $table->string("company_contact_email")->nullable()->default(null);
            $table->integer("employees")->default(0);
            $table->string("company_industry")->nullable()->default(null);
            $table->string("company_website")->nullable()->default(null);
            $table->string("looking_for")->default("Vi kommer snart att söka efter nya LIA-praktikanter.");
            $table->integer("total_positions")->default(0);
            $table->string("location")->nullable()->default(null);
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
