<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Product
 *
 * Model with properties
 * <br><b>[id, custom_field_group , active, data_lang, data]</b>
 *
 * @package     Syscover\Market\Models
 */

class Product extends Model
{
    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '012_111_product';
    protected $primaryKey   = 'id_111';
    protected $suffix        = '111';
    public $timestamps      = false;
    protected $fillable     = ['id_111', 'custom_field_group_111', 'active_111', 'data_lang_111', 'data_111'];
    protected $maps         = [];
    protected $relationMaps = [
        //'lang'          => \Syscover\Pulsar\Models\Lang::class,
        'product_lang'  => \Syscover\Market\Models\ProductLang::class
    ];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('012_112_product_lang', '012_111_product.id_111', '=', '012_112_product_lang.id_112')
            ->join('001_001_lang', '012_112_product_lang.lang_112', '=', '001_001_lang.id_001');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_112');
    }

    public static function addToGetRecordsLimit($parameters)
    {
        $query =  Product::builder();

        if(isset($parameters['lang'])) $query->where('lang_112', $parameters['lang']);

        return $query;
    }

    public static function getTranslationRecord($parameters)
    {
        return Product::builder()
            ->where('id_111', $parameters['id'])->where('lang_112', $parameters['lang'])
            ->first();
    }

    public static function getRecords($parameters)
    {
        $query = Product::builder();

        if(isset($parameters['active_111'])) $query->where('active_111', $parameters['active_111']);
        if(isset($parameters['slug_112'])) $query->where('slug_112', $parameters['slug_112']);
        if(isset($parameters['lang_112'])) $query->where('lang_112', $parameters['lang_112']);

        return $query->get();
    }
}