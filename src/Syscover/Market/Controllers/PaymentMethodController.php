<?php namespace Syscover\Market\Controllers;

use Syscover\Market\Models\OrderStatus;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Market\Models\PaymentMethod;

/**
 * Class PaymentMethodController
 * @package Syscover\Market\Controllers
 */

class PaymentMethodController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'marketPaymentMethod';
    protected $folder       = 'payment_method';
    protected $package      = 'market';
    protected $aColumns     = ['id_115', 'name_001', 'name_115', 'sorting_115', ['data' => 'active_115', 'type' => 'active']];
    protected $nameM        = 'name_115';
    protected $model        = '\Syscover\Market\Models\PaymentMethod';
    protected $icon         = 'fa fa-random';
    protected $objectTrans  = 'payment_method';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang'] = session('baseLang');

        return $parameters;
    }

    public function createCustomRecord($request, $parameters)
    {
        $parameters['orderStatus'] = OrderStatus::builder()->where('lang_114', $parameters['lang'])->where('active_114', true)->get();

        return $parameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        // check if there is id
        if($request->has('id'))
        {
            $id     = $request->input('id');
            $idLang = $id;
        }
        else
        {
            $id = PaymentMethod::max('id_115');
            $id++;
            $idLang = null;
        }

        PaymentMethod::create([
            'id_115'                => $id,
            'lang_115'              => $request->input('lang'),
            'name_115'              => $request->input('name'),
            'order_status_115'      => empty($request->input('orderStatus'))? null : $request->input('orderStatus'),
            'minimum_price_115'     => empty($request->input('minimumPrice'))? null : $request->input('minimumPrice'),
            'maximum_price_115'     => empty($request->input('maximumPrice'))? null : $request->input('maximumPrice'),
            'instructions_115'      => empty($request->input('instructions'))? null : $request->input('instructions'),
            'sorting_115'           => empty($request->input('sorting'))? null : $request->input('sorting'),
            'active_115'            => $request->has('active'),
            'data_lang_115'         => PaymentMethod::addLangDataRecord($request->input('lang'), $idLang)
        ]);
    }

    public function editCustomRecord($request, $parameters)
    {
        $parameters['orderStatus'] = OrderStatus::builder()->where('lang_114', $parameters['object']->lang_id)->where('active_114', true)->get();

        return $parameters;
    }

    public function updateCustomRecord($request, $parameters)
    {
        PaymentMethod::where('id_115', $parameters['id'])->where('lang_115', $request->input('lang'))->update([
            'name_115'              => $request->input('name'),
            'order_status_115'      => empty($request->input('orderStatus'))? null : $request->input('orderStatus'),
            'minimum_price_115'     => empty($request->input('minimumPrice'))? null : $request->input('minimumPrice'),
            'maximum_price_115'     => empty($request->input('maximumPrice'))? null : $request->input('maximumPrice'),
            'instructions_115'      => empty($request->input('instructions'))? null : $request->input('instructions'),
            'sorting_115'           => empty($request->input('sorting'))? null : $request->input('sorting'),
            'active_115'            => $request->has('active'),
        ]);
    }
}