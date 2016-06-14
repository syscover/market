<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableTaxRulesTaxRatesZones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('012_105_tax_rules_tax_rates_zones'))
		{
			Schema::create('012_105_tax_rules_tax_rates_zones', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->integer('tax_rule_id_105')->unsigned();
				$table->integer('tax_rate_zone_id_105')->unsigned();

				$table->primary(['tax_rule_id_105', 'tax_rate_zone_id_105'], 'pk01_012_105_tax_rules_tax_rates_zones');
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
		if(Schema::hasTable('012_105_tax_rules_tax_rates_zones'))
		{
			Schema::drop('012_105_tax_rules_tax_rates_zones');
		}
	}
}