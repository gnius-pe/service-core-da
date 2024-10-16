<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('identification_type');
                $table->string('number_identification');
                $table->string('last_name');
                $table->string('first_name');
                $table->string('cell_phone');
                $table->string('personal_email')->nullable();
                $table->string('organizational_email');
                $table->string('password');
                $table->string('state');
                $table->foreignId('specialty_id')->constrained('specialties')->onDelete('cascade');
                
                $table->timestamps();
            });
        }
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
