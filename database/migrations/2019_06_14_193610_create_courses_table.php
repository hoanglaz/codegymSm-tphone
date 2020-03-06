<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCoursesTable.
 */
class CreateCoursesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('des',255);
            $table->string('url')->unique();
            $table->longText('content');
            $table->string('image',255);
            $table->string('author')->nullable();
            $table->string('time')->nullable();
            $table->unsignedBigInteger('review')->nullable();
            $table->boolean('published')->default(false);
            $table->unsignedInteger('user_id');
            $table->string('person')->nullable();

            $table->string('meta_title',255)->nullable();
            $table->string('meta_des',255)->nullable();
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
		Schema::drop('courses');
	}
}
