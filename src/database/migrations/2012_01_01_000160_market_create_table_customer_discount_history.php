<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableCustomerDiscountHistory extends Migration
{
	/**
	 * Table to registry each discount used for customer
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_126_customer_discount_history'))
		{
			Schema::create('012_126_customer_discount_history', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id_126')->unsigned();

				$table->integer('date_126')->unsigned();            // registry date
				$table->integer('customer_id_126')->unsigned();
				$table->integer('order_id_126')->unsigned();

                // if order is canceled, you can deactivate discounts
                $table->boolean('active_126')->default(true);

                // see config/market.php section Discounts rules families
				// 1 - discount from, cart price rule
				// 2 - discount from, catalog price rule
				// 3 - discount from, customer rule discount
				$table->tinyInteger('rule_family_id_126')->unsigned();

				// discount ID should come from customer discount
				//$table->integer('customer_discount_id_126')->unsigned()->nullable();

                // id of the rule applicable discount
				$table->integer('rule_id_126')->unsigned();
				
				$table->boolean('has_coupon_126')->default(false);
				$table->string('coupon_code_126')->nullable();

				// reference to table 001_017_text
				$table->integer('name_text_id_126')->unsigned();
				$table->integer('description_text_id_126')->nullable()->unsigned();

				// 001_017_text table values in the language that has exchanged the discount,
				// get the value in the user's language to have a reference in case of delete from the table 001_017_text
				$table->string('name_text_value_126');
				$table->text('description_text_value_126')->nullable();

                // see config/market.php section Discount type on shopping cart
                // 1 - without discount
                // 2 - discount percentage subtotal
                // 3 - discount fixed amount subtotal
                // 4 - discount percentage total
                // 5 - discount fixed amount total
				$table->tinyInteger('discount_type_id_126')->unsigned()->nullable();

                // fixed amount to discount over shopping cart
				$table->decimal('discount_fixed_amount_126', 10, 2)->nullable();

                // percentage to discount over shopping cart
				$table->decimal('discount_percentage_126', 10, 2)->nullable();

                // limit amount to discount, if the discount is a percentage
				$table->decimal('maximum_discount_amount_126', 10, 2)->nullable();

                // Cantidad de descuento calculado con el procentaje de descuento
				$table->decimal('discount_percentage_amount_126', 10, 2)->nullable();

				// check if apply discount to shipping amount
				$table->boolean('apply_shipping_amount_126');
				
				// check if this discount has free shipping
				$table->boolean('free_shipping_126');

				// reglas que se han tenido en cuenta para aplicar el descuento en caso de haberlas, ¿?
				$table->text('rules_126')->nullable();
				
				$table->foreign('customer_id_126', 'fk01_012_126_customer_discount_history')
					->references('id_301')
					->on('009_301_customer')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('order_id_126', 'fk02_012_126_customer_discount_history')
					->references('id_116')
					->on('012_116_order')
					->onDelete('restrict')
					->onUpdate('cascade');

				$table->index('rule_id_126', 'ix01_012_126_customer_discount_history');
				$table->index('coupon_code_126', 'ix02_012_126_customer_discount_history');
				$table->index('active_126', 'ix03_012_126_customer_discount_history');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if (Schema::hasTable('012_126_customer_discount_history'))
		{
			Schema::drop('012_126_customer_discount_history');
		}
	}
}