<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCustomerDiscountHistory extends Migration
{
	/**
	 * Tabla que contabiliza en número de veces que se ha usado un descuento por cliente
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_126_customer_discount_history'))
		{
			Schema::create('012_126_customer_discount_history', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id_126')->unsigned();
				
				// fecha de registro
				$table->integer('date_126')->unsigned();
				$table->integer('customer_id_126')->unsigned();
				$table->integer('order_id_126')->unsigned();

				// se pueden desactivar los descuentos en caso de anulación de pedido
				$table->boolean('active_126')->default(true);

				// 1 - descuento procedente de, cart_price_rule
				// 2 - descuento procedente de, catalog_price_rule
				// 3 - descuento procedente de, customer_rule_discount
				$table->tinyInteger('rule_family_id_126')->unsigned();

				// id del decuento en el caso de proceder de customer discount
				//$table->integer('customer_discount_id_126')->unsigned()->nullable();

				// id de la regla que procede el descuento
				$table->integer('rule_id_126')->unsigned();
				
				$table->boolean('has_coupon_126')->default(false);
				$table->string('coupon_code_126')->nullable();

				// referencia a la tabla 001_017_text
				$table->integer('name_text_id_126')->unsigned();
				$table->integer('description_text_id_126')->nullable()->unsigned();

				// valores de la tabla 001_017_text en el idioma en que ha canjeado el descuento
				// se recoje el valor en el idioma del usuario para tener una referencia en caso de borrado
				// del registro de la tabla 001_017_text
				$table->string('name_text_value_126');
				$table->text('description_text_value_126')->nullable();

				// 1 - Sin descuento
				// 2 - Porcentaje de descuento
				// 3 - Importe fijo de descuento
				$table->tinyInteger('discount_type_id_126')->unsigned()->nullable();

				// cantidad fija de descuento
				$table->decimal('discount_fixed_amount_126', 10, 2)->nullable();
				
				// Porcentaje de descuento sobre una cantidad
				$table->decimal('discount_percentage_126', 10, 2)->nullable();
				
				// Cantidad de descuento calculado con el procentaje de descuento
				$table->decimal('discount_percentage_amount_126', 10, 2)->nullable();
				
				// máxima cantidad a descontar
				$table->decimal('maximum_discount_amount_126', 10, 2)->nullable();
				
				// se aplica el descuento al precio de transporte
				$table->boolean('apply_shipping_amount_126');
				
				// este descuento dispone de transporte gratuito
				$table->boolean('free_shipping_126');

				// reglas que se han tenido en cuenta para aplicar el descuento en caso de haberlas, ¿?
				$table->text('rules_126')->nullable();
				
				$table->foreign('customer_id_126', 'fk01_012_126_customer_discount_history')
					->references('id_301')
					->on('009_301_customer')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('order_id_126', 'fk02_012_126_customer_discount_history')
					->references('id_116')
					->on('012_116_order')
					->onDelete('restrict')
					->onUpdate('cascade');

				$table->index('rule_id_126', 'ix01_012_126_customer_discount_history');
				$table->index('coupon_code_126', 'ix02_012_126_customer_discount_history');
				$table->index('active_126', 'ix03_012_126_customer_discount_history');
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
		if (Schema::hasTable('012_126_customer_discount_history'))
		{
			Schema::drop('012_126_customer_discount_history');
		}
	}
}