<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableWarehouse extends Migration
{
	public function up()
	{
		if (! Schema::hasTable('012_130_warehouse'))
		{
			Schema::create('012_130_warehouse', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id_130')->unsigned();
				$table->string('name_130');

				// geolocation data
				$table->string('country_id_130', 2)->nullable();
				$table->string('territorial_area_1_id_130', 6)->nullable();
				$table->string('territorial_area_2_id_130', 10)->nullable();
				$table->string('territorial_area_3_id_130', 10)->nullable();
				$table->string('cp_130')->nullable();
				$table->string('locality_130')->nullable();
				$table->string('address_130')->nullable();
				$table->string('latitude_130')->nullable();
				$table->string('longitude_130')->nullable();
				$table->boolean('active_130');

				$table->foreign('country_id_130', 'fk01_012_130_warehouse')
					->references('id_002')
					->on('001_002_country')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('territorial_area_1_id_130', 'fk02_012_130_warehouse')
					->references('id_003')
					->on('001_003_territorial_area_1')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('territorial_area_2_id_130', 'fk03_012_130_warehouse')
					->references('id_004')
					->on('001_004_territorial_area_2')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('territorial_area_3_id_130', 'fk04_012_130_warehouse')
					->references('id_005')
					->on('001_005_territorial_area_3')
					->onDelete('restrict')
					->onUpdate('cascade');
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
		if (Schema::hasTable('012_130_warehouse'))
		{
			Schema::drop('012_130_warehouse');
		}
	}
}