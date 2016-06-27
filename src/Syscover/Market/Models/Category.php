<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Category
 *
 * Model with properties
 * <br><b>[id, lang_id, parent_id, name, slug, active, description, data_lang, data]</b>
 *
 * @package     Syscover\Market\Models
 */

class Category extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_110_category';
    protected $primaryKey   = 'id_110';
    protected $suffix        = '110';
    public $timestamps      = false;
    protected $fillable     = ['id_110', 'lang_id_110', 'parent_id_110', 'name_110', 'slug_110', 'active_110', 'description_110', 'data_lang_110', 'data_110'];
    protected $maps         = [];
    protected $relationMaps = [
        'lang'  => \Syscover\Pulsar\Models\Lang::class
    ];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('001_001_lang', '012_110_category.lang_id_110', '=', '001_001_lang.id_001');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_id_110');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        $query = $this->builder();

        if(isset($parameters['lang'])) $query->where('lang_id_110', $parameters['lang']);

        return $query;
    }

    public static function customCount($request, $parameters)
    {
        return Category::where('lang_id_110', $parameters['lang'])->getQuery();
    }

    public static function getTranslationRecord($parameters)
    {
        return Category::builder()
            ->where('id_110', $parameters['id'])->where('lang_id_110', $parameters['lang'])
            ->first();
    }

    public static function getRecords($parameters)
    {
        $query = Category::builder();

        if(isset($parameters['active_110'])) $query->where('active_110', $parameters['active_110']);
        if(isset($parameters['slug_110'])) $query->where('slug_110', $parameters['slug_110']);
        if(isset($parameters['lang_id_110'])) $query->where('lang_id_110', $parameters['lang_id_110']);

        return $query->get();
    }
}