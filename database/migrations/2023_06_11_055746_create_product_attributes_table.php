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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('products');  
            $table->json('attribute_type')->nullable();
            $table->json('attribute_data')->nullable();
            $table->string("bar_code")->nullable();
            $table->string("hsn_code")->nullable();
            $table->string("ean_code")->nullable();
            $table->string("gst_amount")->nullable();
            $table->string("mrp")->nullable();
            $table->string("discounted_mrp")->nullable();
            $table->string("purchase_price")->nullable();
            $table->string("wholesale_price")->nullable();
            $table->string("salon_price")->nullable();
            $table->string("tax")->nullable();
            $table->string("quantity")->nullable();
            $table->longText("additional_description")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attributes');
    }
};
