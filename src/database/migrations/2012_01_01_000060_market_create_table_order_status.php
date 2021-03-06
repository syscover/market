<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableOrderStatus extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_114_order_status'))
		{
			Schema::create('012_114_order_status', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->integer('id_114')->unsigned();
				$table->string('lang_id_114', 2);
				$table->string('name_114');
				$table->boolean('active_114');
				$table->string('data_lang_114')->nullable();
				
				$table->foreign('lang_id_114', 'fk01_012_114_order_status')
					->references('id_001')
					->on('001_001_lang')
					->onDelete('restrict')
					->onUpdate('cascade');

				$table->primary(['id_114', 'lang_id_114'], 'pk01_012_114_order_status');
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
		if (Schema::hasTable('012_114_order_status'))
		{
			Schema::drop('012_114_order_status');
		}
	}
}