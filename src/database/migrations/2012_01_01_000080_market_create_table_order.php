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
		if (!Schema::hasTable('012_116_order'))
		{
			Schema::create('012_116_order', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_116')->unsigned();

				$table->integer('date_116')->unsigned();
				$table->integer('status_116')->unsigned();
				$table->string('ip_116');

				$table->integer('customer_116')->unsigned()->nullable();
				$table->integer('payment_method_116')->unsigned();
				$table->text('comments_116')->nullable();

				// gift
				$table->boolean('gift_116');
				$table->string('gift_from_116')->nullable();
				$table->string('gift_to_116')->nullable();
				$table->text('gift_message_116')->nullable();

				// amounts
				$table->decimal('subtotal_116', 10, 2);
				$table->decimal('shipping_116', 10, 2);
				$table->decimal('row_discount_amount_116', 10, 2);							// without tax
				$table->decimal('total_discount_percentage_116', 10, 2)->nullable(); 		// without tax
				$table->decimal('total_discount_amount_116', 10, 2);						// without tax
				$table->decimal('tax_amount_116', 10, 2);
				$table->decimal('total_116', 10, 2);


				// datos de facturación
				$table->string('customer_company_116')->nullable();
				$table->string('customer_tin_116')->nullable();
				$table->string('customer_name_116')->nullable();
				$table->string('customer_surname_116')->nullable();
				$table->string('customer_email_116');
				$table->string('customer_phone_116')->nullable();
				$table->string('customer_mobile_116')->nullable();

				// invoice data
				$table->string('invoice_country_116', 2);
				$table->string('invoice_territorial_area_1_116', 6)->nullable();
				$table->string('invoice_territorial_area_2_116', 10)->nullable();
				$table->string('invoice_territorial_area_3_116', 10)->nullable();
				$table->string('invoice_cp_116', 10)->nullable();
				$table->string('invoice_locality_116', 100)->nullable();
				$table->string('invoice_address_116', 150)->nullable();
				$table->string('invoice_latitude_116', 50)->nullable();
				$table->string('invoice_longitude_116', 50)->nullable();
				
				// shipping data
				$table->string('shipping_company_116')->nullable();
				$table->string('shipping_name_116')->nullable();
				$table->string('shipping_surname_116')->nullable();
				$table->string('shipping_email_116');
				$table->string('shipping_phone_116')->nullable();
				$table->string('shipping_mobile_116')->nullable();
				$table->string('shipping_country_116', 2);
				$table->string('shipping_territorial_area_1_116', 6)->nullable();
				$table->string('shipping_territorial_area_2_116', 10)->nullable();
				$table->string('shipping_territorial_area_3_116', 10)->nullable();
				$table->string('shipping_cp_116', 10)->nullable();
				$table->string('shipping_locality_116', 100)->nullable();
				$table->string('shipping_address_116', 150)->nullable();
				$table->string('shipping_latitude_116', 50)->nullable();
				$table->string('shipping_longitude_116', 50)->nullable();

				// customer relations
				$table->foreign('customer_116', 'fk01_012_116_order')->references('id_301')->on('009_301_customer')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('status_116', 'fk02_012_116_order')->references('id_114')->on('012_114_order_status')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('payment_method_116', 'fk03_012_116_order')->references('id_115')->on('012_115_payment_method')
					->onDelete('restrict')->onUpdate('cascade');


				// invoice relations
				$table->foreign('invoice_country_116', 'fk04_012_116_order')->references('id_002')->on('001_002_country')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('invoice_territorial_area_1_116', 'fk05_012_116_order')->references('id_003')->on('001_003_territorial_area_1')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('invoice_territorial_area_2_116', 'fk06_012_116_order')->references('id_004')->on('001_004_territorial_area_2')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('invoice_territorial_area_3_116', 'fk07_012_116_order')->references('id_005')->on('001_005_territorial_area_3')
					->onDelete('restrict')->onUpdate('cascade');
				// shipping relations
				$table->foreign('shipping_country_116', 'fk08_012_116_order')->references('id_002')->on('001_002_country')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('shipping_territorial_area_1_116', 'fk09_012_116_order')->references('id_003')->on('001_003_territorial_area_1')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('shipping_territorial_area_2_116', 'fk10_012_116_order')->references('id_004')->on('001_004_territorial_area_2')
					->onDelete('restrict')->onUpdate('cascade');
				$table->foreign('shipping_territorial_area_3_116', 'fk11_012_116_order')->references('id_005')->on('001_005_territorial_area_3')
					->onDelete('restrict')->onUpdate('cascade');
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
		if (Schema::hasTable('012_116_order'))
		{
			Schema::drop('012_116_order');
		}
	}
}