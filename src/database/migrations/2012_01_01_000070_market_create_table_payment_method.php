<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTablePaymentMethod extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('012_115_payment_method'))
		{
			Schema::create('012_115_payment_method', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->integer('id_115')->unsigned();
				$table->string('lang_115', 2);
				$table->string('name_115');
				// new order status
				$table->integer('order_status_successful_id_115')->nullable()->unsigned();
				$table->decimal('minimum_price_115', 10, 2)->nullable();
				$table->decimal('maximum_price_115', 10, 2)->nullable();
				$table->text('instructions_115')->nullable();
				$table->integer('sorting_115')->unsigned()->nullable();
				$table->boolean('active_115');
				$table->string('data_lang_115')->nullable();

				$table->primary(['id_115', 'lang_115'], 'pk01_012_115_payment_method');
				$table->foreign('lang_115', 'fk01_012_115_payment_method')->references('id_001')->on('001_001_lang')
					->onDelete('restrict')->onUpdate('cascade');
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
	public function down()
	{
		if (Schema::hasTable('012_115_payment_method'))
		{
			Schema::drop('012_115_payment_method');
		}
	}
}