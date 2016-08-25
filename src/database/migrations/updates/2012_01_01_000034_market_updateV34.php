<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV34 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ***********************
        // 012_117_order_row
        // ***********************
        if(Schema::hasColumn('012_117_order_row', 'discount_subtotal_percentage_117'))
        {
            DBLibrary::renameColumn('012_117_order_row', 'discount_subtotal_percentage_117', 'discount_subtotal_percentage_117', 'DECIMAL', '10,2', false, false);
        }

        if(Schema::hasColumn('012_117_order_row', 'discount_total_percentage_117'))
        {
            DBLibrary::renameColumn('012_117_order_row', 'discount_total_percentage_117', 'discount_total_percentage_117', 'DECIMAL', '10,2', false, false);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}