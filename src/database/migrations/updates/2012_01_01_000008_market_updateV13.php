<?php

use Illuminate\Database\Migrations\Migration;

class MarketUpdateV13 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if( ! Schema::hasColumn('012_126_customer_discount_used', 'active_126'))
		{
			Schema::table('012_126_customer_discount_used', function ($table) {
				$table->boolean('active_126')->default(true)->after('order_126');
				$table->index('active_126', 'ix04_012_126_customer_discount_used');
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