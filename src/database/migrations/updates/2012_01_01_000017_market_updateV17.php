<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV17 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// change customer_116
		if(Schema::hasColumn('012_116_order', 'customer_116'))
		{
			$key = DB::select(DB::raw('SHOW KEYS FROM 012_116_order WHERE Key_name=\'fk01_012_116_order\''));

			// delete foreing keys
			if($key != null)
			{
				Schema::table('012_116_order', function (Blueprint $table) {
					$table->dropForeign('fk01_012_116_order');
					$table->dropIndex('fk01_012_116_order');
				});
			}

			Schema::table('012_116_order', function (Blueprint $table) {
				// rename column, function renameColumn doesn't work
				DB::select(DB::raw('ALTER TABLE 012_116_order CHANGE customer_116 customer_id_116 INTEGER UNSIGNED NOT NULL'));
				$table->foreign('customer_id_116', 'fk01_012_116_order')->references('id_301')->on('009_301_customer')
					->onDelete('restrict')->onUpdate('cascade');
			});
		}

		// change status_116
		if(Schema::hasColumn('012_116_order', 'status_116'))
		{
			$key = DB::select(DB::raw('SHOW KEYS FROM 012_116_order WHERE Key_name=\'fk02_012_116_order\''));

			// delete foreing keys
			if($key != null)
			{
				Schema::table('012_116_order', function (Blueprint $table) {
					$table->dropForeign('fk02_012_116_order');
					$table->dropIndex('fk02_012_116_order');
				});
			}

			Schema::table('012_116_order', function (Blueprint $table) {
				// rename column, function renameColumn doesn't work
				DB::select(DB::raw('ALTER TABLE 012_116_order CHANGE status_116 status_id_116 INTEGER UNSIGNED NOT NULL'));
				$table->foreign('status_id_116', 'fk02_012_116_order')->references('id_114')->on('012_114_order_status')
					->onDelete('restrict')->onUpdate('cascade');
			});
		}

		// change payment_method_116
		if(Schema::hasColumn('012_116_order', 'payment_method_116'))
		{
			$key = DB::select(DB::raw('SHOW KEYS FROM 012_116_order WHERE Key_name=\'fk03_012_116_order\''));

			// delete foreing keys
			if($key != null)
			{
				Schema::table('012_116_order', function (Blueprint $table) {
					$table->dropForeign('fk03_012_116_order');
					$table->dropIndex('fk03_012_116_order');
				});
			}

			Schema::table('012_116_order', function (Blueprint $table) {
				// rename column, function renameColumn doesn't work
				DB::select(DB::raw('ALTER TABLE 012_116_order CHANGE payment_method_116 payment_method_id_116 INTEGER UNSIGNED NOT NULL'));
				$table->foreign('payment_method_id_116', 'fk03_012_116_order')->references('id_115')->on('012_115_payment_method')
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