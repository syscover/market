<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableProductClassTax extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('012_101_product_class_tax'))
        {
            Schema::create('012_101_product_class_tax', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id_101')->unsigned();
                $table->string('name_101');
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
        if (Schema::hasTable('012_101_product_class_tax'))
        {
            Schema::drop('012_101_product_class_tax');
        }
    }
}