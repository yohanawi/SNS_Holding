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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('phone');
            $table->string('city');
            $table->string('street_address');
            $table->string('apt_suite_floor')->nullable();
            $table->string('zip_code');
            $table->string('state_province');
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('product_id');
            $table->timestamps();

            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
