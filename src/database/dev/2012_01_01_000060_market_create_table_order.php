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


				$table->string('customer_company_114')->nullable();
				$table->string('customer_tin_114', 50)->nullable();
				$table->string('customer_name_114', 50)->nullable();
				$table->string('customer_surname_114', 50)->nullable();
				$table->string('customer_email_114', 50);
				$table->string('customer_phone_114', 50)->nullable();
				$table->string('customer_mobile_114', 50)->nullable();

				// dirección de facturación

				// dirección de envío


				$table->foreign('id_112', 'fk01_012_112_product_lang')->references('id_111')->on('012_111_product')
						->onDelete('cascade')->onUpdate('cascade');
				$table->foreign('lang_112', 'fk02_012_112_product_lang')->references('id_001')->on('001_001_lang')
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
		if (Schema::hasTable('012_114_order'))
		{
			Schema::drop('012_114_order');
		}
	}
}