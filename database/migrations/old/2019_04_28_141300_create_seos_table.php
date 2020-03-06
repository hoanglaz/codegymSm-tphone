<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSeosTable.
 */
class CreateSeosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seos', function(Blueprint $table) {
            $table->increments('id');
			$table->string('title',255)->nullable();
            $table->string('des',255)->nullable();
            $table->string('image',255)->nullable();
            $table->string('metakeyword',255)->nullable();
            $table->string('id_object',255)->nullable();
            $table->string('type_object',255)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('seos');
	}
}
