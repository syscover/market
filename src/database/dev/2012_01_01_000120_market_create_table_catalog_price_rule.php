<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCatalogPriceRule extends Migration
{
	/**
	 * Tabla que establece las reglas de precios que se aplican al carro de compra
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_122_catalog_price_rule'))
		{
			Schema::create('012_122_catalog_price_rule', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id_122')->unsigned();

				// referencia a la tabla 001_017_text
				$table->integer('name_text_122')->unsigned();
				$table->integer('description_text_122')->unsigned()->nullable();

				$table->boolean('status_122');

				// define si este regla se puede combiar con otras
				$table->boolean('combinable_122');

				// fechas de validez
				$table->integer('enable_from_122')->unsigned()->nullable();
				$table->integer('enable_to_122')->unsigned()->nullable();

				// 1 - Porcentaje de descuento del precio del producto
				// 2 - Importe fijo de descuento
				// 3 - Importe fijo de descuento para todo el carrito
				// 4 - Compre X y consigua Y gratis
				$table->tinyInteger('apply_122')->unsigned()->nullable();

				// cantidad fija de descuento
				$table->decimal('discount_amount_122', 10, 2)->nullable();
				// Porcentaje de descuento sobre una cantidad
				$table->decimal('discount_percentage_122', 10, 2)->nullable();
				// máxima cantidad a descontar
				$table->decimal('maximum_discount_amount_122', 10, 2)->nullable();
				// se aplica el descuento al precio de transporte
				$table->boolean('apply_shipping_amount_122');
				// este descuento dispone de transporte gratuito
				$table->boolean('free_shipping_122');

				// reglas, campo para una futura implementación de reglas
				$table->text('rules_122')->nullable();
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
		if (Schema::hasTable('012_122_catalog_price_rule'))
		{
			Schema::drop('012_122_catalog_price_rule');
		}
	}
}