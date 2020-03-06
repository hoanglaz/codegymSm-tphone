<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePostsTable.
 */
class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('des',255);
            $table->string('url')->unique();
            $table->longText('content');
            $table->string('image',255);
            $table->string('author')->nullable();
            $table->boolean('published')->default(false);
            $table->unsignedInteger('user_id');
            $table->integer('status_seo')->nullable();
            $table->string('meta_title',255)->nullable();
            $table->string('meta_des',255)->nullable();
            $table->string('meta_keyword',255)->nullable();
            $table->tinyInteger('status')->nullable();
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
		Schema::drop('posts');
	}
}
