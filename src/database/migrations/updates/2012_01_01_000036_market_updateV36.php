<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV36 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ***********************
        // 012_116_order
        // ***********************
        if(Schema::hasColumn('012_116_order', 'payment_id_116'))
        {
            DBLibrary::renameColumn('012_116_order', 'payment_id_116', 'payment_id_116', 'VARCHAR', 255, false, true);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}