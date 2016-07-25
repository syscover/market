<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV22 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // change rate_percent_103
        DBLibrary::renameColumn('012_103_tax_rate_zone', 'rate_percent_103', 'tax_rate_103', 'DECIMAL', '10,2', false, true);

        if(! Schema::hasColumn('012_104_tax_rule', 'translation_104'))
        {
            Schema::table('012_104_tax_rule', function (Blueprint $table) {
                $table->string('translation_104')->nullable()->after('name_104');
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