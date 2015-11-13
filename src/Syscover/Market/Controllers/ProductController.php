<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;

class ProductController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'MarketProduct';
    protected $folder       = 'products';
    protected $package      = 'market';
    protected $aColumns     = ['id_111', 'name_112', 'active_111'];
    protected $nameM        = 'name_112';
    protected $model        = '\Syscover\Market\Models\Product';
    protected $icon         = 'fa fa-cube';
    protected $objectTrans  = 'product';

    public function storeCustomRecord($request, $parameters)
    {
       /*
        Product::create([
            'id_200'    => Request::input('id'),
            'name_200'  => Request::input('name')
        ]);
       */
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        /*
        Categoria::where('id_200', $parameters['id'])->update([
            'id_200'    => Request::input('id'),
            'name_200'  => Request::input('name')
        ]);
        */
    }
}