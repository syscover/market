<?php namespace Syscover\Market\Controllers;

use Illuminate\Http\Request;
use Syscover\Market\Models\CartPriceRule;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;

class CartPriceRuleController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'cartPriceRule';
    protected $folder       = 'cart_price_rule';
    protected $package      = 'market';
    protected $aColumns     = ['id_120'];
    protected $nameM        = 'name_110';
    protected $model        = CartPriceRule::class;
    protected $icon         = 'fa fa-shopping-cart';
    protected $objectTrans  = 'cart_price_rule';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang')->id_001;

        return $parameters;
    }

    public function createCustomRecord($request, $parameters)
    {
        return $parameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        // check if there is id
        if($request->has('id'))
        {
            $id     = $request->input('id');
            $idLang = $id;
        }
        else
        {
            $id = Category::max('id_110');
            $id++;
            $idLang = null;
        }

        Category::create([
            'id_110'            => $id,
            'lang_110'          => $request->input('lang'),
            'parent_110'        => empty($request->input('parent'))? null : $request->input('parent'),
            'name_110'          => $request->input('name'),
            'slug_110'          => $request->input('slug'),
            'active_110'        => $request->input('active', false),
            'description_110'   => $request->input('description'),
            'data_lang_110'     => Category::addLangDataRecord($request->input('lang'), $idLang)
        ]);
    }

    public function editCustomRecord($request, $parameters)
    {
        $parameters['categories'] = Category::all();

        return $parameters;
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        Category::where('id_110', $parameters['id'])->where('lang_110', $request->input('lang'))->update([
            'parent_110'        => $request->input('parent'),
            'name_110'          => $request->input('name'),
            'slug_110'          => $request->input('slug'),
            'active_110'        => $request->input('active', false),
            'description_110'   => $request->input('description'),
        ]);
    }

    public function apiCheckSlug(Request $request)
    {
        return response()->json([
            'status'    => 'success',
            'slug'      => Category::checkSlug('slug_110', $request->input('slug'), $request->input('id'))
        ]);
    }
}