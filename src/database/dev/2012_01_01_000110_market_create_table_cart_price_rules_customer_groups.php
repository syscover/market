<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCartPriceRulesCustomerGroups extends Migration
{
	/**
	 * Tabla que relaciona el grupo de clientes, que pueden usar las reglas de precios de carro de compra
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('012_121_cart_price_rules_customer_groups'))
		{
			Schema::create('012_121_cart_price_rules_customer_groups', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->integer('cart_price_rule_121')->unsigned();
				$table->integer('customer_group_121')->unsigned();

				$table->primary(['cart_price_rule_121', 'customer_group_121']);

				$table->foreign('cart_price_rule_121', 'fk01_012_121_cart_price_rules_customer_groups')->references('id_120')->on('012_120_cart_price_rule')
					->onDelete('cascade')->onUpdate('cascade');
				$table->foreign('customer_group_121', 'fk02_012_121_cart_price_rules_customer_groups')->references('id_300')->on('009_300_group')
					->onDelete('cascade')->onUpdate('cascade');
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
		if (Schema::hasTable('012_121_cart_price_rules_customer_groups'))
		{
			Schema::drop('012_121_cart_price_rules_customer_groups');
		}
	}
}