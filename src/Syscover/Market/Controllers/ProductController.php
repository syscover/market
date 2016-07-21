<?php namespace Syscover\Market\Controllers;

use Syscover\Market\Libraries\TaxLibrary;
use Syscover\Market\Models\TaxRule;
use Syscover\Pulsar\Core\Controller;
use Syscover\Pulsar\Libraries\AttachmentLibrary;
use Syscover\Pulsar\Libraries\CustomFieldResultLibrary;
use Syscover\Pulsar\Models\AttachmentFamily;
use Syscover\Pulsar\Models\CustomFieldGroup;
use Syscover\Market\Models\Product;
use Syscover\Market\Models\ProductLang;
use Syscover\Market\Models\ProductClassTax;
use Syscover\Market\Models\Category;

/**
 * Class ProductController
 * @package Syscover\Market\Controllers
 */

class ProductController extends Controller
{
    protected $routeSuffix  = 'marketProduct';
    protected $folder       = 'products';
    protected $package      = 'market';
    protected $indexColumns = ['id_111', 'name_112', ['data' => 'active_111', 'type' => 'active'], 'price_111', 'sorting_111', 'name_110'];
    protected $nameM        = 'name_112';
    protected $model        = Product::class;
    protected $langModel    = ProductLang::class;
    protected $icon         = 'fa fa-cube';
    protected $objectTrans  = 'product';

    public function customIndex($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang')->id_001;
        // init record on tap 3
        $parameters['urlParameters']['tab']     = 3;

        return $parameters;
    }

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        $actionUrlParameters['tab'] = 3;

        return $actionUrlParameters;
    }

    public function createCustomRecord($parameters)
    {
        $parameters['categories'] = Category::where('lang_id_110', $parameters['lang']->id_001)->get();

        $parameters['productTypes'] = array_map(function($object){
            $object->name = trans($object->name);
            return $object;
        }, config('market.productTypes'));

        $parameters['priceTypes'] = array_map(function($object){
            $object->name = trans($object->name);
            return $object;
        }, config('market.priceTypes'));

        $parameters['productClassTaxes'] = ProductClassTax::builder()->get();

        $parameters['parentsProducts'] = Product::builder()
            ->where('lang_id_112', base_lang()->id_001)
            ->whereNull('parent_product_id_111')
            ->get();

        $parameters['attachmentFamilies']   = AttachmentFamily::getAttachmentFamilies(['resource_id_015' => 'market-product']);
        $parameters['customFieldGroups']    = CustomFieldGroup::builder()->where('resource_id_025', 'market-product')->get();
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

    public function storeCustomRecord($parameters)
    {
        if(! $this->request->has('id'))
        {
            // create new product
            $product = Product::create([
                'active_111' => $this->request->input('active', false)
            ]);

            $id     = $product->id_111;
            $idLang = null;
        }
        else
        {
            // create product language
            $id     = $this->request->input('id');
            $idLang = $id;
        }

        Product::where('id_111', $id)->update([
            'field_group_id_111'        => $this->request->has('customFieldGroup')? $this->request->input('customFieldGroup') : null,
            'type_id_111'               => $this->request->input('productType'),
            'parent_product_id_111'     => $this->request->has('parentProduct')? $this->request->input('parentProduct') : null,
            'price_type_id_111'         => $this->request->input('priceType'),
            'price_111'                 => $this->request->has('price')? $this->request->input('price') : null,
            'product_class_tax_id_111'  => $this->request->has('productClassTax')? $this->request->input('productClassTax') : null,
            'weight_111'                => $this->request->has('weight')? $this->request->input('weight') : null,
            'sorting_111'               => $this->request->has('sorting')? $this->request->input('sorting') : null,
            'data_lang_111'             => Product::addLangDataRecord($this->request->input('lang'), $idLang),
        ]);

        ProductLang::create([
            'id_112'            => $id,
            'lang_id_112'       => $this->request->input('lang'),
            'name_112'          => $this->request->input('name'),
            'slug_112'          => $this->request->input('slug'),
            'description_112'   => $this->request->input('description'),
        ]);

        $product = Product::where('id_111', $id)->first();

        // set categories
        if(is_array($this->request->input('categories')))
        {
            $product->getCategories()->sync($this->request->input('categories'));
        }

        // set attachments
        $attachments = json_decode($this->request->input('attachments'));
        AttachmentLibrary::storeAttachments($attachments, $this->package, 'market-product', $id, $this->request->input('lang'));

        // set custom fields
        if(!empty($this->request->input('customFieldGroup')))
            CustomFieldResultLibrary::storeCustomFieldResults($this->request, $this->request->input('customFieldGroup'), 'market-product', $id, $this->request->input('lang'));
    }

    public function editCustomRecord($parameters)
    {
        $parameters['categories'] = Category::where('lang_id_110', $parameters['lang']->id_001)->get();

        $parameters['productTypes'] = array_map(function($object){
            $object->name = trans($object->name);
            return $object;
        },config('market.productTypes'));

        $parameters['priceTypes'] = array_map(function($object){
            $object->name = trans($object->name);
            return $object;
        },config('market.priceTypes'));

        $parameters['productClassTaxes'] = ProductClassTax::builder()->get();

        $parameters['parentsProducts'] = Product::builder()
            ->where('lang_id_112', base_lang()->id_001)
            ->where('id_111', '<>', $parameters['id'])
            ->whereNull('parent_product_id_111')
            ->get();

        $taxRules = TaxRule::builder()
            ->where('country_id_103', config('market.taxDefaultCountry'))
            ->where('customer_class_tax_id_106', config('market.taxDefaultCustomerClass'))
            ->where('product_class_tax_id_107', $parameters['object']->product_class_tax_id_111)
            ->orderBy('priority_104', 'asc')
            ->get();

        $parameters['taxes'] = TaxLibrary::taxCalculate($parameters['object']->price_111, $taxRules);
        
        $attachments                        = AttachmentLibrary::getRecords($this->package, 'market-product', $parameters['object']->id_111, $parameters['lang']->id_001);
        $parameters['customFieldGroups']    = CustomFieldGroup::builder()->where('resource_id_025', 'market-product')->get();
        $parameters['attachmentFamilies']   = AttachmentFamily::getAttachmentFamilies(['resource_id_015' => 'market-product']);
        $parameters                         = array_merge($parameters, $attachments);

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Product::where('id_111', $parameters['id'])->update([
            'field_group_id_111'        => $this->request->has('customFieldGroup')? $this->request->input('customFieldGroup') : null,
            'type_id_111'               => $this->request->input('productType'),
            'parent_product_id_111'     => $this->request->has('parentProduct')? $this->request->input('parentProduct') : null,
            'price_type_id_111'         => $this->request->input('priceType'),
            'price_111'                 => $this->request->has('price')? $this->request->input('price') : null,
            'product_class_tax_id_111'  => $this->request->has('productClassTax')? $this->request->input('productClassTax') : null,
            'weight_111'                => $this->request->has('weight')? $this->request->input('weight') : null,
            'active_111'                => $this->request->input('active', false),
            'sorting_111'               => empty($this->request->input('sorting'))? null : $this->request->input('sorting'),
        ]);

        ProductLang::where('id_112', $parameters['id'])->where('lang_id_112', $this->request->input('lang'))->update([
            'name_112'          => $this->request->input('name'),
            'slug_112'          => $this->request->input('slug'),
            'description_112'   => $this->request->input('description'),
        ]);

        $product = Product::where('id_111', $parameters['id'])->first();

        // categories
        if(is_array($this->request->input('categories')))
        {
            $product->getCategories()->sync($this->request->input('categories'));
        }
        else
        {
            $product->getCategories()->detach();
        }

        // set custom fields
        if(!empty($this->request->input('customFieldGroup')))
        {
            CustomFieldResultLibrary::deleteCustomFieldResults('market-product', $parameters['id'], $this->request->input('lang'));
            CustomFieldResultLibrary::storeCustomFieldResults($this->request, $this->request->input('customFieldGroup'), 'market-product', $parameters['id'], $this->request->input('lang'));
        }
    }

    public function deleteCustomRecord($object)
    {
        // delete all attachments
        AttachmentLibrary::deleteAttachment($this->package, $this->request->route()->getAction()['resource'], $object->id_111);
        CustomFieldResultLibrary::deleteCustomFieldResults('market-product', $object->id_111);
    }

    public function deleteCustomTranslationRecord($object)
    {
        // delete all attachments from lang object
        AttachmentLibrary::deleteAttachment($this->package, 'market-product', $object->id_112, $object->lang_id_112);
        CustomFieldResultLibrary::deleteCustomFieldResults('market-product', $object->id_112, $object->lang_id_112);
    }

    public function deleteCustomRecordsSelect($ids)
    {
        foreach($ids as $id)
        {
            AttachmentLibrary::deleteAttachment($this->package, $this->request->route()->getAction()['resource'], $id);
            CustomFieldResultLibrary::deleteCustomFieldResults('market-product', $id);
        }
    }

    public function apiCheckSlug()
    {
        return response()->json([
            'status'    => 'success',
            'slug'      => ProductLang::checkSlug('slug_112', $this->request->input('slug'), $this->request->input('id'))
        ]);
    }
}