<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV27 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn('012_111_product', 'subtotal_111'))
        {
            Schema::table('012_111_product', function (Blueprint $table) {
                $table->decimal('subtotal_111', 12, 4)->nullable()->after('price_type_id_111');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}