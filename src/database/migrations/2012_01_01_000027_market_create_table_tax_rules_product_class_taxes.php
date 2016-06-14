<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableTaxRulesProductClassTaxes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('012_107_tax_rules_product_class_taxes'))
		{
			Schema::create('012_107_tax_rules_product_class_taxes', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->integer('tax_rule_id_107')->unsigned();
				$table->integer('product_class_tax_id_107')->unsigned();

				$table->primary(['tax_rule_id_107', 'product_class_tax_id_107'], 'pk01_012_107_tax_rules_product_class_taxes');
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
		if(Schema::hasTable('012_107_tax_rules_product_class_taxes'))
		{
			Schema::drop('012_107_tax_rules_product_class_taxes');
		}
	}
}