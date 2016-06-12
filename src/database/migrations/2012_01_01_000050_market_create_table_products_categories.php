<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableProductsCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_113_products_categories')) 
		{
			Schema::create('012_113_products_categories', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->integer('product_113')->unsigned();
				$table->integer('category_113')->unsigned();

				$table->primary(['product_113', 'category_113']);
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
		if (Schema::hasTable('012_113_products_categories')) 
		{
			Schema::drop('012_113_products_categories');
		}
	}
}