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
        Schema::create('geographic_locations', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('department');
            $table->string('province');
            $table->string('district');
            $table->string('address');
            $table->string('reference')->nullable();
            $table->foreignId('patient_id')->constrained('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geographic_locations');
    }
};
