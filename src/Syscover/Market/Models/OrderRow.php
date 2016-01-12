<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class OrderRow
 *
 * Model with properties
 * <br><b>[id, lang, order, product, description, discount, price, quantity, subtotal, discount_percentage, discount_amount, tax_amount, gift, gift_from, gift_to, gift_message]</b>
 *
 * @package     Syscover\Market\Models
 */

class OrderRow extends Model
{
    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '012_117_order_row';
    protected $primaryKey   = 'id_117';
    protected $suffix       = '117';
    public $timestamps      = false;
    protected $fillable     = ['id_117', 'lang_117', 'order_117', 'product_117', 'description_117', 'discount_117', 'price_117', 'quantity_117', 'subtotal_117', 'discount_percentage_117', 'discount_amount_117', 'tax_amount_117', 'gift_117', 'gift_from_117', 'gift_to_117', 'gift_message_117'];
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

    public function scopeBuilder($query)
    {
        return $query->leftJoin('012_111_product', '012_117_order_row.product_117', '=', '012_111_product.id_111');
    }

    protected static function addToGetIndexRecords($parameters)
    {
        return OrderRow::builder();
    }
}