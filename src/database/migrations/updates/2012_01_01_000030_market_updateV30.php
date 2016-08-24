<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV30 extends Migration
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
        if(Schema::hasColumn('012_116_order', 'total_discount_amount_116'))
        {
            // total_discount_amount_116
            DBLibrary::renameColumn('012_116_order', 'total_discount_amount_116', 'total_discount_amount_116', 'DECIMAL', '12,4', false, false, 0);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}