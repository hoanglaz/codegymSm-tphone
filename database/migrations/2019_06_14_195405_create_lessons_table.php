<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLessonsTable.
 */
class CreateLessonsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lessons', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('des',255);
            $table->string('url')->unique();
            $table->longText('content');
            $table->string('image',255);
            $table->string('author')->nullable();
            $table->string('video')->nullable();
//            $table->boolean('published')->default(false);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('order');
            $table->string('person')->nullable();
            $table->string('meta_title',255)->nullable();
            $table->string('meta_des',255)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lessons');
	}
}
