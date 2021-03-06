<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCatalogPriceRulesCustomerGroups extends Migration
{
	/**
	 * Tabla que relaciona el grupo de clientes, que pueden usar las reglas de precios de catálogo
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_123_catalog_price_rules_customer_groups'))
		{
			Schema::create('012_123_catalog_price_rules_customer_groups', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->integer('catalog_price_rule_id_123')->unsigned();
				$table->integer('customer_group_id_123')->unsigned();

				$table->primary(['catalog_price_rule_123', 'customer_group_123'], 'pk01_012_123_catalog_price_rules_customer_groups');

				$table->foreign('catalog_price_rule_id_123', 'fk01_012_123_catalog_price_rules_customer_groups')->references('id_122')->on('012_122_catalog_price_rule')
					->onDelete('cascade')->onUpdate('cascade');
				$table->foreign('customer_group_id_123', 'fk02_012_123_catalog_price_rules_customer_groups')->references('id_300')->on('009_300_group')
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
		if (Schema::hasTable('012_123_catalog_price_rules_customer_groups'))
		{
			Schema::drop('012_123_catalog_price_rules_customer_groups');
		}
	}
}