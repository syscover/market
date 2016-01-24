<?php

use Illuminate\Database\Migrations\Migration;

class MarketUpdateV6 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('012_117_order_row', 'name_117'))
		{
			Schema::table('012_117_order_row', function ($table) {
				$table->string('name_117')->nullable()->after('product_117');
				$table->json('data_117')->nullable()->after('description_117');
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