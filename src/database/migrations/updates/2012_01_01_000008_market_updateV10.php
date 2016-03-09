<?php

use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Models\Resource;

class MarketUpdateV10 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(Schema::hasColumn('012_126_customer_discount_used', 'discount_126'))
		{
			Schema::table('012_126_customer_discount_used', function ($table) {
				$table->dropColumn('discount_126');
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