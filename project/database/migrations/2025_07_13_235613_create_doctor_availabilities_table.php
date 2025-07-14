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
        Schema::create('doctor_availabilities', function (Blueprint $table) {
        $table->id();
        $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete();
        $table->tinyInteger('day_of_week');
        $table->time('start_time');
        $table->time('end_time');
        $table->timestamps();

        $table->index(
        ['doctor_id','day_of_week','start_time','end_time'],
        'doctor_availabilities_idx'
    );

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_availabilities');
    }
};
