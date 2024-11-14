<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id', true); // Primary key as unsignedBigInteger
            $table->string('user_image')->nullable();
            $table->string('user_first_name');
            $table->string('user_last_name');
            $table->string('user_email')->unique();
            $table->string('user_password');
            $table->string('user_mobile');
            $table->string('user_address')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->date('date_of_birth');
            $table->enum('type', ['admin', 'user', 'superAdmin'])->default('user');
            $table->timestamps();

            $table->unsignedBigInteger('mall_id')->nullable(); // Foreign key field

            // Foreign key constraint
            $table->foreign('mall_id')->references('mall_id')->on('malls')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
