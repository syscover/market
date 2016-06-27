<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV21 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // change lang_110
        DBLibrary::renameColumnWithForeignKey('012_110_category', 'lang_110', 'lang_id_110', 'VARCHAR', 2, false, false, 'fk01_012_110_category', '001_001_lang', 'id_001');

        // change custom_field_group_111
        DBLibrary::renameColumnWithForeignKey('012_111_product', 'custom_field_group_111', 'field_group_id_111', 'INT', 10, true, true, 'fk01_012_111_product', '001_025_field_group', 'id_025');

        // change lang_112
        DBLibrary::renameColumnWithForeignKey('012_112_product_lang', 'lang_112', 'lang_id_112', 'VARCHAR', 2, false, false, 'fk02_012_112_product_lang', '001_001_lang', 'id_001', 'cascade', 'cascade');

        // change lang_114
        DBLibrary::renameColumnWithForeignKey('012_114_order_status', 'lang_114', 'lang_id_114', 'VARCHAR', 2, false, false, 'fk01_012_114_order_status', '001_001_lang', 'id_001');

        // change lang_115
        DBLibrary::renameColumnWithForeignKey('012_115_payment_method', 'lang_115', 'lang_id_115', 'VARCHAR', 2, false, false, 'fk01_012_115_payment_method', '001_001_lang', 'id_001');

        // change invoice_country_116
        DBLibrary::renameColumnWithForeignKey('012_116_order', 'invoice_country_116', 'invoice_country_id_116', 'VARCHAR', 2, false, true, 'fk04_012_116_order', '001_002_country', 'id_002');
        // change invoice_territorial_area_1_116
        DBLibrary::renameColumnWithForeignKey('012_116_order', 'invoice_territorial_area_1_116', 'invoice_territorial_area_1_id_116', 'VARCHAR', 6, false, true, 'fk05_012_116_order', '001_003_territorial_area_1', 'id_003');
        // change invoice_territorial_area_2_116
        DBLibrary::renameColumnWithForeignKey('012_116_order', 'invoice_territorial_area_2_116', 'invoice_territorial_area_2_id_116', 'VARCHAR', 10, false, true, 'fk06_012_116_order', '001_004_territorial_area_2', 'id_004');
        // change invoice_territorial_area_3_116
        DBLibrary::renameColumnWithForeignKey('012_116_order', 'invoice_territorial_area_3_116', 'invoice_territorial_area_3_id_116', 'VARCHAR', 10, false, true, 'fk07_012_116_order', '001_005_territorial_area_3', 'id_005');
        // change shipping_country_116
        DBLibrary::renameColumnWithForeignKey('012_116_order', 'shipping_country_116', 'shipping_country_id_116', 'VARCHAR', 2, false, true, 'fk08_012_116_order', '001_002_country', 'id_002');
        // change shipping_territorial_area_1_116
        DBLibrary::renameColumnWithForeignKey('012_116_order', 'shipping_territorial_area_1_116', 'shipping_territorial_area_1_id_116', 'VARCHAR', 6, false, true, 'fk09_012_116_order', '001_003_territorial_area_1', 'id_003');
        // change shipping_territorial_area_2_116
        DBLibrary::renameColumnWithForeignKey('012_116_order', 'shipping_territorial_area_2_116', 'shipping_territorial_area_2_id_116', 'VARCHAR', 10, false, true, 'fk10_012_116_order', '001_004_territorial_area_2', 'id_004');
        // change shipping_territorial_area_3_116
        DBLibrary::renameColumnWithForeignKey('012_116_order', 'shipping_territorial_area_3_116', 'shipping_territorial_area_3_id_116', 'VARCHAR', 10, false, true, 'fk11_012_116_order', '001_005_territorial_area_3', 'id_005');

        // change lang_117
        DBLibrary::renameColumnWithForeignKey('012_117_order_row', 'lang_117', 'lang_id_117', 'VARCHAR', 2, false, false, 'fk01_012_117_order_row', '001_001_lang', 'id_001');
        // change order_117
        DBLibrary::renameColumnWithForeignKey('012_117_order_row', 'order_117', 'order_id_117', 'INT', 10, true, false, 'fk02_012_117_order_row', '012_116_order', 'id_116', 'cascade', 'cascade');
        // change product_117
        DBLibrary::renameColumnWithForeignKey('012_117_order_row', 'product_117', 'product_id_117', 'INT', 10, true, true, 'fk03_012_117_order_row', '012_111_product', 'id_111', 'set null', 'cascade');

        // change customer_126
        DBLibrary::renameColumnWithForeignKey('012_126_customer_discount_history', 'customer_126', 'customer_id_126', 'INT', 10, true, false, 'fk01_012_126_customer_discount_history', '009_301_customer', 'id_301');
        // change order_126
        DBLibrary::renameColumnWithForeignKey('012_126_customer_discount_history', 'order_126', 'order_id_126', 'INT', 10, true, false, 'fk02_012_126_customer_discount_history', '012_116_order', 'id_116');

        // rename columns
        // parent_110
        DBLibrary::renameColumn('012_110_category', 'parent_110', 'parent_id_110', 'INT', 10, true, true);

        // product_type_111
        DBLibrary::renameColumn('012_111_product', 'product_type_111', 'type_id_111', 'TINYINT', 3, true, false);
        // price_type_111
        DBLibrary::renameColumn('012_111_product', 'price_type_111', 'price_type_id_111', 'TINYINT', 3, true, false);

        // product_113
        DBLibrary::renameColumn('012_113_products_categories', 'product_113', 'product_id_113', 'INT', 10, true, false);
        // category_113
        DBLibrary::renameColumn('012_113_products_categories', 'category_113', 'category_id_113', 'INT', 10, true, false);

        // name_text_120
        DBLibrary::renameColumn('012_120_cart_price_rule', 'name_text_120', 'name_text_id_120', 'INT', 10, true, false);
        // description_text_120
        DBLibrary::renameColumn('012_120_cart_price_rule', 'description_text_120', 'description_text_id_120', 'INT', 10, true, true);
        // discount_type_120
        DBLibrary::renameColumn('012_120_cart_price_rule', 'discount_type_120', 'discount_type_id_120', 'TINYINT', 3, true, true);

        // rule_family_126
        DBLibrary::renameColumn('012_126_customer_discount_history', 'rule_family_126', 'rule_family_id_126', 'TINYINT', 3, true, false);
        // rule_126
        DBLibrary::renameColumn('012_126_customer_discount_history', 'rule_126', 'rule_id_126', 'INT', 10, true, false);
        // name_text_126
        DBLibrary::renameColumn('012_126_customer_discount_history', 'name_text_126', 'name_text_id_126', 'INT', 10, true, false);
        // description_text_126
        DBLibrary::renameColumn('012_126_customer_discount_history', 'description_text_126', 'description_text_id_126', 'INT', 10, true, true);
        // discount_type_126
        DBLibrary::renameColumn('012_126_customer_discount_history', 'discount_type_126', 'discount_type_id_126', 'TINYINT', 3, true, true);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}