<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProductClassTax
 *
 * Model with properties
 * <br><b>[id, name]</b>
 *
 * @package     Syscover\Market\Models
 */

class ProductClassTax extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_101_product_class_tax';
    protected $primaryKey   = 'id_101';
    protected $suffix       = '101';
    public $timestamps      = false;
    protected $fillable     = ['id_101', 'name_101'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [
        'name' => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query;
    }
}