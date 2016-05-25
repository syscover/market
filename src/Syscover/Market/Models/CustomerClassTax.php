<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class CustomerClassTax
 *
 * Model with properties
 * <br><b>[id, name]</b>
 *
 * @package     Syscover\Market\Models
 */

class CustomerClassTax extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_100_customer_class_tax';
    protected $primaryKey   = 'id_100';
    protected $suffix       = '100';
    public $timestamps      = false;
    protected $fillable     = ['id_100', 'name_100'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query;
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_110');
    }
}