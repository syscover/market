<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCategory extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_110_category'))
		{
			Schema::create('012_110_category', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->integer('id_110')->unsigned();
				$table->string('lang_id_110', 2);
				$table->integer('parent_id_110')->unsigned()->nullable();

				$table->string('name_110');
				$table->string('slug_110');
				$table->boolean('active_110');
				$table->text('description_110')->nullable();

				$table->string('data_lang_110', 255)->nullable();
				$table->text('data_110')->nullable();
				
				$table->foreign('lang_id_110', 'fk01_012_110_category')
					->references('id_001')
					->on('001_001_lang')
					->onDelete('restrict')
					->onUpdate('cascade');

				$table->primary(['id_110', 'lang_id_110'], 'pk01_012_110_category');
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
		if (Schema::hasTable('012_110_category'))
		{
			Schema::drop('012_110_category');
		}
	}
}