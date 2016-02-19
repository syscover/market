<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCustomerDiscount extends Migration
{
	/**
	 * Tabla que relaciona un bono de descuento a un cliente
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('012_125_customer_discount'))
		{
			Schema::create('012_125_customer_discount', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_125')->unsigned();

				// ID de la regla que procede el descuento
				$table->increments('rule_125')->unsigned();

				$table->integer('customer_125')->unsigned();
				// id de la regla
				$table->integer('customer_price_rule_125')->unsigned();
				// creación del descuento
				$table->integer('date_125')->unsigned();

				$table->string('name_125');
				$table->text('description_125')->nullable();

				// activo o no
				$table->boolean('status_125');

				// si se puede sumar a otras ofertas
				$table->boolean('combinable_125');

				// fecha desde la que se puede usar el descuento
				$table->integer('enable_date_125')->unsigned()->nullable();
				// fecha en la que expira el descuento
				$table->integer('expiration_date_125')->unsigned()->nullable();

				// 1 - Porcentaje de descuento del precio del producto
				// 2 - Importe fijo de descuento
				// 3 - Importe fijo de descuento para todo el carrito
				// 4 - Compre X y consigua Y gratis
				$table->tinyInteger('apply_125')->unsigned()->nullable();

				// cantidad fija de descuento
				$table->decimal('discount_amount_125', 10, 2)->nullable();
				// Porcentaje de descuento sobre una cantidad
				$table->decimal('discount_percentage_125', 10, 2)->nullable();
				// máxima cantidad a descontar
				$table->decimal('maximum_discount_amount_125', 10, 2)->nullable();
				// se aplica el descuento al precio de transporte
				$table->boolean('apply_shipping_amount_125');
				// este descuento dispone de transporte gratuito
				$table->boolean('free_shipping_125');

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
		if (Schema::hasTable('012_125_customer_discount'))
		{
			Schema::drop('012_125_customer_discount');
		}
	}
}