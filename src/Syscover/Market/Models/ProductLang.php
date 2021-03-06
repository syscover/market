<?php namespace Syscover\Market\Old\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Product
 *
 * Model with properties
 * <br><b>[id, lang_id, name, slug, description]</b>
 *
 * @package     Syscover\Market\Models
 */

class ProductLang extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_112_product_lang';
    protected $primaryKey   = 'id_112';
    protected $suffix       = '112';
    public $timestamps      = false;
    protected $fillable     = ['id_112', 'lang_id_112', 'name_112', 'slug_112', 'description_112'];
    protected $maps         = [];
    protected $relationMaps = [
        'lang' => \Syscover\Pulsar\Models\Lang::class,
    ];
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
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_id_112');
    }
}