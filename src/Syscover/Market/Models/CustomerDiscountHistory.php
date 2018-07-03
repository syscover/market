<?php namespace Syscover\Market\Old\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class CustomerDiscountHistory
 *
 * Model with properties
 * <br><b>[id, date, customer_id, order_id, rule_family_id, has_coupon, coupon_code, rule_id, discount, name_text_id, description_text_id, name_text_value, description_text_value, discount_type_id, discount_amount, discount_percentage, maximum_discount_amount, apply_shipping_amount, free_shipping, rules]</b>
 *
 * @package     Syscover\Market\Models
 */

class CustomerDiscountHistory extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_126_customer_discount_history';
    protected $primaryKey   = 'id_126';
    protected $suffix       = '126';
    public $timestamps      = false;
    protected $fillable     = ['id_126', 'date_126', 'customer_id_126', 'order_id_126', 'rule_family_id_126', 'has_coupon_126', 'coupon_code_126', 'rule_id_126', 'discount_126', 'name_text_id_126', 'description_text_id_126', 'name_text_value_126', 'description_text_value_126', 'discount_type_id_126', 'discount_fixed_amount_126', 'discount_percentage_126', 'maximum_discount_amount_126', 'apply_shipping_amount_126', 'free_shipping_126', 'rules_126'];
    protected $maps         = [];
    protected $relationMaps = [
        'customer'  => \Syscover\Crm\Old\Models\Customer::class,
        'order'     => \Syscover\Market\Old\Models\Order::class
    ];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('009_301_customer', '012_126_customer_discount_history.customer_id_126', '=', '009_301_customer.id_301')
            ->join('012_116_order', '012_126_customer_discount_history.order_id_126', '=', '012_116_order.id_116');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        return $this->builder()
            ->where('order_id_126', $parameters['ref']);
    }

    public function customCount($request, $parameters)
    {
        return $this->builder()
            ->where('order_id_126', $parameters['ref']);
    }
}