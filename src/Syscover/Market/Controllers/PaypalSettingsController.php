<?php namespace Syscover\Market\Controllers;

use Illuminate\Support\Facades\Crypt;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Traits\TraitController;

/**
 * Class PaypalSettingsController
 * @package Syscover\Market\Controllers
 */

class PayPalSettingsController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'marketPayPalSettings';
    protected $folder       = 'paypal_setting';
    protected $package      = 'market';
    protected $aColumns     = [];
    protected $nameM        = null;
    protected $model        = \Syscover\Pulsar\Models\Preference::class;
    protected $icon         = 'fa fa-paypal';
    protected $objectTrans  = 'paypal';

    public function customIndex($parameters)
    {
        $preferences = Preference::getValues(12);

        $parameters['marketPayPalDescriptionItemList']  = isset($preferences->where('id_018', 'marketPayPalDescriptionItemList')->first()->value_018)? $preferences->where('id_018', 'marketPayPalDescriptionItemList')->first()->value_018 : null;
        $parameters['marketPayPalSuccessRoute']         = isset($preferences->where('id_018', 'marketPayPalSuccessRoute')->first()->value_018)? $preferences->where('id_018', 'marketPayPalSuccessRoute')->first()->value_018 : null;
        $parameters['marketPayPalErrorRoute']           = isset($preferences->where('id_018', 'marketPayPalErrorRoute')->first()->value_018)? $preferences->where('id_018', 'marketPayPalErrorRoute')->first()->value_018 : null;
        $parameters['marketPayPalShippingDescription']  = isset($preferences->where('id_018', 'marketPayPalShippingDescription')->first()->value_018)? $preferences->where('id_018', 'marketPayPalShippingDescription')->first()->value_018 : null;

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Preference::setValue('marketPayPalDescriptionItemList', 12, $this->request->input('marketPayPalDescriptionItemList'));
        Preference::setValue('marketPayPalSuccessRoute', 12, $this->request->input('marketPayPalSuccessRoute'));
        Preference::setValue('marketPayPalErrorRoute', 12, $this->request->input('marketPayPalErrorRoute'));
        Preference::setValue('marketPayPalShippingDescription', 12, $this->request->input('marketPayPalShippingDescription'));
    }
}