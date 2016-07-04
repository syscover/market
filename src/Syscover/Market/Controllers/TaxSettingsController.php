<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Http\Request;
use Syscover\Pulsar\Models\Preference;

/**
 * Class TaxSettingsController
 * @package Syscover\Market\Controllers
 */

class TaxSettingsController extends Controller
{
    protected $routeSuffix  = 'marketTaxSettings';
    protected $folder       = 'tax_setting';
    protected $package      = 'market';
    protected $aColumns     = [];
    protected $nameM        = null;
    protected $model        = Preference::class;
    protected $icon         = 'fa fa-cog';
    protected $objectTrans  = 'setting';

    function __construct(Request $request)
    {
        parent::__construct($request);

        $this->viewParameters['cancelButton'] = false;
    }

    public function customIndex($parameters)
    {
        $parameters['productPrices']       = array_map(function($object){
            $object->name = trans($object->name);
            return $object;
        }, config('market.productPrices'));
        $parameters['productPricesValue']      = Preference::getValue('marketTaxProductPrices', 12);

        $parameters['shippingPrices']       = array_map(function($object){
            $object->name = trans($object->name);
            return $object;
        }, config('market.shippingPrices'));
        $parameters['shippingPricesValue']      = Preference::getValue('marketTaxShippingPrices', 12);

//        $parameters['shippingPrices']       = array_map(function($object){
//            $object->name = trans($object->name);
//            return $object;
//        }, config('market.shippingPrices'));
//        $parameters['shippingPricesValue']      = Preference::getValue('marketTaxShippingPrices', 12);

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Preference::setValue('marketTaxProductPrices', 12, $this->request->input('productPricesValue'));
        Preference::setValue('marketTaxShippingPrices', 12, $this->request->input('shippingPricesValue'));
    }
}