<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateHomesTable.
 */
class CreateHomesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('homes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('des',255)->nullable();
            $table->text('data')->nullable();
            $table->text('details')->nullable();
            $table->string('component')->nullable();
            $table->string('link')->nullable();
            $table->string('type')->nullable();
            $table->integer('order')->default('1');
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
		Schema::drop('homes');
	}
}
