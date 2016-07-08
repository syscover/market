<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductsCategories
 *
 * Model with properties
 * <br><b>[product_id, category_id]</b>
 *
 * @package     Syscover\Market\Models
 */

class ProductsCategories extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_113_products_categories';
    protected $primaryKey   = 'product_id_113';
    protected $suffix        = '113';
    public $timestamps      = false;
    protected $fillable     = ['product_id_113', 'category_id_113'];
    protected $maps         = [];
    protected $relationMaps = [
        'product'       => \Syscover\Market\Models\Product::class,
        'category'      => \Syscover\Market\Models\Category::class
    ];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query, $lang = null)
    {
        return $query->join('012_111_product', '012_113_products_categories.product_id_113', '=', '012_111_product.id_111')
            ->leftJoin('012_112_product_lang', function($join) use ($lang) {
                $join->on('012_111_product.id_111', '=', '012_112_product_lang.id_112');
                if($lang !== null)  $join->where('012_112_product_lang.lang_id_112', '=', $lang);
            })
            ->join('012_110_category', function($join) use ($lang) {
                $join->on('012_113_products_categories.category_id_113', '=', '012_110_category.id_110');
                if($lang !== null)  $join->where('012_110_category.lang_id_110', '=', $lang);
            });
    }
}