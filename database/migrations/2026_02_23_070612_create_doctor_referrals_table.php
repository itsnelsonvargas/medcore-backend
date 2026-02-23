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
        Schema::create('doctor_referrals', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('type_of_doctor')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('sex')->nullable();

            $table->string('address_region')->nullable();
            $table->string('address_province')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_barangay')->nullable();

            $table->string('office_name')->nullable();
            $table->string('schedule')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number_2')->nullable();
            $table->string('email')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_referrals');
    }
};
