<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableRow extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('012_114_row'))
		{
			Schema::create('012_114_row', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_114')->unsigned();
				$table->integer('order_114')->unsigned();


				$table->integer('product_114')->unsigned();
				$table->string('name_114');



				$table->decimal('discount_114', 10, 2)->nullable();
				$table->decimal('price_114', 10, 2)->nullable();
				$table->smallInteger('quantity_114')->unsigned();


				$table->text('data_114');







				// dirección de facturación

				// dirección de envío


//				$table->foreign('id_112', 'fk01_012_112_product_lang')->references('id_111')->on('012_111_product')
//						->onDelete('cascade')->onUpdate('cascade');
//				$table->foreign('lang_112', 'fk02_012_112_product_lang')->references('id_001')->on('001_001_lang')
//						->onDelete('restrict')->onUpdate('cascade');
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
		if (Schema::hasTable('012_114_row'))
		{
			Schema::drop('012_114_row');
		}
	}
}