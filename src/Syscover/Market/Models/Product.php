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
    public $timestamps      = false;
    protected $fillable     = ['id_111', 'active_111'];
    private static $rules   = [

    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}
}