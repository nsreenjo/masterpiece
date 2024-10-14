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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); 
            $table->string('user_image')->nullable();
            $table->string('user_first_name'); 
            $table->string('user_last_name'); 
            $table->string('user_email')->unique(); 
            $table->string('user_password'); 
            $table->string('user_mobile'); 
            $table->string('user_address');
            $table->enum('gender', ['male', 'female']); 
            $table->date('date_of_birth'); 
            $table->enum('type', ['admin', 'user','superAdmin'])->default("user"); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
