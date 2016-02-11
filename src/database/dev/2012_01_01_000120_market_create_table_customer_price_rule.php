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
		if (!Schema::hasTable('012_122_customer_price_rule'))
		{
			Schema::create('012_122_customer_price_rule', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_122')->unsigned();

				$table->string('name_122');
				$table->text('description_122')->nullable();
				// activada o no
				$table->boolean('status_122');

				// si se puede sumar a otras ofertas
				$table->boolean('combinable_122');

				// fecha desde la que se generan descuentos
				$table->integer('enable_from_122')->unsigned()->nullable();
				// fecha hasta la que se generan descuentos
				$table->integer('enable_to_122')->unsigned()->nullable();
				// caducidad del descuento generado en días
				$table->integer('expiration_122')->unsigned()->nullable();

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
		if (Schema::hasTable('012_122_customer_price_rule'))
		{
			Schema::drop('012_122_customer_price_rule');
		}
	}
}