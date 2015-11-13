<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableProductLang extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{   
		Schema::create('012_112_product_lang', function($table) {
			$table->engine = 'InnoDB';

			$table->integer('id_112')->unsigned();
			$table->string('lang_112', 2);

			$table->string('name_112', 100);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('012_112_product_lang');
	}

}