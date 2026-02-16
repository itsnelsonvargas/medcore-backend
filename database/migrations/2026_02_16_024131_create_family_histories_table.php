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
        Schema::create('family_histories', function (Blueprint $table) {
            $table->id();

            // Shorthand for unsignedBigInteger + foreign key + cascade
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');

            $table->string('relative')->nullable();
            $table->string('condition')->nullable();
            $table->integer('age_at_diagnosis')->nullable();

            // Use text() for notes so they don't hit the 255-character limit
            $table->text('notes')->nullable();

            $table->boolean('is_deceased')->default(false);
            $table->integer('age_at_death')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('famnily_history');
    }
};
