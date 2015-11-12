<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCustomerTax extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('012_100_customer_class_tax', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_100')->unsigned();
            $table->string('name_100', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('012_100_customer_class_tax');
    }
}
