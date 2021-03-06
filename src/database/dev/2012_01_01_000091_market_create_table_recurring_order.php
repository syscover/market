<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableRecurringOrder extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_118_recurring_order'))
		{
			Schema::create('012_118_recurring_order', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id_117')->unsigned();
				$table->string('lang_id_117', 2)->nullable();
				$table->integer('order_id_117')->unsigned();
				$table->integer('product_id_117')->nullable()->unsigned();

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
				$table->boolean('has_gift_117');
				$table->string('gift_from_117')->nullable();
				$table->string('gift_to_117')->nullable();
				$table->text('gift_message_117')->nullable();

				$table->foreign('lang_id_117', 'fk01_012_117_order_row')->references('id_001')->on('001_001_lang')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('order_id_117', 'fk02_012_117_order_row')->references('id_116')->on('012_116_order')
					->onDelete('cascade')->onUpdate('cascade');
				$table->foreign('product_id_117', 'fk03_012_117_order_row')->references('id_111')->on('012_111_product')
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
		if (Schema::hasTable('012_118_recurring_order'))
		{
			Schema::drop('012_118_recurring_order');
		}
	}
}