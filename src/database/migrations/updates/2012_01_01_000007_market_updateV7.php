<?php

use Illuminate\Database\Migrations\Migration;

class MarketUpdateV7 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('012_116_order', 'provide_invoice_116'))
		{
			Schema::table('012_116_order', function ($table) {

				$table->boolean('provide_invoice_116')->after('invoice_longitude_116');
				$table->boolean('invoiced_116')->after('provide_invoice_116');
				$table->boolean('is_shipping_116')->after('invoiced_116');
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