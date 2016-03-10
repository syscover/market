<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class PaymentMethod
 *
 * Model with properties
 * <br><b>[id, lang, name, order_status_successful_id, minimum_price, maximum_price, instructions, sorting, active, data_lang]</b>
 *
 * @package     Syscover\Market\Models
 */

class PaymentMethod extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '012_115_payment_method';
    protected $primaryKey   = 'id_115';
    protected $suffix       = '115';
    public $timestamps      = false;
    protected $fillable     = ['id_115', 'lang_115', 'name_115', 'order_status_successful_id_115', 'minimum_price_115', 'maximum_price_115', 'instructions_115', 'sorting_115', 'active_115', 'data_lang_115'];
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
        return $query->join('001_001_lang', '012_115_payment_method.lang_115', '=', '001_001_lang.id_001');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_115');
    }

    public static function addToGetIndexRecords($parameters)
    {
        $query =  PaymentMethod::builder();

        if(isset($parameters['lang'])) $query->where('lang_115', $parameters['lang']);

        return $query;
    }

    public static function customCount($parameters)
    {
        return PaymentMethod::where('lang_115', $parameters['lang'])->getQuery();
    }
}