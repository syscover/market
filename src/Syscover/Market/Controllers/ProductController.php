<?php namespace Syscover\Market\Controllers;

use Illuminate\Http\Request;
use Syscover\Pulsar\Libraries\AttachmentLibrary;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\AttachmentFamily;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Market\Models\Product;
use Syscover\Market\Models\ProductLang;

class ProductController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'marketProduct';
    protected $folder       = 'products';
    protected $package      = 'market';
    protected $aColumns     = ['id_111', 'name_112', ['data' => 'active_111', 'type' => 'active']];
    protected $nameM        = 'name_112';
    protected $model        = '\Syscover\Market\Models\Product';
    protected $langModel    = '\Syscover\Market\Models\ProductLang';
    protected $icon         = 'fa fa-cube';
    protected $objectTrans  = 'product';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang');
        // init record on tap 3
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

        if(isset($parameters['id']))
        {
            // get attachments from base lang
            $attachments = AttachmentLibrary::getRecords($this->package, 'market-product', $parameters['id'], session('baseLang')->id_001, true);

            // merge parameters and attachments array
            $parameters  = array_merge($parameters, $attachments);
        }

        return $parameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        if(!$request->has('id'))
        {
            // create new product
            $product = Product::create([
                'active_111' => $request->input('active', false)
            ]);

            $id     = $product->id_111;
            $idLang = null;
        }
        else
        {
            // create product language
            $id     = $request->input('id');
            $idLang = $id;
        }

        Product::where('id_111', $id)->update([
            'data_lang_111' => Product::addLangDataRecord($request->input('lang'), $idLang)
        ]);

        ProductLang::create([
            'id_112'        => $id,
            'lang_112'      => $request->input('lang'),
            'name_112'      => $request->input('name'),
            'slug_112'      => $request->input('slug'),
        ]);

        // set attachments
        $attachments = json_decode($request->input('attachments'));

        AttachmentLibrary::storeAttachments($attachments, $this->package, 'market-product', $id, $request->input('lang'));
    }

    public function editCustomRecord($request, $parameters)
    {
        // get attachments elements
        $attachments = AttachmentLibrary::getRecords($this->package, 'market-product', $parameters['object']->id_111, $parameters['lang']->id_001);

        $parameters['attachmentFamilies']   = AttachmentFamily::getAttachmentFamilies(['resource_015' => 'market-product']);
        $parameters                         = array_merge($parameters, $attachments);

        return $parameters;
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Product::where('id_111', $parameters['id'])->update([
            'active_111'    => $request->input('active', false),
        ]);

        ProductLang::where('id_112', $parameters['id'])->where('lang_112', $request->input('lang'))->update([
            'name_112'      => $request->input('name'),
            'slug_112'      => $request->input('slug'),
        ]);
    }

    public function addToDeleteRecord($request, $object)
    {
        // delete all attachments
        AttachmentLibrary::deleteAttachment($this->package, $request->route()->getAction()['resource'], $object->id_111);
    }

    public function addToDeleteTranslationRecord($request, $object)
    {
        // delete all attachments from lang object
        AttachmentLibrary::deleteAttachment($this->package, 'market-product', $object->id_112, $object->lang_112);
    }

    public function addToDeleteRecordsSelect($request, $ids)
    {
        foreach($ids as $id)
        {
            AttachmentLibrary::deleteAttachment($this->package, $request->route()->getAction()['resource'], $id);
        }
    }

    public function apiCheckSlug(Request $request)
    {
        return response()->json([
            'status'    => 'success',
            'slug'      => ProductLang::checkSlug('slug_112', $request->input('slug'), $request->input('id'))
        ]);
    }
}