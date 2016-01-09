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
 * <br><b>[id, lang, name, icon, data_lang, data]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class PaymentMethod extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '012_114_payment_method';
    protected $primaryKey   = 'id_114';
    protected $suffix       = '114';
    public $timestamps      = false;
    protected $fillable     = ['id_114', 'lang_114', 'name_114', 'minimum_price_114', 'maximum_price_114', 'instructions_114', 'sorting_114', 'active_114', 'data_lang_114'];
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
        return $query->join('001_001_lang', '012_114_payment_method.lang_114', '=', '001_001_lang.id_001');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_114');
    }

    public static function addToGetIndexRecords($parameters)
    {
        $query =  PaymentMethod::builder();

        if(isset($parameters['lang'])) $query->where('lang_114', $parameters['lang']);

        return $query;
    }

    public static function customCount($parameters)
    {
        return PaymentMethod::where('lang_114', $parameters['lang'])->getQuery();
    }
}