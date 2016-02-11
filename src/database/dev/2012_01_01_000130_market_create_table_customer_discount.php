<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCustomerPriceRule extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('012_123_customer_discount'))
		{
			Schema::create('012_123_customer_discount', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_123')->unsigned();
				$table->integer('customer_123')->unsigned();
				// id de la regla
				$table->integer('customer_price_rule_123')->unsigned();
				// creación del descuento
				$table->integer('date_123')->unsigned();

				$table->string('name_123');
				$table->text('description_123')->nullable();
				// activada o no
				$table->boolean('status_123');

				// si se puede sumar a otras ofertas
				$table->boolean('combinable_123');

				// fecha desde la que se puede usar el descuento
				$table->integer('enable_date_123')->unsigned()->nullable();
				// fecha en la que expira el descuento
				$table->integer('expiration_date_123')->unsigned()->nullable();

				// 1 - Porcentaje de descuento del precio del producto
				// 2 - Importe fijo de descuento
				// 3 - Importe fijo de descuento para todo el carrito
				// 4 - Compre X y consigua Y gratis
				$table->smallInteger('apply_123')->unsigned()->nullable();

				$table->decimal('discount_amount_123', 10, 2)->nullable();
				$table->decimal('maximum_discount_amount_123', 10, 2)->nullable();
				$table->boolean('apply_shipping_amount_123');
				$table->boolean('free_shipping_123');

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
		if (Schema::hasTable('012_123_customer_discount'))
		{
			Schema::drop('012_123_customer_discount');
		}
	}
}