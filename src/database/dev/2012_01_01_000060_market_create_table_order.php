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
		if (!Schema::hasTable('012_114_order'))
		{
			Schema::create('012_114_order', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_114')->unsigned();
				$table->integer('date_114')->unsigned();
				$table->tinyInteger('state_114')->unsigned();

				$table->string('ip_114', 100);

				// datos de facturación
				$table->string('customer_company_114')->nullable();
				$table->string('customer_tin_114', 50)->nullable();
				$table->string('customer_name_114', 50)->nullable();
				$table->string('customer_surname_114', 50)->nullable();
				$table->string('customer_email_114', 50);
				$table->string('customer_phone_114', 50)->nullable();
				$table->string('customer_mobile_114', 50)->nullable();

				// dirección de facturación
				$table->string('invoice_country_170', 2);
				$table->string('invoice_territorial_area_1_170', 6)->nullable();
				$table->string('invoice_territorial_area_2_170', 10)->nullable();
				$table->string('invoice_territorial_area_3_170', 10)->nullable();
				$table->string('invoice_cp_170', 10)->nullable();
				$table->string('invoice_locality_170', 100)->nullable();
				$table->string('invoice_address_170', 150)->nullable();
				$table->string('invoice_latitude_170', 50)->nullable();
				$table->string('invoice_longitude_170', 50)->nullable();
				
				// datos de envío
				$table->string('shipping_company_114')->nullable();
				$table->string('shipping_name_114', 50)->nullable();
				$table->string('shipping_surname_114', 50)->nullable();
				$table->string('shipping_email_114', 50);
				$table->string('shipping_phone_114', 50)->nullable();
				$table->string('shipping_mobile_114', 50)->nullable();
				$table->string('shipping_shipping_country_170', 2);
				$table->string('shipping_territorial_area_1_170', 6)->nullable();
				$table->string('shipping_territorial_area_2_170', 10)->nullable();
				$table->string('shipping_territorial_area_3_170', 10)->nullable();
				$table->string('shipping_cp_170', 10)->nullable();
				$table->string('shipping_locality_170', 100)->nullable();
				$table->string('shipping_address_170', 150)->nullable();
				$table->string('shipping_latitude_170', 50)->nullable();
				$table->string('shipping_longitude_170', 50)->nullable();



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
		if (Schema::hasTable('012_114_order'))
		{
			Schema::drop('012_114_order');
		}
	}
}