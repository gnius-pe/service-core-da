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
        Schema::create('creation_sources', function (Blueprint $table) {
            $table->id();
            $table->date('creation_date');
            $table->string('source_of_creation');
            $table->string('receptionist_creation')->nullable();
            $table->string('creation_API_reniec')->nullable();
            $table->foreignId('patient_id')->constrained('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creation_sources');
    }
};
