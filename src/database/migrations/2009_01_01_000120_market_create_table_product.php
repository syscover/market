<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableProduct extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{   
            Schema::create('012_111_product', function($table) {
                $table->engine = 'InnoDB';
                $table->increments('id_111')->unsigned();

				$table->boolean('active_111');

				$table->string('data_lang_111',255)->nullable();
				$table->text('data_111')->nullable();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('012_111_product');
	}

}