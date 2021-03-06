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
				$table->integer('field_group_id_111')->unsigned()->nullable();

				// 1 - downloaded
				// 2 - transportable
				// 3 - downloaded and transportable
				$table->tinyInteger('type_id_111')->unsigned();

				// set parent product and config like subproduct
				$table->integer('parent_product_id_111')->unsigned()->nullable();

				$table->decimal('weight_111', 11, 3)->default(0);
				$table->boolean('active_111')->default(false);
				$table->integer('sorting_111')->unsigned()->nullable();

				// 1 - single price
				// 2 - undefined price
				$table->tinyInteger('price_type_id_111')->unsigned(); // single price or undefined

				$table->decimal('subtotal_111', 12, 4)->nullable();

				// taxes
				$table->integer('product_class_tax_id_111')->unsigned()->nullable();

				$table->string('data_lang_111')->nullable();
				$table->text('data_111')->nullable();

				$table->foreign('field_group_id_111', 'fk01_012_111_product')
					->references('id_025')
					->on('001_025_field_group')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('product_class_tax_id_111', 'fk02_012_111_product')
					->references('id_101')
					->on('012_101_product_class_tax')
					->onDelete('restrict')
					->onUpdate('cascade');
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