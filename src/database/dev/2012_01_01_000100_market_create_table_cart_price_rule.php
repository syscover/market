<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCartPriceRule extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('012_120_cart_price_rule'))
		{
			Schema::create('012_120_cart_price_rule', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_120')->unsigned();

				$table->string('name_120');
				$table->text('description_120')->nullable();
				$table->boolean('status_120');

				$table->boolean('has_coupon_120');
				$table->string('coupon_code_120');

				$table->boolean('combinable_120');
				$table->integer('uses_coupon_120')->unsigned()->nullable();
				$table->integer('uses_customer_120')->unsigned()->nullable();

				$table->integer('enable_from_120')->unsigned()->nullable();
				$table->integer('enable_to_120')->unsigned()->nullable();

				// 1 - Porcentaje de descuento del precio del producto
				// 2 - Importe fijo de descuento
				// 3 - Importe fijo de descuento para todo el carrito
				// 4 - Compre X y consigua Y gratis
				$table->smallInteger('apply_120')->unsigned()->nullable();
				$table->decimal('discount_amount_120', 10, 2)->nullable();
				$table->decimal('maximum_discount_amount_120', 10, 2)->nullable();
				$table->boolean('apply_shipping_amount_120');
				$table->boolean('free_shipping_120');

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
		if (Schema::hasTable('012_120_cart_price_rule'))
		{
			Schema::drop('012_120_cart_price_rule');
		}
	}
}