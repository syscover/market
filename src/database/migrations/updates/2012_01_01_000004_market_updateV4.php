<?php

use Illuminate\Database\Migrations\Migration;


class MarketUpdateV4 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('012_111_product', 'product_prices_111'))
		{
			Schema::table('012_111_product', function ($table) {
				$table->tinyInteger('product_prices_111')->unsigned()->after('price_111');
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