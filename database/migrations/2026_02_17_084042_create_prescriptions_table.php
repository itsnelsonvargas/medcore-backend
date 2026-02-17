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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();

            // Foreign Keys
            $table->foreignId('medicine_id')->constrained()->restrictOnDelete(); // Safety: Don't delete meds if they have history
            $table->foreignId('consultation_id')->constrained()->onDelete('cascade');

            // Prescription Details
            $table->string('dosage');            // e.g., "500mg"
            $table->string('frequency');         // e.g., "3x a day" or "Every 8 hours"
            $table->string('duration');          // e.g., "7 days"
            $table->integer('total_quantity')->nullable();   // e.g., 21 (for 3x/day for 7 days)

            $table->text('instructions')->nullable(); // e.g., "Take after meals, avoid alcohol"

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
