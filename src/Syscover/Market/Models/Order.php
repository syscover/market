<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

/**
 * Class Order
 *
 * Model with properties
 * <br><b>[id, date, date_text, status, ip, customer, payment_method, 'payment_id', comments, gift, gift_from, gift_to, gift_message, subtotal, shipping, row_discount_amount, total_discount_percentage, total_discount_amount, tax_amount, total, customer_company, customer_tin, customer_name, customer_surname, customer_email, customer_phone, customer_mobile, invoice_country, invoice_territorial_area_1, invoice_territorial_area_2, invoice_territorial_area_3, invoice_cp, invoice_locality, invoice_address, invoice_latitude, invoice_longitude, has_invoice, invoiced, has_shipping, shipping_company, shipping_name, shipping_surname, shipping_email, shipping_phone, shipping_mobile, shipping_country, shipping_territorial_area_1, shipping_territorial_area_2, shipping_territorial_area_3, shipping_cp, shipping_locality, shipping_address, shipping_latitude, shipping_longitude]</b>
 *
 * @package     Syscover\Market\Models
 */

class Order extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_116_order';
    protected $primaryKey   = 'id_116';
    protected $suffix       = '116';
    public $timestamps      = false;
    protected $fillable     = ['id_116', 'date_116', 'date_text_116', 'status_116', 'ip_116', 'customer_116', 'payment_method_116', 'payment_id_116', 'comments_116', 'gift_116', 'gift_from_116', 'gift_to_116', 'gift_message_116', 'subtotal_116', 'shipping_116', 'row_discount_amount_116', 'total_discount_percentage_116', 'total_discount_amount_116', 'tax_amount_116', 'total_116', 'customer_company_116', 'customer_tin_116', 'customer_name_116', 'customer_surname_116', 'customer_email_116', 'customer_phone_116', 'customer_mobile_116', 'invoice_country_116', 'invoice_territorial_area_1_116', 'invoice_territorial_area_2_116', 'invoice_territorial_area_3_116', 'invoice_cp_116', 'invoice_locality_116', 'invoice_address_116', 'invoice_latitude_116', 'invoice_longitude_116', 'has_invoice_116', 'invoiced_116', 'has_shipping_116', 'shipping_company_116', 'shipping_name_116', 'shipping_surname_116', 'shipping_email_116', 'shipping_phone_116', 'shipping_mobile_116', 'shipping_country_116', 'shipping_territorial_area_1_116', 'shipping_territorial_area_2_116', 'shipping_territorial_area_3_116', 'shipping_cp_116', 'shipping_locality_116', 'shipping_address_116', 'shipping_latitude_116', 'shipping_longitude_116'];
    protected $maps         = [];
    protected $relationMaps = [

    ];
    private static $rules   = [
        'name'  => 'required|between:2,50'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        // we not relate to countries, because there are two countries which relate, invoice and shipping, has not been found to create aliases on columns within a join
        return $query->join('012_114_order_status', '012_116_order.status_116', '=', '012_114_order_status.id_114')
            ->join('012_115_payment_method', '012_116_order.payment_method_116', '=', '012_115_payment_method.id_115')
            ->join('009_301_customer', '012_116_order.customer_116', '=', '009_301_customer.id_301');
            /*
            ->join('001_002_country', function ($join) {
                $join->on('012_116_order.invoice_country_116', '=', '001_002_country.id_002')
                    ->on('001_002_country.lang_002', '=', '001_001_lang.id_001');
            })
            ->join('001_002_country', function ($join) {
                $join->on('012_116_order.shipping_country_116', '=', '001_002_country.id_002')
                    ->on('001_002_country.lang_002', '=', '001_001_lang.id_001');
            });
            */

    }

    public function getOrderRows()
    {
        return $this->hasMany('Syscover\Market\Models\OrderRow', 'order_117');
    }
}