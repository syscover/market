<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Market\Models\CustomerClassTax;

/**
 * Class CustomerClassTaxController
 * @package Syscover\Market\Controllers
 */

class CustomerClassTaxController extends Controller
{
    protected $routeSuffix  = 'marketCustomerClassTax';
    protected $folder       = 'customer_class_tax';
    protected $package      = 'market';
    protected $aColumns     = ['id_100', 'name_100'];
    protected $nameM        = 'name_100';
    protected $model        = \Syscover\Market\Models\CustomerClassTax::class;
    protected $icon         = 'fa fa-users';
    protected $objectTrans  = 'customer_class_tax';

    public function storeCustomRecord($parameters)
    {
        CustomerClassTax::create([
            'name_100' => $this->request->input('name')
        ]);
    }

    public function updateCustomRecord($parameters)
    {
        CustomerClassTax::where('id_100', $parameters['id'])->update([
            'name_100' => $this->request->input('name')
        ]);
    }
}

