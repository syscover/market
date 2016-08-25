<?php

use Illuminate\Database\Schema\Blueprint;
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
		if (! Schema::hasTable('012_117_order_row'))
		{
			Schema::create('012_117_order_row', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id_117')->unsigned();
				$table->string('lang_id_117', 2);
				$table->integer('order_id_117')->unsigned();
				$table->integer('product_id_117')->nullable()->unsigned();

				$table->string('name_117')->nullable();
				$table->text('description_117')->nullable();
				$table->text('data_117')->nullable();

				// amounts
				$table->decimal('price_117', 12, 4); 								        // unit price
				$table->decimal('quantity_117', 12, 4); 							        // number of units
				$table->decimal('subtotal_117', 12, 4);								        // subtotal without tax
                $table->decimal('total_without_discounts_117', 12, 4);                      // total from row without discounts

                // discounts over row
				$table->decimal('discount_subtotal_percentage_117', 10, 2);
                $table->decimal('discount_total_percentage_117', 10, 2);
                $table->decimal('discount_subtotal_percentage_amount_117', 12, 4);
                $table->decimal('discount_total_percentage_amount_117', 12, 4);
                $table->decimal('discount_subtotal_fixed_amount_117', 12, 4);
                $table->decimal('discount_total_fixed_amount_117', 12, 4);

				$table->decimal('discount_amount_117', 12, 4);                              // total amount to discount, fixed plus percentage discounts

                // subtotal with discounts
                $table->decimal('subtotal_with_discounts_117', 12, 4);

                // taxes
                $table->text('tax_rules_117');                                              // json that contain array with tax rules
                $table->decimal('tax_amount_117', 12, 4);                                   // tax amount over this row with discounts apply

                // total
                $table->decimal('total_117', 12, 4);                                        // with tax and discounts

				// fields if this row is to gift
				$table->boolean('has_gift_117');
				$table->string('gift_from_117')->nullable();
				$table->string('gift_to_117')->nullable();
				$table->text('gift_message_117')->nullable();

				$table->foreign('lang_id_117', 'fk01_012_117_order_row')
					->references('id_001')
					->on('001_001_lang')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('order_id_117', 'fk02_012_117_order_row')
					->references('id_116')
					->on('012_116_order')
					->onDelete('cascade')
					->onUpdate('cascade');
				$table->foreign('product_id_117', 'fk03_012_117_order_row')
					->references('id_111')
					->on('012_111_product')
					->onDelete('set null')
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
		if (Schema::hasTable('012_117_order_row'))
		{
			Schema::drop('012_117_order_row');
		}
	}
}