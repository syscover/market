<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV37 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ***********************
        // customer_group_id_116
        // ***********************
        if(! Schema::hasColumn('012_116_order', 'customer_group_id_116'))
        {
            Schema::table('012_116_order', function (Blueprint $table) {
                $table->integer('customer_group_id_116')->unsigned()->nullable()->after('customer_id_116');

                $table->foreign('customer_group_id_116', 'fk12_012_116_order')
                    ->references('id_300')
                    ->on('009_300_group')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
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