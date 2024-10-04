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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('identification_type');
            $table->string('number_identification');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('email_address');
            $table->date('birthdate');
            $table->string('first_cell_phone');
            $table->string('second_cell_phone')->nullable();
            $table->string('gender');
            $table->text('text_message')->nullable();
            $table->text('medical_examination')->nullable();
            $table->text('spiritual_support')->nullable();
            $table->boolean('permission_to_call');
            $table->string('state_patient');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
