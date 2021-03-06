<?php

use Illuminate\Database\Schema\Blueprint;
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
		if (! Schema::hasTable('012_112_product_lang'))
		{
			Schema::create('012_112_product_lang', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->integer('id_112')->unsigned();
				$table->string('lang_id_112', 2);
				$table->string('name_112');
				$table->string('slug_112');
				$table->text('description_112');
				
				$table->foreign('id_112', 'fk01_012_112_product_lang')
					->references('id_111')
					->on('012_111_product')
					->onDelete('cascade')
					->onUpdate('cascade');
				$table->foreign('lang_id_112', 'fk02_012_112_product_lang')
					->references('id_001')
					->on('001_001_lang')
					->onDelete('restrict')
					->onUpdate('cascade');
				
				$table->primary(['id_112', 'lang_id_112'], 'pk01_012_112_product_lang');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if (Schema::hasTable('012_112_product_lang'))
		{
			Schema::drop('012_112_product_lang');
		}
	}
}