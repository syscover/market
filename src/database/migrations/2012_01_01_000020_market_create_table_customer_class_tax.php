<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCustomerClassTax extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('012_100_customer_class_tax'))
        {
            Schema::create('012_100_customer_class_tax', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id_100')->unsigned();
                $table->string('name_100');
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
        if (Schema::hasTable('012_100_customer_class_tax'))
        {
            Schema::drop('012_100_customer_class_tax');
        }
    }
}