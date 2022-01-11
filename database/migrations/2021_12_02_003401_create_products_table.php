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
            $table->text('title');
            $table->text('slug');
            $table->text('hot_deal')->default('no');
            $table->string('price');
            $table->string('percent')->default('0');
            $table->string('discount_price')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('description')->nullable();
            $table->string('sku');
            $table->string('quantity');
            $table->string('stock');
            $table->string('start_stock')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->integer('product_counter')->default('0');
            $table->string('status')->default('1');
            $table->string('created_by');
            $table->string('edited_by')->nullable();
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
