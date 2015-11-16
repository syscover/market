<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCategory extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{   
		Schema::create('012_110_category', function($table) {
			$table->engine = 'InnoDB';
			$table->increments('id_110')->unsigned();
			$table->string('lang_110', 2);
			$table->integer('parent_110')->nullable();

			$table->string('name_110', 100);
			$table->string('slug_110', 255);
			$table->boolean('active_110');
			$table->text('description_110');

			$table->string('data_lang_110',255)->nullable();
			$table->text('data_110')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('012_110_category');
	}
}