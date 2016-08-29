<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV35 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $response = \Syscover\Pulsar\Models\Resource::find('market-tpv-paypal-web-profile');

        if($response == null)
        {
            \Syscover\Pulsar\Models\Resource::create([
                'id_007'            => 'market-tpv-paypal-web-profile',
                'name_007'          => 'TPVs -- PayPal -- Web profile',
                'package_id_007'    => '12'
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}