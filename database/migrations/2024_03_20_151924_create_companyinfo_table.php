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
        Schema::create('companyinfo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("company_name");
            $table->string("company_contact_number");
            $table->string("company_contact_email");
            $table->integer("employees");
            $table->string("company_industry");
            $table->string("company_website");
            $table->string("looking_for");
            $table->integer("total_positions");
            $table->string("location");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companyinfo');
    }
};
