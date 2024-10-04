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
            $table->string('name');
            $table->date('creation_date');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('state_appointments');
            $table->string('diagnoses_appointments');
            $table->foreignId('specialty_id')->constrained('specialties');
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('mission_id')->constrained('missions');
            $table->timestamps();
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
