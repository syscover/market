<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableOrder extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('012_115_order'))
		{
			Schema::create('012_115_order', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_115')->unsigned();

				$table->integer('date_115')->unsigned();
				$table->tinyInteger('state_115')->unsigned();
				$table->string('ip_115', 100);

				// datos de facturación
				$table->string('customer_company_115')->nullable();
				$table->string('customer_tin_115', 50)->nullable();
				$table->string('customer_name_115', 50)->nullable();
				$table->string('customer_surname_115', 50)->nullable();
				$table->string('customer_email_115', 50);
				$table->string('customer_phone_115', 50)->nullable();
				$table->string('customer_mobile_115', 50)->nullable();

				// dirección de facturación
				$table->string('invoice_country_115', 2);
				$table->string('invoice_territorial_area_1_115', 6)->nullable();
				$table->string('invoice_territorial_area_2_115', 10)->nullable();
				$table->string('invoice_territorial_area_3_115', 10)->nullable();
				$table->string('invoice_cp_115', 10)->nullable();
				$table->string('invoice_locality_115', 100)->nullable();
				$table->string('invoice_address_115', 150)->nullable();
				$table->string('invoice_latitude_115', 50)->nullable();
				$table->string('invoice_longitude_115', 50)->nullable();
				
				// datos de envío
				$table->string('shipping_company_115')->nullable();
				$table->string('shipping_name_115', 50)->nullable();
				$table->string('shipping_surname_115', 50)->nullable();
				$table->string('shipping_email_115', 50);
				$table->string('shipping_phone_115', 50)->nullable();
				$table->string('shipping_mobile_115', 50)->nullable();
				$table->string('shipping_shipping_country_115', 2);
				$table->string('shipping_territorial_area_1_115', 6)->nullable();
				$table->string('shipping_territorial_area_2_115', 10)->nullable();
				$table->string('shipping_territorial_area_3_115', 10)->nullable();
				$table->string('shipping_cp_115', 10)->nullable();
				$table->string('shipping_locality_115', 100)->nullable();
				$table->string('shipping_address_115', 150)->nullable();
				$table->string('shipping_latitude_115', 50)->nullable();
				$table->string('shipping_longitude_115', 50)->nullable();
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
		if (Schema::hasTable('012_115_order'))
		{
			Schema::drop('012_115_order');
		}
	}
}