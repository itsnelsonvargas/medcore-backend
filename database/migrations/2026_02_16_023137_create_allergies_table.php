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
        Schema::create('allergies', function (Blueprint $table) {
            $table->id();
            $table->string('allergy_name');
            // Category for the UI: 'Medication', 'Food', 'Environment', 'Other'
            $table->string('category');
            // Severity levels help doctors prioritize (Low, Medium, High)
            $table->enum('default_severity', ['mild', 'moderate', 'severe'])->default('moderate');
            // Optional: Reference to global standards like SNOMED or ICD-10
            $table->string('snomed_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergies');
    }
};
