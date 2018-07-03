<?php namespace Syscover\Market\Old\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class PaymentMethod
 *
 * Model with properties
 * <br><b>[id, lang, name, active, data_lang]</b>
 *
 * @package     Syscover\Market\Models
 */

class OrderStatus extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_114_order_status';
    protected $primaryKey   = 'id_114';
    protected $suffix       = '114';
    public $timestamps      = false;
    protected $fillable     = ['id_114', 'lang_id_114', 'name_114', 'active_114', 'data_lang_114'];
    protected $maps         = [];
    protected $relationMaps = [
        'lang'  => \Syscover\Pulsar\Models\Lang::class
    ];
    private static $rules   = [
        'name'  => 'required|between:2,255'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('001_001_lang', '012_114_order_status.lang_id_114', '=', '001_001_lang.id_001');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_id_114');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        $query = $this->builder();

        if(isset($parameters['lang'])) $query->where('lang_id_114', $parameters['lang']);

        return $query;
    }

    public static function customCount($request, $parameters)
    {
        return OrderStatus::where('lang_id_114', $parameters['lang'])->getQuery();
    }
}