<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->decimal('unit_price_in_leva', 10, 3);
            $table->string('unit', 45);
            $table->decimal('available_quantity', 10, 4);
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('storehouse_id')->nullable();

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('set null');
            $table->foreign('storehouse_id')->references('id')->on('storehouses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('products');
    }

}
