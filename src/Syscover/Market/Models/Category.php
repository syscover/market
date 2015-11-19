<?php namespace Syscover\Market\Models;

/**
 * @package	    Market
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;

class Category extends Model {

    use TraitModel;

	protected $table        = '012_110_category';
    protected $primaryKey   = 'id_110';
    protected $sufix        = '110';
    public $timestamps      = false;
    protected $fillable     = ['id_110', 'lang_110', 'parent_110', 'name_110', 'slug_110', 'active_110', 'description_110', 'data_lang_110', 'data_110'];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function lang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_110');
    }

    public static function getCustomRecordsLimit($parameters)
    {
        $query =  Category::join('001_001_lang', '012_110_category.lang_110', '=', '001_001_lang.id_001')
            ->newQuery();

        if(isset($parameters['lang'])) $query->where('lang_110', $parameters['lang']);

        return $query;
    }

    public static function getCustomTranslationRecord($parameters)
    {
        return Category::join('001_001_lang', '012_110_category.lang_110', '=', '001_001_lang.id_001')
            ->where('id_110', $parameters['id'])->where('lang_110', $parameters['lang'])
            ->first();
    }

    public static function getRecords($parameters)
    {
        $query = Category::join('001_001_lang', '012_110_category.lang_110', '=', '001_001_lang.id_001')
            ->newQuery();

        if(isset($parameters['active_110'])) $query->where('active_110', $parameters['active_110']);
        if(isset($parameters['slug_110'])) $query->where('slug_110', $parameters['slug_110']);
        if(isset($parameters['lang_110'])) $query->where('lang_110', $parameters['lang_110']);

        return $query->get();
    }
}