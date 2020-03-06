<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEnventsTable.
 */
class CreateEnventsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('envents', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('des',255);
            $table->string('url')->unique();
            $table->longText('content');
            $table->string('image',255);
            $table->string('company',255);
            $table->string('phone',255);
            $table->string('email',255);
            $table->string('website',255);
            $table->string('map',255);


            $table->time('start')->nullable();
            $table->time('end')->nullable();

            $table->string('author')->nullable();
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
		Schema::drop('envents');
	}
}
