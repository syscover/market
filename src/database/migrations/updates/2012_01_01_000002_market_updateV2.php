<?php

use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Models\Package;


class MarketUpdateV2 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$crmPackage = Package::where('folder_012', 'crm')->first();

		if($crmPackage->id_012 == 12)
		{
			Package::where('folder_012', 'crm')->update([
					'id_012'		=> 14,
					'sorting_012'	=> 14,
			]);
		}

		$marketPackage = Package::where('folder_012', 'market')->first();

		if($marketPackage->id_012 == 9)
		{
			Package::where('folder_012', 'market')->update([
					'id_012'		=> 12,
					'sorting_012'	=> 12,
				]);
		}

		$crmPackage = Package::where('folder_012', 'crm')->first();

		if($crmPackage->id_012 == 14)
		{
			Package::where('folder_012', 'crm')->update([
					'id_012'		=> 9,
					'sorting_012'	=> 9,
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