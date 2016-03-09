<?php

use Illuminate\Database\Migrations\Migration;

class MarketUpdateV11 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('012_116_order', 'date_text_116'))
		{
			Schema::table('012_116_order', function ($table) {
				$table->string('date_text_116')->after('date_116');;
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