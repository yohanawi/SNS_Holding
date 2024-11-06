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
        Schema::create('tranding_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->decimal('price', 8, 2);
            $table->integer('discount')->nullable();
            $table->string('category');
            $table->text('product_details')->nullable();
            $table->json('sizes')->nullable();
            $table->integer('quantity_S')->nullable();
            $table->integer('quantity_M')->nullable();
            $table->integer('quantity_L')->nullable();
            $table->integer('quantity_XL')->nullable();
            $table->integer('quantity_XXL')->nullable();
            $table->string('image01')->nullable();
            $table->string('image02')->nullable();
            $table->string('image03')->nullable();
            $table->integer('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tranding_products');
    }
};
