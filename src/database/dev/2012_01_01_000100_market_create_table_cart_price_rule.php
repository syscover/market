<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCartPriceRule extends Migration
{
	/**
	 * Tabla que establece las reglas de precios que se aplican al carro de compra
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

				// define si este regla se puede combiar con otras
				$table->boolean('combinable_120');

				// veces que el cupon se puede usar
				$table->integer('uses_coupon_120')->unsigned()->nullable();

				// veces que el cupon se puede usar por usuario
				$table->integer('uses_customer_120')->unsigned()->nullable();

				// total de veces que el descuento ha sido usado
				$table->integer('total_used_120')->unsigned();

				// fechas de validez
				$table->integer('enable_from_120')->unsigned()->nullable();
				$table->integer('enable_to_120')->unsigned()->nullable();

				// 1 - Porcentaje de descuento del precio del producto
				// 2 - Importe fijo de descuento
				// 3 - Importe fijo de descuento para todo el carrito
				// 4 - Compre X y consigua Y gratis
				$table->smallInteger('apply_120')->unsigned()->nullable();

				// cantidad fija de descuento
				$table->decimal('discount_amount_120', 10, 2)->nullable();
				// Porcentaje de descuento sobre una cantidad
				$table->decimal('discount_percentage_120', 10, 2)->nullable();
				// máxima cantidad a descontar
				$table->decimal('maximum_discount_amount_120', 10, 2)->nullable();
				// se aplica el descuento al precio de transporte
				$table->boolean('apply_shipping_amount_120');
				// este descuento dispone de transporte gratuito
				$table->boolean('free_shipping_120');

				// reglas, campo para una futura implementación de reglas
				$table->text('rules_120')->nullable();

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