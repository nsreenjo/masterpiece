<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id'); 
            $table->string('category_name');
            $table->string('category_img');
            $table->text('category_descrbtion');
            $table->timestamps();

            $table->unsignedBigInteger('mall_id')->nullable();
            $table->foreign('mall_id')->references('mall_id')->on('malls')->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}
