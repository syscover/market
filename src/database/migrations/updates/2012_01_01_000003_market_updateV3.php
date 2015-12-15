<?php

use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Models\Package;


class MarketUpdateV3 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('012_111_product', 'product_type_111'))
		{
			Schema::table('012_111_product', function ($table) {
				$table->tinyInteger('product_type_111')->unsigned()->after('price_type_111');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){}

}