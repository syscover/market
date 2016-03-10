<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV9 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('012_126_customer_discount_used', 'discount_percentage_amount_126'))
		{
			Schema::table('012_126_customer_discount_used', function (Blueprint $table) {
				$table->tinyInteger('discount_percentage_amount_126')->nullable()->after('discount_percentage_126');
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