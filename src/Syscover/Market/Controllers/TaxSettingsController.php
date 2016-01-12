<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Traits\TraitController;

/**
 * Class TaxSettingsController
 * @package Syscover\Market\Controllers
 */

class TaxSettingsController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'marketTaxSettings';
    protected $folder       = 'tax_setting';
    protected $package      = 'market';
    protected $aColumns     = [];
    protected $nameM        = null;
    protected $model        = \Syscover\Pulsar\Models\Preference::class;
    protected $icon         = 'fa fa-cog';
    protected $objectTrans  = 'setting';

    public function indexCustom($parameters)
    {
        $parameters['productPrices']       = array_map(function($object){
            $object->name = trans($object->name);
            return $object;
        }, config('market.productPrices'));
        $parameters['productPricesValue']      = Preference::getValue('marketTaxProductPrices', 9);

        $parameters['shippingPrices']       = array_map(function($object){
            $object->name = trans($object->name);
            return $object;
        }, config('market.shippingPrices'));
        $parameters['shippingPricesValue']      = Preference::getValue('marketTaxShippingPrices', 9);

        return $parameters;
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Preference::setValue('marketTaxProductPrices', 9, $request->input('productPricesValue'));
        Preference::setValue('marketTaxShippingPrices', 9, $request->input('shippingPricesValue'));
    }
}