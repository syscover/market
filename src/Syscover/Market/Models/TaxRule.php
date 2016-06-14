<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class TaxRule
 *
 * Model with properties
 * <br><b>[id, name, priority, sort_order]</b>
 *
 * @package     Syscover\Market\Models
 */

class TaxRule extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_104_tax_rule';
    protected $primaryKey   = 'id_104';
    protected $suffix       = '104';
    public $timestamps      = false;
    protected $fillable     = ['id_104', 'name_104', 'priority_104', 'sort_order_104'];
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

    public function getTaxRateZones()
    {
        return $this->belongsToMany('Syscover\Market\Models\TaxRateZone', '012_105_tax_rules_tax_rates_zones', 'tax_rule_id_105', 'tax_rate_zone_id_105');
    }

    public function getCustomerClassTaxes()
    {
        return $this->belongsToMany('Syscover\Market\Models\CustomerClassTax', '012_106_tax_rules_customer_class_taxes', 'tax_rule_id_106', 'customer_class_tax_id_106');
    }
    
    public function getProductClassTaxes()
    {
        return $this->belongsToMany('Syscover\Market\Models\ProductClassTax', '012_107_tax_rules_product_class_taxes', 'tax_rule_id_107', 'product_class_tax_id_107');
    }
}