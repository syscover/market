<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV16 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasColumn('012_117_order_row', 'tax_percentage_117'))
		{
			Schema::table('012_117_order_row', function (Blueprint $table) {
				$table->decimal('tax_percentage_117', 10, 2)->after('discount_amount_117');
			});
		}

		if(! Schema::hasColumn('012_117_order_row', 'tax_amount_117'))
		{
			Schema::table('012_117_order_row', function (Blueprint $table) {
				$table->decimal('tax_amount_117', 10, 2)->after('tax_percentage_117');
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