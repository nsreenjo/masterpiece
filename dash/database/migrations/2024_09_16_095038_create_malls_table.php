<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallsTable extends Migration
{
    public function up(): void
    {
        Schema::create('malls', function (Blueprint $table) {
            $table->engine = 'InnoDB'; 
            $table->bigIncrements('mall_id'); 
            $table->string('mall_name'); 
            $table->string('mall_image')->nullable();
            $table->string('mall_address'); 
            $table->text('mall_descrbtion'); 
            $table->timestamps(); 

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('malls');
    }
}




