<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTagsTable.
 */
class CreateTagsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('title',255);
            $table->string('url',255);
            $table->unsignedInteger('user_id');
            $table->string('type')->nullable();
            $table->string('des',255)->nullable();
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
		Schema::drop('tags');
	}
}
