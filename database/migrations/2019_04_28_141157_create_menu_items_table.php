<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMenuItemsTable.
 */
class CreateMenuItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_items', function(Blueprint $table) {
            $table->increments('id');
 			$table->unsignedInteger('menu_id')->nullable();
            $table->string('title');
            $table->string('url');
            $table->string('target')->default('_self');
            $table->string('icon_class')->nullable();
            $table->string('color')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('order');
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
		Schema::drop('menu_items');
	}
}
