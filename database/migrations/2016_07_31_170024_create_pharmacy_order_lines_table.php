<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_order_lines', function (Blueprint $table) {
            $table->unsignedInteger('pharmacy_order_id');
            $table->unsignedInteger('product_id');
            $table->decimal('quantity', 10, 4);
            /* if the product price changed this will keep the old value */
            $table->decimal('unit_price_in_leva', 10, 3);
            
            $table->timestamps();
            
            $table->foreign('pharmacy_order_id')->references('id')->on('pharmacy_orders');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pharmacy_order_lines');
    }
}