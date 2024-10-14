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
        Schema::create('singleproducts', function (Blueprint $table) {
           

            $table->bigIncrements('single_product_id'); 

                $table->integer('Quantity'); 
                $table->text('Comment')->nullable(); 
                $table->integer('ratings_id')->nullable();

                
                $table->unsignedBigInteger('product_id')->nullable();
                $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');


                // $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
                $table->timestamps(); 


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('singleproducts');
    }
};
