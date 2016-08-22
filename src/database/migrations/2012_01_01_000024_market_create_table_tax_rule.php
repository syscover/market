<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableTaxRule extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasTable('012_104_tax_rule'))
		{
			Schema::create('012_104_tax_rule', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id_104')->unsigned();
				$table->string('name_104');
                $table->string('translation_104')->nullable();

				// si apunta a varias reglas, se establezce la prioridad de aplicación sobre el producto
				$table->smallInteger('priority_104')->unsigned();

				// en el caso de aplicar varios impuestos, el orden en el que aparecerá en el caso de haber varios impuestos
				$table->smallInteger('sort_order_104')->unsigned();
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
		if(Schema::hasTable('012_104_tax_rule'))
		{
			Schema::drop('012_104_tax_rule');
		}
	}
}