<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV1 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('012_112_product_lang', 'description_112'))
		{
			Schema::table('012_112_product_lang', function (Blueprint $table) {
				$table->text('description_112')->after('slug_112');
			});
		}

		if(!Schema::hasColumn('012_111_product', 'price_type_111'))
		{
			Schema::table('012_111_product', function (Blueprint $table) {
				$table->tinyInteger('price_type_111')->unsigned()->after('custom_field_group_111');
				$table->decimal('price_111', 10, 2)->nullable()->after('price_type_111');
				$table->decimal('weight_111', 10, 3)->nullable()->after('price_111');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){}
}