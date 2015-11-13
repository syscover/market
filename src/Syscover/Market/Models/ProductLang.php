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

class ProductLang extends Model {

    use TraitModel;

	protected $table        = '012_112_product_lang';
    protected $primaryKey   = 'id_112';
    public $timestamps      = false;
    protected $fillable     = ['id_112', 'lang_112', 'name_112'];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}
}