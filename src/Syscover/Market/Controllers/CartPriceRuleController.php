<?php namespace Syscover\Market\Controllers;

use Illuminate\Http\Request;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Libraries\Miscellaneous;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Market\Models\CartPriceRule;
use Syscover\Pulsar\Models\Text;

class CartPriceRuleController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'cartPriceRule';
    protected $folder       = 'cart_price_rule';
    protected $package      = 'market';
    protected $aColumns     = ['id_120', 'text_017', 'coupon_code_120', 'enable_from_text_120', 'enable_to_text_120', 'total_used_120', ['data' => 'active_120', 'type' => 'active']];
    protected $nameM        = 'name_110';
    protected $model        = CartPriceRule::class;
    protected $icon         = 'fa fa-shopping-cart';
    protected $objectTrans  = 'cart_price_rule';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang')->id_001;

        return $parameters;
    }

    public function createCustomRecord($request, $parameters)
    {
        $parameters['discountTypes'] = array_map(function($object) {
            $object->name = trans($object->name);
            return $object;
        }, config('market.discountTypes'));

        return $parameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        // check if there is id
        if($request->has('id'))
        {
            // en el caso de que exista un ID, lo recogemos para crear el JSON dentro del campo data_lang_120
            $idLang         = $request->input('id');

            // recogemos los datos de los TEXT IDs del objeto del idioma base
            $idName         = $request->input('idName');
            $idDescription  = $request->input('idDescription');
        }
        else
        {
            $id     = Text::max('id_017');
            $idLang = null;

            // obtenemos los siguientes IDs a introducir
            $id++;
            $idName         = $id;
            $id++;
            $idDescription  = $id;
        }

        if(!$request->has('id'))
        {
            CartPriceRule::create([
                'name_text_120' => $idName,
                'description_text_120' => $idDescription,
                'active_120' => $request->has('active'),
                'has_coupon_120' => $request->has('hasCoupon'),
                'coupon_code_120' => $request->has('couponCode') ? $request->input('couponCode') : null,
                'combinable_120' => $request->has('combinable'),
                'uses_coupon_120' => $request->has('usesCoupon') ? $request->input('usesCoupon') : null,
                'uses_customer_120' => $request->has('usesCustomer') ? $request->input('usesCustomer') : null,
                'total_used_120' => 0,
                'enable_from_120' => $request->has('enableFrom') ? \DateTime::createFromFormat(config('pulsar.datePattern') . ' H:i', $request->input('enableFrom'))->getTimestamp() : (integer)date('U'),
                'enable_from_text_120' => $request->has('enableFrom') ? $request->input('enableFrom') : date(config('pulsar.datePattern') . ' H:i'),
                'enable_to_120' => $request->has('enableTo') ? \DateTime::createFromFormat(config('pulsar.datePattern') . ' H:i', $request->input('enableTo'))->getTimestamp() : (integer)date('U'),
                'enable_to_text_120' => $request->has('enableTo') ? $request->input('enableTo') : null,
                'discount_type_120' => $request->has('discountType') ? $request->input('discountType') : null,
                'discount_amount_120' => $request->has('discountAmount') ? $request->input('discountAmount') : null,
                'discount_percentage_120' => $request->has('discountPercentage') ? $request->input('discountPercentage') : null,
                'maximum_discount_amount_120' => $request->has('maximumDiscountAmount') ? $request->input('maximumDiscountAmount') : null,
                'apply_shipping_amount_120' => $request->has('applyShippingAmount'),
                'free_shipping_120' => $request->has('freeShipping'),
                'rules_120' => null,
                'data_lang_120' => CartPriceRule::addLangDataRecord($request->input('lang'), $idLang)
            ]);
        }
        else
        {
            // update json lang, to know any languages has this record
            CartPriceRule::where('id_120', $request->input('id'))->update([
                'data_lang_120' => CartPriceRule::addLangDataRecord($request->input('lang'), $idLang)
            ]);
        }

        Text::create([
            'id_017'    => $idName,
            'lang_017'  => $request->input('lang'),
            'text_017'  => $request->has('name')? $request->input('name') : null,
        ]);

        Text::create([
            'id_017'    => $idDescription,
            'lang_017'  => $request->input('lang'),
            'text_017'  => $request->has('description')? $request->input('description') : null,
        ]);
    }

    public function editCustomRecord($request, $parameters)
    {
        $parameters['discountTypes'] = array_map(function($object) {
            $object->name = trans($object->name);
            return $object;
        }, config('market.discountTypes'));

        return $parameters;
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        CartPriceRule::where('id_120', $parameters['id'])->update([
            'active_120'                    => $request->has('active'),
            'has_coupon_120'                => $request->has('hasCoupon'),
            'coupon_code_120'               => $request->has('couponCode')? $request->input('couponCode') : null,
            'combinable_120'                => $request->has('combinable'),
            'uses_coupon_120'               => $request->has('usesCoupon')? $request->input('usesCoupon') : null,
            'uses_customer_120'             => $request->has('usesCustomer')? $request->input('usesCustomer') : null,
            'enable_from_120'               => $request->has('enableFrom')? \DateTime::createFromFormat(config('pulsar.datePattern') . ' H:i', $request->input('enableFrom'))->getTimestamp() : (integer)date('U'),
            'enable_from_text_120'          => $request->has('enableFrom')? $request->input('enableFrom') : date(config('pulsar.datePattern') . ' H:i'),
            'enable_to_120'                 => $request->has('enableTo')? \DateTime::createFromFormat(config('pulsar.datePattern') . ' H:i', $request->input('enableTo'))->getTimestamp() : (integer)date('U'),
            'enable_to_text_120'            => $request->has('enableTo')? $request->input('enableTo') : null,
            'discount_type_120'             => $request->has('discountType')? $request->input('discountType') : null,
            'discount_amount_120'           => $request->has('discountAmount')? $request->input('discountAmount') : null,
            'discount_percentage_120'       => $request->has('discountPercentage')? $request->input('discountPercentage') : null,
            'maximum_discount_amount_120'   => $request->has('maximumDiscountAmount')? $request->input('maximumDiscountAmount') : null,
            'apply_shipping_amount_120'     => $request->has('applyShippingAmount'),
            'free_shipping_120'             => $request->has('freeShipping'),
            //'rules_120'                     => null
        ]);

        Text::where('id_017', $request->input('idName'))->where('lang_017', $request->input('lang'))->update([
            'text_017'  => $request->has('name')? $request->input('name') : null,
        ]);

        Text::where('id_017', $request->input('idDescription'))->where('lang_017', $request->input('lang'))->update([
            'text_017'  => $request->has('description')? $request->input('description') : null,
        ]);
    }

    public function deleteCustomRecord($request, $object)
    {
        // delete texts
        Text::where('id_017', $object->name_text_120)->delete();
        Text::where('id_017', $object->description_text_120)->delete();
    }

    public function deleteCustomTranslationRecord($request, $object)
    {
        $parameters = $request->route()->parameters();

        // delete texts
        Text::where('id_017', $object->name_text_120)->where('lang_017', $parameters['lang'])->delete();
        Text::where('id_017', $object->description_text_120)->where('lang_017', $parameters['lang'])->delete();
    }

    public function deleteCustomRecordsSelect($request, $ids)
    {
        $cartPriceRules = CartPriceRule::getRecordsById($ids);

        foreach($cartPriceRules as $cartPriceRule)
        {
            // delete texts
            Text::where('id_017', $cartPriceRule->name_text_120)->delete();
            Text::where('id_017', $cartPriceRule->description_text_120)->delete();
        }
    }

    public function apiGetCouponCode(Request $request)
    {
        $couponCode = Miscellaneous::generateRandomString((int)$request->input('length'), 'uppercase-number');

        while(CartPriceRule::where('coupon_code_120', $couponCode)->count() > 0)
        {
            $couponCode = Miscellaneous::generateRandomString((int)$request->input('length'), 'uppercase-number');
        }

        return response()->json([
            'status'        => 'success',
            'couponCode'    => $couponCode
        ]);
    }
}