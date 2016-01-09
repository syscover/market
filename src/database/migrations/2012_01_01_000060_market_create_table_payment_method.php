<?php

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
		if (!Schema::hasTable('012_114_payment_method'))
		{
			Schema::create('012_114_payment_method', function ($table) {
				$table->engine = 'InnoDB';

				$table->integer('id_114')->unsigned();
				$table->string('lang_114', 2);
				$table->string('name_114');
				$table->decimal('minimum_price_114', 10, 2)->nullable();
				$table->decimal('maximum_price_114', 10, 2)->nullable();
				$table->text('instructions_114')->nullable();
				$table->integer('sorting_114')->unsigned()->nullable();
				$table->boolean('active_114');
				$table->string('data_lang_114')->nullable();

				$table->primary(['id_114', 'lang_114'], 'pk01_012_114_payment_method');
				$table->foreign('lang_114', 'fk01_012_114_payment_methods')->references('id_001')->on('001_001_lang')
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
		if (Schema::hasTable('012_114_payment_method'))
		{
			Schema::drop('012_114_payment_method');
		}
	}
}