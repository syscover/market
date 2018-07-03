<?php namespace Syscover\Market\Old\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Market\Old\Models\OrderStatus;
use Syscover\Market\Old\Models\PaymentMethod;

/**
 * Class PaymentMethodController
 * @package Syscover\Market\Controllers
 */

class PaymentMethodController extends Controller
{
    protected $routeSuffix  = 'marketPaymentMethod';
    protected $folder       = 'payment_method';
    protected $package      = 'market';
    protected $indexColumns = ['id_115', 'name_001', 'name_115', 'sorting_115', ['data' => 'active_115', 'type' => 'active']];
    protected $nameM        = 'name_115';
    protected $model        = PaymentMethod::class;
    protected $icon         = 'fa fa-random';
    protected $objectTrans  = 'payment_method';

    public function customIndex($parameters)
    {
        $parameters['urlParameters']['lang'] = base_lang2()->id_001;

        return $parameters;
    }

    public function createCustomRecord($parameters)
    {
        $parameters['orderStatus'] = OrderStatus::builder()
            ->where('lang_id_114', $parameters['lang']->id_001)
            ->where('active_114', true)
            ->get();

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        // check if there is id
        if($this->request->has('id'))
        {
            $id     = $this->request->input('id');
            $idLang = $id;
        }
        else
        {
            $id = PaymentMethod::max('id_115');
            $id++;
            $idLang = null;
        }

        PaymentMethod::create([
            'id_115'                            => $id,
            'lang_id_115'                       => $this->request->input('lang'),
            'name_115'                          => $this->request->input('name'),
            'order_status_successful_id_115'    => $this->request->has('orderStatusSuccessful')? $this->request->input('orderStatusSuccessful') : null,
            'minimum_price_115'                 => $this->request->has('minimumPrice')? $this->request->input('minimumPrice') : null,
            'maximum_price_115'                 => $this->request->has('maximumPrice')? $this->request->input('maximumPrice') : null,
            'instructions_115'                  => $this->request->has('instructions')? $this->request->input('instructions') : null,
            'sorting_115'                       => $this->request->has('sorting')? $this->request->input('sorting') : null,
            'active_115'                        => $this->request->has('active'),
            'data_lang_115'                     => PaymentMethod::addLangDataRecord($this->request->input('lang'), $idLang)
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['orderStatus'] = OrderStatus::builder()
            ->where('lang_id_114', $parameters['object']->lang_id)
            ->where('active_114', true)
            ->get();

        return $parameters;
    }

    public function updateCustomRecord($parameters)
    {
        PaymentMethod::where('id_115', $parameters['id'])->where('lang_id_115', $this->request->input('lang'))->update([
            'name_115'                          => $this->request->input('name'),
            'order_status_successful_id_115'    => $this->request->has('orderStatusSuccessful')? $this->request->input('orderStatusSuccessful') : null,
            'minimum_price_115'                 => $this->request->has('minimumPrice')? $this->request->input('minimumPrice') : null,
            'maximum_price_115'                 => $this->request->has('maximumPrice')? $this->request->input('maximumPrice') : null,
            'instructions_115'                  => $this->request->has('instructions')? $this->request->input('instructions') : null,
            'sorting_115'                       => $this->request->has('sorting')? $this->request->input('sorting') : null,
            'active_115'                        => $this->request->has('active'),
        ]);
    }
}