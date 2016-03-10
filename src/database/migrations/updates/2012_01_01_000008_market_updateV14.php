<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV14 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(Schema::hasColumn('012_115_payment_method', 'order_status_115'))
		{
			$key = DB::select(DB::raw('SHOW KEYS FROM 012_115_payment_method WHERE Key_name=\'fk02_012_115_payment_method\''));

			// delete foreing keys
			if($key != null)
			{
				Schema::table('012_115_payment_method', function (Blueprint $table) {
					$table->dropForeign('fk02_012_115_payment_method');
					$table->dropIndex('fk02_012_115_payment_method');
				});
			}

			Schema::table('012_115_payment_method', function (Blueprint $table) {
				// rename column, function renameColumn doesn't work
				DB::select(DB::raw('ALTER TABLE 012_115_payment_method CHANGE order_status_115 order_status_successful_id_115 INTEGER UNSIGNED NULL'));
				$table->foreign('order_status_successful_id_115', 'fk02_012_115_payment_method')->references('id_114')->on('012_114_order_status')
					->onDelete('restrict')->onUpdate('cascade');
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