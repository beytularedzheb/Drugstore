<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pharmacy_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->date('issue_date');
            $table->string('receiver_name');
            $table->string('sender_name');
            $table->unsignedInteger('issuer_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();

            $table->timestamps();

            $table->foreign('issuer_id')->references('id')->on('product_providers')->onDelete('set null');
            $table->foreign('customer_id')->references('id')->on('pharmacies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('pharmacy_orders');
    }

}
