<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_eng');
            $table->string('product_name_esp');
            $table->string('product_slug_eng');
            $table->string('product_slug_esp');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_eng');
            $table->string('product_tags_esp');
            $table->string('product_size_eng')->nullable();
            $table->string('product_size_esp')->nullable();
            $table->string('product_color_eng');
            $table->string('product_color_esp');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_description_eng');
            $table->string('short_description_esp');
            $table->string('long_description_eng');
            $table->string('long_description_esp');
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
