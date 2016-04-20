<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class CustomerDiscountUsed
 *
 * Model with properties
 * <br><b>[id, date, customer, order, discount_family, has_coupon, coupon_code, rule, discount, name_text, description_text, name_text_value, description_text_value, discount_type, discount_amount, discount_percentage, maximum_discount_amount, apply_shipping_amount, free_shipping, rules]</b>
 *
 * @package     Syscover\Market\Models
 */

class CustomerDiscountUsed extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_126_customer_discount_used';
    protected $primaryKey   = 'id_126';
    protected $suffix       = '126';
    public $timestamps      = false;
    protected $fillable     = ['id_126', 'date_126', 'customer_126', 'order_126', 'discount_family_126', 'has_coupon_126', 'coupon_code_126', 'rule_126', 'discount_126', 'name_text_126', 'description_text_126', 'name_text_value_126', 'description_text_value_126', 'discount_type_126', 'discount_fixed_amount_126', 'discount_percentage_126', 'maximum_discount_amount_126', 'apply_shipping_amount_126', 'free_shipping_126', 'rules_126'];
    protected $maps         = [];
    protected $relationMaps = [
        'customer_126'  => \Syscover\Crm\Models\Customer::class,
        'order_126'     => \Syscover\Market\Models\Order::class
    ];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('009_301_customer', '012_126_customer_discount_used.customer_126', '=', '009_301_customer.id_301')
            ->join('012_116_order', '012_126_customer_discount_used.order_126', '=', '012_116_order.id_116');
    }
}