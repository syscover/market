<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV18 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// change gift_116
		if(Schema::hasColumn('012_116_order', 'gift_116'))
		{
			Schema::table('012_116_order', function (Blueprint $table) {
				// rename column, function renameColumn doesn't work
				DB::select(DB::raw('ALTER TABLE 012_116_order CHANGE gift_116 has_gift_116 TINYINT(1) NOT NULL'));
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