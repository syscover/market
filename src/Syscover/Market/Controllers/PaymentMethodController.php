<?php namespace Syscover\Market\Controllers;

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
    protected $aColumns     = ['id_114', 'name_001', 'name_114', 'sorting_114', ['data' => 'active_114', 'type' => 'active']];
    protected $nameM        = 'name_114';
    protected $model        = '\Syscover\Market\Models\PaymentMethod';
    protected $icon         = 'fa fa-credit-card';
    protected $objectTrans  = 'payment_method';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang'] = session('baseLang');

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
            $id = PaymentMethod::max('id_114');
            $id++;
            $idLang = null;
        }

        PaymentMethod::create([
            'id_114'                => $id,
            'lang_114'              => $request->input('lang'),
            'name_114'              => $request->input('name'),
            'minimum_price_114'     => empty($request->has('minimumPrice'))? null : $request->input('minimumPrice'),
            'maximum_price_114'     => empty($request->has('maximumPrice'))? null : $request->input('maximumPrice'),
            'instructions_114'      => empty($request->has('instructions'))? null : $request->input('instructions'),
            'sorting_114'           => empty($request->has('sorting'))? null : $request->input('sorting'),
            'active_114'            => $request->has('active'),
            'data_lang_114'         => PaymentMethod::addLangDataRecord($request->input('lang'), $idLang)
        ]);
    }

    public function updateCustomRecord($request, $parameters)
    {
        PaymentMethod::where('id_114', $parameters['id'])->where('lang_114', $request->input('lang'))->update([
            'name_114'              => $request->input('name'),
            'minimum_price_114'     => empty($request->has('minimumPrice'))? null : $request->input('minimumPrice'),
            'maximum_price_114'     => empty($request->has('maximumPrice'))? null : $request->input('maximumPrice'),
            'instructions_114'      => empty($request->has('instructions'))? null : $request->input('instructions'),
            'sorting_114'           => empty($request->has('sorting'))? null : $request->input('sorting'),
            'active_114'            => $request->has('active'),
        ]);
    }
}