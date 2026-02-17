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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., Paracetamol
            $table->string('brand')->nullable(); // e.g., Biogesic

            // Removed the duplicate brand line

            $table->string('dosage_form')->nullable(); // e.g., Tablet, Syrup, Capsule
            $table->string('strength')->nullable();    // e.g., 500mg

            // Optional: Add a category or generic name if needed
            // $table->string('generic_name')->nullable();

            $table->text('remarks')->nullable(); // Changed to 'text' in case remarks are long
            $table->timestamps();

            // Indexing common search fields for better performance
            $table->index(['name', 'brand']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
