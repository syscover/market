<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\DB;

/**
 * Class CartPriceRule
 *
 * Model with properties
 * <br><b>[id, name_text, description_text, status, has_coupon, coupon_code, combinable, uses_coupon, uses_customer, total_used, enable_from, enable_to, apply, discount_amount, discount_percentage, maximum_discount_amount, apply_shipping_amount, free_shipping, rules]</b>
 *
 * @package     Syscover\Market\Models
 */

class CartPriceRule extends Model
{
    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '012_120_cart_price_rule';
    protected $primaryKey   = 'id_120';
    protected $suffix       = '120';
    public $timestamps      = false;
    protected $fillable     = ['id_120', 'name_text_120', 'description_text_120', 'status_120', 'has_coupon_120', 'coupon_code_120', 'combinable_120', 'uses_coupon_120', 'uses_customer_120', 'total_used_120', 'enable_from_120', 'enable_to_120', 'apply_120', 'discount_amount_120', 'discount_percentage_120', 'maximum_discount_amount_120', 'apply_shipping_amount_120', 'free_shipping_120', 'rules_120'];
    protected $maps         = [];
    protected $relationMaps = [
        //'lang'          => \Syscover\Pulsar\Models\Lang::class,
        //'product_lang'  => \Syscover\Market\Models\ProductLang::class
    ];
    private static $rules   = [
        'name'          => 'required',
        'productType'   => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query;
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_112');
    }

    public function getCategories()
    {
        return $this->belongsToMany('Syscover\Market\Models\Category', '012_113_products_categories', 'product_113', 'category_113');
    }

    public static function addToGetIndexRecords($parameters)
    {
        $query =  CartPriceRule::builder();

        //if(isset($parameters['lang'])) $query->where('lang_112', $parameters['lang']);

        return $query;
    }
}