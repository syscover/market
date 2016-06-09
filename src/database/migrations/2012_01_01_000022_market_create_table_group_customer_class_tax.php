<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableGroupCustomerClassTax extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('012_102_group_customer_class_tax'))
		{
			Schema::create('012_102_group_customer_class_tax', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->integer('group_id_102')->unsigned();
				$table->integer('customer_class_tax_id_102')->unsigned();

				$table->primary('group_id_102', 'pk01_group_customer_class_tax');

				$table->foreign('group_id_102', 'fk01_group_customer_class_tax')->references('id_300')->on('009_300_group')
					->onDelete('cascade')->onUpdate('cascade');
				$table->foreign('customer_class_tax_id_102', 'fk02_group_customer_class_tax')->references('id_100')->on('012_100_customer_class_tax')
					->onDelete('cascade')->onUpdate('cascade');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if(Schema::hasTable('012_102_group_customer_class_tax'))
		{
			Schema::drop('012_102_group_customer_class_tax');
		}
	}
}