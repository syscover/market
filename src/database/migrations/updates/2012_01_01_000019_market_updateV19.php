<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV19 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasColumn('012_116_order', 'data_116'))
		{
			Schema::table('012_116_order', function (Blueprint $table) {
				$table->text('data_116')->nullable()->after('ip_116');
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