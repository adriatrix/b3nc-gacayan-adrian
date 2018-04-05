<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('order_states', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->timestamps();
         });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('so_num');
            $table->integer('po_num');
            $table->string('notes');
            $table->string('received_date')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('order_state_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_state_id')->references('id')->on('order_states')->onDelete('cascade');
        });

        Schema::disableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_states');
    }
}
