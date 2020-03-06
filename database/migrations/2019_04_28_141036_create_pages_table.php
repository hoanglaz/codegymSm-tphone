<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePagesTable.
 */
class CreatePagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('des',255);
            $table->string('url',255);
            $table->longText('content');
            $table->string('image',255);
            $table->string('type',255)->nullable();
            $table->string('config',255)->nullable();
            $table->unsignedInteger('user_id');
            $table->string('meta_title',255)->nullable();
            $table->string('meta_des',255)->nullable();
            $table->string('meta_keyword',255)->nullable();
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}
}
