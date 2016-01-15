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

    public function indexCustom($parameters)
    {
        $preferences = Preference::getValues(12);

        $parameters['payPalModes']                      = config('market.payPalModes');
        $parameters['marketPayPalMode']                 = isset($preferences->where('id_018', 'marketPayPalMode')->first()->value_018)? $preferences->where('id_018', 'marketPayPalMode')->first()->value_018 : null;

        $parameters['marketPayPalDescriptionItemList']  = isset($preferences->where('id_018', 'marketPayPalDescriptionItemList')->first()->value_018)? $preferences->where('id_018', 'marketPayPalDescriptionItemList')->first()->value_018 : null;
        $parameters['marketPayPalSuccessRoute']         = isset($preferences->where('id_018', 'marketPayPalSuccessRoute')->first()->value_018)? $preferences->where('id_018', 'marketPayPalSuccessRoute')->first()->value_018 : null;
        $parameters['marketPayPalErrorRoute']           = isset($preferences->where('id_018', 'marketPayPalErrorRoute')->first()->value_018)? $preferences->where('id_018', 'marketPayPalErrorRoute')->first()->value_018 : null;


        $parameters['marketPayPalSandboxWebProfile']    = isset($preferences->where('id_018', 'marketPayPalSandboxWebProfile')->first()->value_018)? $preferences->where('id_018', 'marketPayPalSandboxWebProfile')->first()->value_018 : null;
        $parameters['marketPayPalSandboxClientID']      = isset($preferences->where('id_018', 'marketPayPalSandboxClientID')->first()->value_018)? Crypt::decrypt($preferences->where('id_018', 'marketPayPalSandboxClientID')->first()->value_018) : null;
        $parameters['marketPayPalSandboxSecret']        = isset($preferences->where('id_018', 'marketPayPalSandboxSecret')->first()->value_018)? Crypt::decrypt($preferences->where('id_018', 'marketPayPalSandboxSecret')->first()->value_018) : null;

        $parameters['marketPayPalLiveWebProfile']       = isset($preferences->where('id_018', 'marketPayPalLiveWebProfile')->first()->value_018)? $preferences->where('id_018', 'marketPayPalLiveWebProfile')->first()->value_018 : null;
        $parameters['marketPayPalLiveClientID']         = isset($preferences->where('id_018', 'marketPayPalLiveClientID')->first()->value_018)? Crypt::decrypt($preferences->where('id_018', 'marketPayPalLiveClientID')->first()->value_018) : null;
        $parameters['marketPayPalLiveSecret']           = isset($preferences->where('id_018', 'marketPayPalLiveSecret')->first()->value_018)? Crypt::decrypt($preferences->where('id_018', 'marketPayPalLiveSecret')->first()->value_018) : null;

        return $parameters;
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Preference::setValue('marketPayPalMode', 12, $request->input('marketPayPalMode'));

        Preference::setValue('marketPayPalDescriptionItemList', 12, $request->input('marketPayPalDescriptionItemList'));
        Preference::setValue('marketPayPalSuccessRoute', 12, $request->input('marketPayPalSuccessRoute'));
        Preference::setValue('marketPayPalErrorRoute', 12, $request->input('marketPayPalErrorRoute'));

        Preference::setValue('marketPayPalSandboxWebProfile', 12, $request->input('marketPayPalSandboxWebProfile'));
        Preference::setValue('marketPayPalSandboxClientID', 12, Crypt::encrypt($request->input('marketPayPalSandboxClientID')));
        Preference::setValue('marketPayPalSandboxSecret', 12, Crypt::encrypt($request->input('marketPayPalSandboxSecret')));

        Preference::setValue('marketPayPalLiveWebProfile', 12, $request->input('marketPayPalLiveWebProfile'));
        Preference::setValue('marketPayPalLiveClientID', 12, Crypt::encrypt($request->input('marketPayPalLiveClientID')));
        Preference::setValue('marketPayPalLiveSecret', 12, Crypt::encrypt($request->input('marketPayPalLiveSecret')));
    }
}