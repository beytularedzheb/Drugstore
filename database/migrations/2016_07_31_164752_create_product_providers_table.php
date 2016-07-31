<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('uic', 15)->comment('Unified identity code');
            $table->string('accountable_person_name');
            $table->text('address')->nullable();
            $table->string('phone', 20)->nullable();
            
            $table->timestamps();
            
            $table->unique('uic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_providers');
    }
}
