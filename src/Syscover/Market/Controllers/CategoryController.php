<?php namespace Syscover\Market\Controllers;

use Illuminate\Http\Request;
use Syscover\Market\Models\Category;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;

class CategoryController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'marketCategory';
    protected $folder       = 'categories';
    protected $package      = 'market';
    protected $aColumns     = ['id_110', 'name_110', ['data' => 'active_110', 'type' => 'active']];
    protected $nameM        = 'name_110';
    protected $model        = '\Syscover\Market\Models\Category';
    protected $icon         = 'fa fa-cubes';
    protected $objectTrans  = 'category';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang');

        return $parameters;
    }

    public function createCustomRecord($request, $parameters)
    {
        $parameters['categories'] = Category::all();

        return $parameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        // check if there is id
        if($request->has('id'))
        {
            $id = $request->get('id');
        }
        else
        {
            $id = Category::max('id_110');
            $id++;
        }

        Category::create([
            'id_110'            => $id,
            'lang_110'          => $request->input('lang'),
            'parent_110'        => empty($request->input('parent'))? null : $request->input('parent'),
            'name_110'          => $request->input('name'),
            'slug_110'          => $request->input('slug'),
            'active_110'        => $request->input('active', false),
            'description_110'   => $request->input('description'),
            'data_lang_110'     => Category::addLangDataRecord($id, $request->input('lang'))
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