<?php

use Illuminate\Database\Migrations\Migration;

class MarketUpdateV12 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if( ! Schema::hasColumn('012_126_customer_discount_used', 'has_coupon_126'))
		{
			Schema::table('012_126_customer_discount_used', function ($table) {
				$table->boolean('has_coupon_126')->after('discount_family_126');
			});
		}

		if( ! Schema::hasColumn('012_126_customer_discount_used', 'coupon_code_126'))
		{
			Schema::table('012_126_customer_discount_used', function ($table) {
				$table->string('coupon_code_126')->nullable()->after('has_coupon_126');
				$table->index('coupon_code_126', 'ix03_012_126_customer_discount_used');
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