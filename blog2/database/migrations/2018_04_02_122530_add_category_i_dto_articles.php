<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIDtoArticles extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
           $table->integer('category_id')->unsigned();

           $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

    }

    public function down()
    {
         Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('articles_category_id_foreign');
            $table->dropColumn('category_id');
         });

    }
}
