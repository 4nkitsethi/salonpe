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
            $table->integer("product_type");
            $table->string("product_name");
            $table->integer("brand_id")->nullable();
            $table->integer("sub_category_id")->nullable();
            $table->text("main_image")->nullable();
            $table->text("product_description")->nullable();
            $table->longText("ingredients")->nullable();
            $table->longText("how_to_use")->nullable();
            $table->longText("skin_type")->nullable();
            $table->longText("hair_type")->nullable();
            $table->string("firm")->nullable();
            $table->string("Last_CPU_GST")->nullable();
            $table->text("tag")->nullable();
            $table->integer("category_id")->nullable();
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
