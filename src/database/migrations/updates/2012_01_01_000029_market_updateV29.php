<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV29 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ***********************
        // 012_103_tax_rate_zone
        // ***********************
        if(Schema::hasColumn('012_103_tax_rate_zone', 'tax_rate_103'))
        {
            // tax_rate_103
            DBLibrary::renameColumn('012_103_tax_rate_zone', 'tax_rate_103', 'tax_rate_103', 'DECIMAL', '10,2', false, false, 0);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}