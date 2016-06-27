<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCustomerPriceRule extends Migration
{
	/**
	 * Tabla que crea descuentos para asignar a clientes, dependiendo de unas reglas.
	 * Esta tabla sería consultado por un cron, o accionada por un evento para asignar
	 * a unos clientes determinados un bono de descuento
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_124_customer_price_rule'))
		{
			Schema::create('012_124_customer_price_rule', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id_124')->unsigned();

				// referencia a la tabla 001_017_text
				$table->integer('name_text_id_124')->unsigned();
				$table->integer('description_text_id_124')->unsigned()->nullable();

				// activada o no
				$table->boolean('status_124');

				// si se puede sumar a otras ofertas
				$table->boolean('combinable_124');

				// fecha desde la que se generan descuentos
				$table->integer('enable_from_124')->unsigned()->nullable();
				
				// fecha hasta la que se generan descuentos
				$table->integer('enable_to_124')->unsigned()->nullable();
				
				// caducidad del descuento generado en días
				$table->integer('expiration_124')->unsigned()->nullable();

				// 1 - Porcentaje de descuento del precio del producto
				// 2 - Importe fijo de descuento
				// 3 - Importe fijo de descuento para todo el carrito
				// 4 - Compre X y consigua Y gratis
				$table->tinyInteger('apply_id_124')->unsigned()->nullable();

				// cantidad fija de descuento
				$table->decimal('discount_amount_124', 10, 2)->nullable();
				
				// Porcentaje de descuento sobre una cantidad
				$table->decimal('discount_percentage_124', 10, 2)->nullable();
				
				// máxima cantidad a descontar
				$table->decimal('maximum_discount_amount_124', 10, 2)->nullable();
				
				// se aplica el descuento al precio de transporte
				$table->boolean('apply_shipping_amount_124');
				
				// este descuento dispone de transporte gratuito
				$table->boolean('free_shipping_124');
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
		if (Schema::hasTable('012_124_customer_price_rule'))
		{
			Schema::drop('012_124_customer_price_rule');
		}
	}
}