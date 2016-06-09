<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Market\Models\ProductClassTax;

/**
 * Class ProductClassTaxController
 * @package Syscover\Market\Controllers
 */

class ProductClassTaxController extends Controller
{
    protected $routeSuffix  = 'marketProductClassTax';
    protected $folder       = 'product_class_tax';
    protected $package      = 'market';
    protected $aColumns     = ['id_101', 'name_101'];
    protected $nameM        = 'name_101';
    protected $model        = ProductClassTax::class;
    protected $icon         = 'fa fa-cubes';
    protected $objectTrans  = 'product_class_tax';

    public function storeCustomRecord($parameters)
    {
        ProductClassTax::create([
            'name_101' => $this->request->input('name')
        ]);
    }

    public function updateCustomRecord($parameters)
    {
        ProductClassTax::where('id_101', $parameters['id'])->update([
            'name_101' => $this->request->input('name')
        ]);
    }
}

