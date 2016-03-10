<?php

use Illuminate\Database\Schema\Blueprint;
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
		if(!Schema::hasColumn('012_116_order', 'payment_id_116'))
		{
			Schema::table('012_116_order', function (Blueprint $table) {
				$table->string('payment_id_116')->after('payment_method_116');
				$table->index('payment_id_116', 'ix01_012_116_order');
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