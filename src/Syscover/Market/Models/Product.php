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

class Product extends Model {

    use TraitModel;

	protected $table        = '012_111_product';
    protected $primaryKey   = 'id_111';
    protected $sufix        = '111';
    public $timestamps      = false;
    protected $fillable     = ['id_111', 'active_111', 'data_lang_111', 'data_111'];
    private static $rules   = [

    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public static function getCustomRecordsLimit($parameters)
    {
        $query =  Product::join('012_112_product_lang', '012_111_product.id_111', '=', '012_112_product_lang.id_112')
            ->join('001_001_lang', '012_112_product_lang.lang_112', '=', '001_001_lang.id_001')
            ->newQuery();

        if(isset($parameters['lang'])) $query->where('lang_112', $parameters['lang']);

        return $query;
    }
}