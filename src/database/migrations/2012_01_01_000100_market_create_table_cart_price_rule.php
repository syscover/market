<?php

use Illuminate\Database\Schema\Blueprint;
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
		if (! Schema::hasTable('012_120_cart_price_rule'))
		{
			Schema::create('012_120_cart_price_rule', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id_120')->unsigned();

				// referencia a la tabla 001_017_text
				$table->integer('name_text_id_120')->unsigned();
				$table->integer('description_text_id_120')->unsigned()->nullable();
				$table->boolean('active_120');
				
				// define si este regla se puede combiar con otras
				$table->boolean('combinable_120');

				$table->boolean('has_coupon_120');
				$table->string('coupon_code_120')->nullable();
				
				// veces que el cupon se puede usar por usuario
				$table->integer('uses_customer_120')->unsigned()->nullable();
				
				// veces que el cupon se puede usar
				$table->integer('uses_coupon_120')->unsigned()->nullable();
				
				// total de veces que el descuento ha sido usado
				$table->integer('total_used_120')->unsigned();

				// fechas de validez
				$table->integer('enable_from_120')->unsigned()->nullable();
				$table->string('enable_from_text_120')->nullable();
				$table->integer('enable_to_120')->unsigned()->nullable();
				$table->string('enable_to_text_120')->nullable();

                // see config/market.php section Discount type on shopping cart
                // 1 - without discount
                // 2 - discount percentage subtotal
                // 3 - discount fixed amount subtotal
                // 4 - discount percentage total
                // 5 - discount fixed amount total
				$table->tinyInteger('discount_type_id_120')->unsigned()->nullable();

                // fixed amount to discount over shopping cart
				$table->decimal('discount_fixed_amount_120', 12, 4)->nullable();

				// Porcentaje de descuento sobre una cantidad
				$table->decimal('discount_percentage_120', 12, 4)->nullable();

                // máxima cantidad a descontar
				$table->decimal('maximum_discount_amount_120', 12, 4)->nullable();

                // se aplica el descuento al precio de transporte
				$table->boolean('apply_shipping_amount_120');

                // este descuento dispone de transporte gratuito
				$table->boolean('free_shipping_120');

				// reglas, campo para una futura implementación de reglas
				$table->text('rules_120')->nullable();

				// campo que contiene json con la información de idiomas creados
				$table->string('data_lang_120')->nullable();

				// índice para mejorar las búsquedas de los códigos de cupón
				$table->index('coupon_code_120', 'ix01_012_120_cart_price_rule');
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