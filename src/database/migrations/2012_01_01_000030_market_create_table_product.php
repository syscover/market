<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableProduct extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_111_product'))
		{
			Schema::create('012_111_product', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				$table->increments('id_111')->unsigned();
				$table->integer('custom_field_group_111')->unsigned()->nullable();

				$table->tinyInteger('product_type_111')->unsigned(); // downloaded, transportable, downloaded and transportable

				// set parent product and config like subproduct
				$table->increments('parent_product_id_111')->unsigned()->nullable();

				$table->decimal('weight_111', 10, 3)->nullable();
				$table->boolean('active_111');
				$table->integer('sorting_111')->unsigned()->nullable();

				// prices, tax and format
				$table->tinyInteger('price_type_111')->unsigned(); // single price or undefined
				$table->decimal('price_111', 10, 2)->nullable();

				$table->string('data_lang_111', 255)->nullable();
				$table->text('data_111')->nullable();

				$table->foreign('custom_field_group_111', 'fk01_012_111_product')->references('id_025')->on('001_025_field_group')
						->onDelete('restrict')->onUpdate('cascade');
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
		if (Schema::hasTable('012_111_product'))
		{
			Schema::drop('012_111_product');
		}
	}
}