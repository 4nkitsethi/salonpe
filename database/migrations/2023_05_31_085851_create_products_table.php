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
            $table->integer("product_id");
            $table->string("name");
            $table->json('product_type')->nullable();            
            $table->foreignId('brand_id')->nullable()->constrained('brands'); 
            $table->foreignId('sub_category_id')->nullable()->constrained('categories');              
            $table->text("thumb_image")->nullable();
            $table->text("product_description")->nullable();
            $table->longText("ingredients")->nullable();
            $table->longText("how_to_use")->nullable();
            $table->longText("skin_type")->nullable();
            $table->longText("hair_type")->nullable();
            $table->string("firm")->nullable();
            $table->string("Last_CPU_GST")->nullable();
            $table->text("tag")->nullable();            
            $table->foreignId('category_id')->nullable()->constrained('categories');  
            $table->text("slug")->nullable();
            $table->integer("best_offers");
            $table->integer("best_selling");
            $table->string("weight_size")->nullable();
            $table->string("colour_shades")->nullable();
            $table->string("tags")->nullable();
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
