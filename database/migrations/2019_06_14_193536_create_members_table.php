<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMembersTable.
 */
class CreateMembersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('fullname',255);
            $table->string('email')->unique();
            $table->longText('password');
            $table->string('image',255);
            $table->string('address')->nullable();
            $table->tinyInteger('status')->unsigned();
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
		Schema::drop('members');
	}
}
