<?php

use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV25 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('012_111_product', 'price_111'))
        {
            // price_111
            DBLibrary::renameColumn('012_111_product', 'price_111', 'subtotal_111', 'DECIMAL', '12,4', false, true);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}