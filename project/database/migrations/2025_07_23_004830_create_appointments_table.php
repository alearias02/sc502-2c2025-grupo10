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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->foreignId('patient_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->dateTime('scheduled_at');
            $table->integer('duration_minutes')
                  ->default(30);
            $table->enum('status', ['pending','confirmed','cancelled'])
                  ->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Asegura que no haya dos citas idénticas para un doctor
            $table->unique(['doctor_id','scheduled_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
