<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateConfigsTable.
 */
class CreateConfigsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configs', function(Blueprint $table) {
            $table->increments('id');
			$table->string('key')->unique();
            $table->string('display_name')->nullable();
            $table->text('value')->nullable();
            $table->text('details')->nullable();
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
		Schema::drop('configs');
	}
}
