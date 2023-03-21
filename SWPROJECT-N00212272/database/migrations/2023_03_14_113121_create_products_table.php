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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->enum('Category',['Clothes','Feeding','Nursery','Water','Toys'])->default('Clothes');;
            $table->text('description');
            $table->integer('price');
            $table->enum('condition',['Excellent','Good','Okay','Bad'])->default('Okay');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
