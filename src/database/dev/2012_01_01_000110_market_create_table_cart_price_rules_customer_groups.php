<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCartPriceRulesCustomerGroups extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('012_121_cart_price_rules_customer_groups'))
		{
			Schema::create('012_121_cart_price_rules_customer_groups', function ($table) {
				$table->engine = 'InnoDB';

				$table->integer('cart_price_rule_121')->unsigned();
				$table->integer('customer_group_121')->unsigned();
				$table->integer('used_120')->unsigned();

				$table->primary(['cart_price_rule_121', 'customer_group_121']);
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