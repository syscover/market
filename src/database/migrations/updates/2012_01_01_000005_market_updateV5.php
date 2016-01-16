<?php

use Illuminate\Database\Migrations\Migration;

class MarketUpdateV5 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('012_111_product', 'sorting_111'))
		{
			Schema::table('012_111_product', function ($table) {
				$table->integer('sorting_111')->unsigned()->nullable()->after('active_111');
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