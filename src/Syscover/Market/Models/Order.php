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
 * <br><b>[id, date, date_text, status_id, ip, data, payment_method_id, payment_id, comments, subtotal, discount_amount, subtotal_with_discounts, tax_amount, shipping_amount, total, has_gift, gift_from, gift_to, gift_message, customer_id, customer_company, customer_tin, customer_name, customer_surname, customer_email, customer_phone, customer_mobile, invoice_country_id, invoice_territorial_area_1_id_, invoice_territorial_area_2_id_, invoice_territorial_area_3_id_, invoice_cp, invoice_locality, invoice_address, invoice_latitude, invoice_longitude, has_invoice, invoiced, has_shipping, shipping_company, shipping_name, shipping_surname, shipping_email, shipping_phone, shipping_mobile, shipping_country_id, shipping_territorial_area_1_id, shipping_territorial_area_2_id, shipping_territorial_area_3_id, shipping_cp, shipping_locality, shipping_address, shipping_latitude, shipping_longitude]</b>
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
    protected $fillable     = ['id_116', 'date_116', 'date_text_116', 'status_id_116', 'ip_116', 'data_116', 'payment_method_id_116', 'payment_id_116', 'comments_116', 'subtotal_116', 'discount_amount_116', 'subtotal_with_discounts_116', 'tax_amount_116', 'shipping_amount_116', 'total_116', 'has_gift_116', 'gift_from_116', 'gift_to_116', 'gift_message_116', 'customer_id_116', 'customer_company_116', 'customer_tin_116', 'customer_name_116', 'customer_surname_116', 'customer_email_116', 'customer_phone_116', 'customer_mobile_116', 'invoice_country_id_116', 'invoice_territorial_area_1_id__116', 'invoice_territorial_area_2_id__116', 'invoice_territorial_area_3_id__116', 'invoice_cp_116', 'invoice_locality_116', 'invoice_address_116', 'invoice_latitude_116', 'invoice_longitude_116', 'has_invoice_116', 'invoiced_116', 'has_shipping_116', 'shipping_company_116', 'shipping_name_116', 'shipping_surname_116', 'shipping_email_116', 'shipping_phone_116', 'shipping_mobile_116', 'shipping_country_id_116', 'shipping_territorial_area_1_id_116', 'shipping_territorial_area_2_id_116', 'shipping_territorial_area_3_id_116', 'shipping_cp_116', 'shipping_locality_116', 'shipping_address_116', 'shipping_latitude_116', 'shipping_longitude_116'];
    protected $maps         = [];
    protected $relationMaps = [
        'status'            => \Syscover\Market\Models\OrderStatus::class,
        'payment_method'    => \Syscover\Market\Models\PaymentMethod::class,
        'customer'          => \Syscover\Crm\Models\Customer::class
    ];
    private static $rules   = [
        'status'            => 'required',
        'paymentMethod'     => 'required',
        'giftFrom'          => 'between:2,255',
        'giftTo'            => 'between:2,255',
        'customerId'        => 'required',
        'customerCompany'   => 'between:2,255',
        'customerTin'       => 'between:2,255',
        'customerName'      => 'between:2,255',
        'customerSurname'   => 'between:2,255',
        'customerEmail'     => 'required|between:2,255|email',
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        // we not relate to countries, because there are two countries which relate, invoice and shipping, has not been found to create aliases on columns within a join
        return $query->join('009_301_customer', '012_116_order.customer_id_116', '=', '009_301_customer.id_301')
            ->join('012_115_payment_method', function ($join) {
                 $join->on('012_116_order.payment_method_id_116', '=', '012_115_payment_method.id_115')
                     ->where('012_115_payment_method.lang_id_115', '=', base_lang()->id_001);
            })
            ->join('012_114_order_status', function ($join) {
                $join->on('012_116_order.status_id_116', '=', '012_114_order_status.id_114')
                    ->where('012_114_order_status.lang_id_114', '=', base_lang()->id_001);
            });

            /*
            ->join('001_002_country', function ($join) {
                $join->on('012_116_order.invoice_country_id_116', '=', '001_002_country.id_002')
                    ->on('001_002_country.lang_id_002', '=', '001_001_lang.id_001');
            })
            ->join('001_002_country', function ($join) {
                $join->on('012_116_order.shipping_country_id_116', '=', '001_002_country.id_002')
                    ->on('001_002_country.lang_id_002', '=', '001_001_lang.id_001');
            });
            */

    }

    public function getOrderRows()
    {
        return $this->hasMany(\Syscover\Market\Models\OrderRow::class, 'order_id_117');
    }

    public function getDiscounts()
    {
        return $this->hasMany(\Syscover\Market\Models\CustomerDiscountHistory::class, 'order_id_126');
    }

    public function getCustomer()
    {
        return $this->belongsTo(\Syscover\Crm\Models\Customer::class, 'customer_id_116');
    }

    public static function setOrderLog($id, $message)
    {
        $order = Order::find($id);

        if($order != null)
        {
            $dataOrder = json_decode($order->data_116, true);

            if(! isset($dataOrder['log']))
                $dataOrder['log'] = [];

            array_unshift($dataOrder['log'], [
                'time'      => date('U'),
                'status'    => $order->status_id_116,
                'message'   => $message
            ]);

            $order->data_116 = json_encode($dataOrder);

            $order->save();
        }
    }
}