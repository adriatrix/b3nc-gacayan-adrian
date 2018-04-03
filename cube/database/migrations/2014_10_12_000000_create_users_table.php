<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         Schema::create('roles', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->timestamps();
         });

         Schema::create('teams', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->timestamps();
         });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('nickname');
            $table->integer('role_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
           $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
           $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('teams');
    }
}
