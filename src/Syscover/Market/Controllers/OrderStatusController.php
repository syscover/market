<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Market\Models\OrderStatus;

/**
 * Class OrderStatusController
 * @package Syscover\Market\Controllers
 */

class OrderStatusController extends Controller
{
    protected $routeSuffix  = 'marketOrderStatus';
    protected $folder       = 'order_status';
    protected $package      = 'market';
    protected $aColumns     = ['id_114', 'name_001', 'name_114', ['data' => 'active_114', 'type' => 'active']];
    protected $nameM        = 'name_114';
    protected $model        = OrderStatus::class;
    protected $icon         = 'fa fa-refresh';
    protected $objectTrans  = 'order_status';

    public function customIndex($parameters)
    {
        $parameters['urlParameters']['lang'] = session('baseLang')->id_001;

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
            $id = OrderStatus::max('id_114');
            $id++;
            $idLang = null;
        }

        OrderStatus::create([
            'id_114'                => $id,
            'lang_id_114'           => $this->request->input('lang'),
            'name_114'              => $this->request->input('name'),
            'active_114'            => $this->request->has('active'),
            'data_lang_114'         => OrderStatus::addLangDataRecord($this->request->input('lang'), $idLang)
        ]);
    }

    public function updateCustomRecord($parameters)
    {
        OrderStatus::where('id_114', $parameters['id'])->where('lang_id_114', $this->request->input('lang'))->update([
            'name_114'              => $this->request->input('name'),
            'active_114'            => $this->request->has('active'),
        ]);
    }
}