<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableOrderRow extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('012_117_order_row'))
		{
			Schema::create('012_117_order_row', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_117')->unsigned();
				$table->string('lang_117', 2)->nullable();
				$table->integer('order_117')->unsigned();
				$table->integer('product_117')->nullable()->unsigned();

				$table->string('name_117')->nullable();
				$table->text('description_117')->nullable();
				$table->text('data_117')->nullable();

				// amounts
				$table->decimal('price_117', 10, 2); 								// unit price
				$table->decimal('quantity_117', 10, 2); 							// number units
				$table->decimal('subtotal_117', 10, 2);								// subtotal without tax
				$table->decimal('discount_percentage_117', 10, 2)->nullable();
				$table->decimal('discount_amount_117', 10, 2);
				$table->decimal('tax_percentage_117', 10, 2);
				$table->decimal('tax_amount_117', 10, 2);

				// gift
				$table->boolean('gift_117');
				$table->string('gift_from_117')->nullable();
				$table->string('gift_to_117')->nullable();
				$table->text('gift_message_117')->nullable();

				$table->foreign('lang_117', 'fk01_012_117_order_row')->references('id_001')->on('001_001_lang')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('order_117', 'fk02_012_117_order_row')->references('id_116')->on('012_116_order')
					->onDelete('cascade')->onUpdate('cascade');
				$table->foreign('product_117', 'fk03_012_117_order_row')->references('id_111')->on('012_111_product')
					->onDelete('set null')->onUpdate('cascade');
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
		if (Schema::hasTable('012_117_order_row'))
		{
			Schema::drop('012_117_order_row');
		}
	}
}