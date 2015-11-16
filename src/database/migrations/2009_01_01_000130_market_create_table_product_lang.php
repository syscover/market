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
			$table->string('slug_112', 255)->nullable();

			$table->primary(['id_112', 'lang_112']);
			$table->foreign('id_112')->references('id_111')->on('012_111_product')
				->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('lang_112')->references('id_001')->on('001_001_lang')
				->onDelete('restrict')->onUpdate('cascade');
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