<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV15 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasColumn('012_111_product', 'parent_product_id_111'))
		{
			Schema::table('012_111_product', function (Blueprint $table) {
				$table->integer('parent_product_id_111')->unsigned()->nullable()->after('product_type_111');
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