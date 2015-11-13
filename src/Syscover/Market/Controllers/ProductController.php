<?php namespace Syscover\Market\Controllers;


use Syscover\Pulsar\Libraries\AttachmentLibrary;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\AttachmentFamily;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Market\Models\Product;
use Syscover\Market\Models\ProductLang;

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

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang');
        // init record on tap 1
        $parameters['urlParameters']['tab']     = 3;

        return $parameters;
    }

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        $actionUrlParameters['tab'] = 3;

        return $actionUrlParameters;
    }

    public function createCustomRecord($request, $parameters)
    {
        $parameters['attachmentFamilies']   = AttachmentFamily::getAttachmentFamilies(['resource_015' => 'market-product']);
        $parameters['attachmentsInput']     = json_encode([]);

        return $parameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        $product = Product::create([
            'active_111'    => $request->input('active', false)
        ]);

        ProductLang::create([
            'id_112'        => $product->id_111,
            'lang_112'      => $request->input('lang'),
            'name_112'      => $request->input('name')
        ]);

        // set attachments
        $attachments = json_decode($request->input('attachments'));

        AttachmentLibrary::storeAttachments($attachments, 'market', 'market-product', $product->id_111, $request->input('lang'));
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