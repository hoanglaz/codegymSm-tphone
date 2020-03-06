<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateContactsTable.
 */
class CreateContactsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name',255);
            $table->string('email',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('department',255)->nullable();
            $table->string('note',255)->nullable();
            $table->string('image',255)->nullable();
            $table->string('birthday',255)->nullable();
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
		Schema::drop('contacts');
	}
}
