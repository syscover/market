<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\DB;

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
    protected $fillable     = ['id_111', 'custom_field_group_111', 'price_type_111', 'price_111', 'weight_111', 'active_111', 'data_lang_111', 'data_111'];
    protected $maps         = [];
    protected $relationMaps = [
        'lang'          => \Syscover\Pulsar\Models\Lang::class,
        'product_lang'  => \Syscover\Market\Models\ProductLang::class
    ];
    private static $rules   = [
        'priceType'     => 'required',
        'productType'   => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('012_112_product_lang', '012_111_product.id_111', '=', '012_112_product_lang.id_112')
            ->join('001_001_lang', '012_112_product_lang.lang_112', '=', '001_001_lang.id_001')
            ->leftJoin('012_113_products_categories', '012_111_product.id_111', '=', '012_113_products_categories.product_113')
            ->leftJoin('012_110_category', '012_113_products_categories.category_113', '=', '012_110_category.id_110');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_112');
    }

    public function getCategories()
    {
        return $this->belongsToMany('Syscover\Market\Models\Category', '012_113_products_categories', 'product_113', 'category_113');
    }

    public static function addToGetRecordsLimit($parameters)
    {
        $query =  Product::builder();

        if(isset($parameters['lang'])) $query->where('lang_112', $parameters['lang']);

        return $query;
    }

    public static function getCustomReturnRecordsLimit($query)
    {
        return $query->groupBy('id_111')
            ->get(['*', DB::raw('GROUP_CONCAT(name_110 SEPARATOR \', \') AS name_110')]);
    }

    public static function getTranslationRecord($parameters)
    {
        return Product::builder()
            ->where('id_111', $parameters['id'])->where('lang_112', $parameters['lang'])
            ->first();
    }

    /**
     * @deprecated
     * @param $parameters
     * @return mixed
     */
    public static function getRecords($parameters)
    {
        $query = Product::builder();

        if(isset($parameters['active_111'])) $query->where('active_111', $parameters['active_111']);
        if(isset($parameters['slug_112'])) $query->where('slug_112', $parameters['slug_112']);
        if(isset($parameters['lang_112'])) $query->where('lang_112', $parameters['lang_112']);

        return $query->get();
    }
}