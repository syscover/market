<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Traits\TraitController;

/**
 * Class PaypalSettingsController
 * @package Syscover\Market\Controllers
 */

class PaypalSettingsController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'marketPaypalSettings';
    protected $folder       = 'paypal_setting';
    protected $package      = 'market';
    protected $aColumns     = [];
    protected $nameM        = null;
    protected $model        = \Syscover\Pulsar\Models\Preference::class;
    protected $icon         = 'fa fa-paypal';
    protected $objectTrans  = 'paypal';

    public function indexCustom($parameters)
    {
        $parameters['marketPayPalDescriptionItemList'] = Preference::getValue('marketPayPalDescriptionItemList', 12);
//
//        $parameters['marketPayPalModes'] = array_map(function($object){
//            $object->name = trans($object->name);
//            return $object;
//        }, config('market.shippingPrices'));
//        $parameters['shippingPricesValue']      = Preference::getValue('marketTaxShippingPrices', 12);

        return $parameters;
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Preference::setValue('marketPayPalDescriptionItemList', 12, $request->input('marketPayPalDescriptionItemList'));
//        Preference::setValue('marketTaxShippingPrices', 12, $request->input('shippingPricesValue'));
    }
}