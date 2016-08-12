<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ward_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->date('issue_date');
            $table->enum('state', ['confirmed', 'rejected', 'sent'])->default(null);
            $table->string('receiver_name')->nullable();
            $table->string('sender_name');
            $table->unsignedInteger('requester_id')->nullable();
            $table->unsignedInteger('requested_from_id')->nullable();
            $table->unsignedInteger('requested_for_id')->nullable();

            $table->timestamps();

            $table->foreign('requester_id')->references('id')->on('wards')->onDelete('set null');
            $table->foreign('requested_from_id')->references('id')->on('pharmacies')->onDelete('set null');
            $table->foreign('requested_for_id')->references('id')->on('patients')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('ward_orders');
    }

}
