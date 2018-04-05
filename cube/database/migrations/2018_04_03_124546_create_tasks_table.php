<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('task_states', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->timestamps();
         });

        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('task_state_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->date('due_date');
            $table->string('notes');
            $table->timestamps();
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('task_state_id')->references('id')->on('task_states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('task_states');
    }
}
