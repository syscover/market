<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableTaxRulesCustomerClassTaxes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('012_106_tax_rules_customer_class_taxes'))
		{
			Schema::create('012_106_tax_rules_customer_class_taxes', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->integer('tax_rule_id_106')->unsigned();
				$table->integer('customer_class_tax_id_106')->unsigned();

				$table->primary(['tax_rule_id_106', 'customer_class_tax_id_106'], 'pk01_012_106_tax_rules_customer_class_taxes');
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
		if(Schema::hasTable('012_106_tax_rules_customer_class_taxes'))
		{
			Schema::drop('012_106_tax_rules_customer_class_taxes');
		}
	}
}