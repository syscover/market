<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCustomerDiscountUsed extends Migration
{
	/**
	 * Tabla que contabiliza en número de veces que se ha usado un descuento por cliente
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('012_126_customer_discount_used'))
		{
			Schema::create('012_126_customer_discount_used', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_126')->unsigned();
				$table->integer('date_126')->unsigned();

				$table->integer('customer_126')->unsigned();
				$table->integer('order_126')->unsigned();

				// 1 - descuento procedente de, cart_price_rule
				// 2 - descuento procedente de, catalog_price_rule
				// 3 - descuento procedente de, customer discount
				$table->tinyInteger('type_discount')->unsigned();

				// id de la regla que procede el descuento
				$table->integer('rule_126')->unsigned();

				// id del decuento en el caso de proceder de customer discount
				$table->integer('discount_126')->unsigned()->nullable();

				// referencia a la tabla 001_017_text
				$table->integer('name_text_126')->unsigned();
				$table->integer('description_text_126')->nullable()->unsigned();

				// valores de la tabla 001_017_text en el idioma en que ha canjeado el descuento
				// se recoje el valor en el idioma del usuario para tener una referencia en caso de borrado
				// del registro de la tabla 001_017_text
				$table->string('name_text_value_126');
				$table->text('description_text_value_126')->nullable();

				// 1 - Porcentaje de descuento del precio del producto
				// 2 - Importe fijo de descuento
				// 3 - Importe fijo de descuento para todo el carrito
				// 4 - Compre X y consigua Y gratis
				$table->tinyInteger('apply_126')->unsigned()->nullable();

				// cantidad fija de descuento
				$table->decimal('discount_amount_126', 10, 2)->nullable();
				// Porcentaje de descuento sobre una cantidad
				$table->decimal('discount_percentage_126', 10, 2)->nullable();
				// máxima cantidad a descontar
				$table->decimal('maximum_discount_amount_126', 10, 2)->nullable();
				// se aplica el descuento al precio de transporte
				$table->boolean('apply_shipping_amount_126');
				// este descuento dispone de transporte gratuito
				$table->boolean('free_shipping_126');

				// reglas que se han tenido en cuenta para aplicar el descuento en caso de haberlas
				$table->text('rules_160')->nullable();

				$table->index('rule_126', 'ix01_012_126_customer_discount_used');
				$table->index('discount_126', 'ix02_012_126_customer_discount_used');

				$table->foreign('customer_126', 'fk01_012_126_customer_discount_used')->references('id_301')->on('009_301_customer')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('order_126', 'fk02_012_126_customer_discount_used')->references('id_116')->on('012_116_order')
					->onDelete('restrict')->onUpdate('cascade');
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
		if (Schema::hasTable('012_126_customer_discount_used'))
		{
			Schema::drop('012_126_customer_discount_used');
		}
	}
}