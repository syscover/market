<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Market\Models\Category;

/**
 * Class CategoryController
 * @package Syscover\Market\Controllers
 */

class CategoryController extends Controller
{
    protected $routeSuffix  = 'marketCategory';
    protected $folder       = 'category';
    protected $package      = 'market';
    protected $indexColumns     = ['id_110', 'name_110', ['data' => 'active_110', 'type' => 'active']];
    protected $nameM        = 'name_110';
    protected $model        = Category::class;
    protected $icon         = 'fa fa-cubes';
    protected $objectTrans  = 'category';

    public function customIndex($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang')->id_001;

        return $parameters;
    }

    public function createCustomRecord($parameters)
    {
        $parameters['categories'] = Category::all();

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
            $id = Category::max('id_110');
            $id++;
            $idLang = null;
        }

        Category::create([
            'id_110'            => $id,
            'lang_id_110'       => $this->request->input('lang'),
            'parent_id_110'     => empty($this->request->input('parent'))? null : $this->request->input('parent'),
            'name_110'          => $this->request->input('name'),
            'slug_110'          => $this->request->input('slug'),
            'active_110'        => $this->request->input('active', false),
            'description_110'   => $this->request->input('description'),
            'data_lang_110'     => Category::addLangDataRecord($this->request->input('lang'), $idLang)
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['categories'] = Category::all();

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Category::where('id_110', $parameters['id'])->where('lang_id_110', $this->request->input('lang'))->update([
            'parent_id_110'     => $this->request->input('parent'),
            'name_110'          => $this->request->input('name'),
            'slug_110'          => $this->request->input('slug'),
            'active_110'        => $this->request->input('active', false),
            'description_110'   => $this->request->input('description'),
        ]);
    }

    public function apiCheckSlug()
    {
        return response()->json([
            'status'    => 'success',
            'slug'      => Category::checkSlug('slug_110', $this->request->input('slug'), $this->request->input('id'))
        ]);
    }
}