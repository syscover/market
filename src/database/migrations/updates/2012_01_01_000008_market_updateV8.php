<?php

use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Models\Resource;

class MarketUpdateV8 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(Resource::where('id_007', 'market-cart-price-rule')->count() == 0)
		{
			Resource::create([
				'id_007' 		=> 'market-cart-price-rule',
				'name_007' 		=> 'Marketing -- Cart price rule',
				'package_007' 	=> '12'
			]);
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){}
}