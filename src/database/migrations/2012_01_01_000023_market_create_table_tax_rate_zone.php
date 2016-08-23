<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableTaxRateZone extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('012_103_tax_rate_zone'))
		{
			Schema::create('012_103_tax_rate_zone', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id_103')->unsigned();
				$table->string('name_103');
				$table->string('country_id_103', 2);
				$table->string('territorial_area_1_id_103', 6)->nullable();
				$table->string('territorial_area_2_id_103', 10)->nullable();
				$table->string('territorial_area_3_id_103', 10)->nullable();
				$table->string('cp_103')->nullable();
                $table->decimal('tax_rate_103', 10, 2)->default(0);

				$table->foreign('country_id_103', 'fk01_012_103_tax_rate_zone')
					->references('id_002')
					->on('001_002_country')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('territorial_area_1_id_103', 'fk02_012_103_tax_rate_zone')
					->references('id_003')
					->on('001_003_territorial_area_1')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('territorial_area_2_id_103', 'fk03_012_103_tax_rate_zone')
					->references('id_004')
					->on('001_004_territorial_area_2')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('territorial_area_3_id_103', 'fk04_012_103_tax_rate_zone')
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
		if(Schema::hasTable('012_103_tax_rate_zone'))
		{
			Schema::drop('012_103_tax_rate_zone');
		}
	}
}