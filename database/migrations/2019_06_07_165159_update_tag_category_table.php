<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTagCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories',function ($table){
            $table->integer('count')->nullable();
        });
        Schema::table('tags',function ($table){
            $table->integer('count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function($table) {
            $table->dropColumn('count');
        });
        Schema::table('tags', function($table) {
            $table->dropColumn('count');
        });
    }
}
