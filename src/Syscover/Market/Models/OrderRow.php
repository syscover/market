<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class OrderRow
 *
 * Model with properties
 * <br><b>[id, lang_id, order_id, product_id, name, description, data, price, quantity, subtotal, total_without_discounts, discount_subtotal_percentage, discount_total_percentage, discount_subtotal_percentage_amount, discount_total_percentage_amount, discount_subtotal_fixed_amount, discount_total_fixed_amount, discount_amount, tax_rules, tax_amount, has_gift, gift_from, gift_to, gift_message]</b>
 *
 * @package     Syscover\Market\Models
 */

class OrderRow extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_117_order_row';
    protected $primaryKey   = 'id_117';
    protected $suffix       = '117';
    public $timestamps      = false;
    protected $fillable     = ['id_117', 'lang_id_117', 'order_id_117', 'product_id_117', 'name_117', 'description_117', 'data_117', 'price_117', 'quantity_117', 'subtotal_117', 'total_without_discounts_117', 'discount_subtotal_percentage_117', 'discount_total_percentage_117', 'discount_subtotal_percentage_amount_117', 'discount_total_percentage_amount_117', 'discount_subtotal_fixed_amount_117', 'discount_total_fixed_amount_117', 'discount_amount_117', 'tax_rules_117', 'tax_amount_117', 'has_gift_117', 'gift_from_117', 'gift_to_117', 'gift_message_117'];
    protected $maps         = [];
    protected $relationMaps = [
        'lang'      => \Syscover\Pulsar\Models\Lang::class,
        'order'     => \Syscover\Market\Models\Order::class,
        'product'   => \Syscover\Market\Models\Product::class
    ];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query, $lang = null)
    {
        return $query->leftJoin('012_111_product', '012_117_order_row.product_id_117', '=', '012_111_product.id_111')
            ->leftJoin('012_112_product_lang', function($join) use ($lang) {
                $join->on('012_111_product.id_111', '=', '012_112_product_lang.id_112');
                if($lang !== null)  $join->where('012_112_product_lang.lang_id_112', '=', $lang);
            });
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        return $this->builder()
            ->where('order_id_117', $parameters['ref']);
    }

    public function customCount($request, $parameters)
    {
        return $this->builder()
            ->where('order_id_117', $parameters['ref']);
    }

    /**
     * Get price amount formated
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  float
     */
    public function getPrice($decimals = 2, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->price_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format quantity over this cart item
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getQuantity($decimals = 0, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->quantity_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get subtotal
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getSubtotal($decimals = 2, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->subtotal_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format total without dicounts
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getTotalWithoutDiscounts($decimals = 2, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->total_without_discounts_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format discount subtotal percentage
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getDiscountSubtotalPercentage($decimals = 0, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->discount_subtotal_percentage_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format discount total percentage
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getDiscountTotalPercentage($decimals = 0, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->discount_total_percentage_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format discount subtotal percentage amount
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getDiscountSubtotalPercentageAmount($decimals = 2, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->discount_subtotal_percentage_amount_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format discount total percentage amount
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getDiscountTotalPercentageAmount($decimals = 2, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->discount_total_percentage_amount_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format discount subtotal fixed amount
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getDiscountSubtotalFixedAmount($decimals = 2, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->discount_subtotal_fixed_amount_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format discount total fixed amount
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getDiscountTotalFixedAmount($decimals = 2, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->discount_total_fixed_amount_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format discount amount
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getDiscountAmount($decimals = 2, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->discount_amount_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format subtotal with discounts amount
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getSubtotalWithDiscounts($decimals = 2, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->subtotal_with_discounts_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format tax amount
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getTaxAmount($decimals = 2, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->tax_amount_117, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get format total
     *
     * @param   int     $decimals
     * @param   string  $decimalPoint
     * @param   string  $thousandSeparator
     * @return  string
     */
    public function getTotal($decimals = 2, $decimalPoint = ',', $thousandSeparator = '.')
    {
        return number_format($this->total_117, $decimals, $decimalPoint, $thousandSeparator);
    }
}