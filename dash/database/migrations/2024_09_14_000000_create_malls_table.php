<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('malls', function (Blueprint $table) {
            $table->unsignedBigInteger('mall_id', true); // Primary key as unsignedBigInteger
            $table->string('mall_image')->nullable();
            $table->string('mall_name');
            $table->string('mall_address');
            $table->text('mall_descrbtion')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key to user (if needed)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('malls');
    }
};
