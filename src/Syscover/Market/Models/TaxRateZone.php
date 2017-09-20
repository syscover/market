<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class TaxRateZone
 *
 * Model with properties
 * <br><b>[id, name, country_id, territorial_area_1_id, territorial_area_2_id, territorial_area_3_id, cp, tax_rate]</b>
 *
 * @package     Syscover\Market\Models
 */

class TaxRateZone extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_103_tax_rate_zone';
    protected $primaryKey   = 'id_103';
    protected $suffix       = '103';
    public $timestamps      = false;
    protected $fillable     = ['id_103', 'name_103', 'country_id_103', 'territorial_area_1_id_103', 'territorial_area_2_id_103', 'territorial_area_3_id_103', 'cp_103', 'tax_rate_103'];
    protected $maps         = [];
    protected $relationMaps = [
        'country'               => \Syscover\Pulsar\Models\Country::class,
        'territorial_area_1'    => \Syscover\Pulsar\Models\TerritorialArea1::class,
        'territorial_area_2'    => \Syscover\Pulsar\Models\TerritorialArea2::class,
        'territorial_area_3'    => \Syscover\Pulsar\Models\TerritorialArea3::class,
    ];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('001_002_country', function ($join) {
            $join->on('012_103_tax_rate_zone.country_id_103', '=', '001_002_country.id_002')
                ->where('001_002_country.lang_id_002', '=', base_lang2()->id_001);
        });
    }

    /**
     * Returns formatted tax rate.
     *
     * @param   int       $decimals
     * @param   string    $decimalPoint
     * @param   string    $thousandSeperator
     * @return  string
     */
    public function getTaxRate($decimals = 0, $decimalPoint = ',', $thousandSeperator = '.')
    {
        return number_format($this->tax_rate_103, $decimals, $decimalPoint, $thousandSeperator);
    }
}