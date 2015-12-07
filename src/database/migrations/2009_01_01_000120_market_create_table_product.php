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
				$table->integer('custom_field_group_111')->unsigned()->nullable();
				$table->tinyInteger('price_type_111')->unsigned();
				$table->decimal('price_111', 10, 2)->nullable();
				$table->decimal('weight_111', 10, 3)->nullable();
				$table->boolean('active_111');

				$table->string('data_lang_111',255)->nullable();
				$table->text('data_111')->nullable();

				$table->foreign('custom_field_group_111', 'fk01_012_111_product')->references('id_025')->on('001_025_field_group')
					->onDelete('restrict')->onUpdate('cascade');
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