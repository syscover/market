<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Syscover\ShoppingCart\TaxRule as TaxRuleShoppingCart;

/**
 * Class TaxRule
 *
 * Model with properties
 * <br><b>[id, name, translation, priority, sort_order]</b>
 *
 * @package Syscover\Market\Models
 */

class TaxRule extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_104_tax_rule';
    protected $primaryKey   = 'id_104';
    protected $suffix       = '104';
    public $timestamps      = false;
    protected $fillable     = ['id_104', 'name_104', 'translation_104', 'priority_104', 'sort_order_104'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('012_105_tax_rules_tax_rates_zones', '012_104_tax_rule.id_104', '=', '012_105_tax_rules_tax_rates_zones.tax_rule_id_105')
            ->join('012_106_tax_rules_customer_class_taxes', '012_104_tax_rule.id_104', '=', '012_106_tax_rules_customer_class_taxes.tax_rule_id_106')
            ->join('012_107_tax_rules_product_class_taxes', '012_104_tax_rule.id_104', '=', '012_107_tax_rules_product_class_taxes.tax_rule_id_107')
            ->join('012_103_tax_rate_zone', '012_105_tax_rules_tax_rates_zones.tax_rate_zone_id_105', '=', '012_103_tax_rate_zone.id_103')
            ->join('012_100_customer_class_tax', '012_106_tax_rules_customer_class_taxes.customer_class_tax_id_106', '=', '012_100_customer_class_tax.id_100')
            ->join('012_101_product_class_tax', '012_107_tax_rules_product_class_taxes.product_class_tax_id_107', '=', '012_101_product_class_tax.id_101');
    }

    public static function getCustomReturnIndexRecords($query, $parameters)
    {
        return $query
            ->select('id_104', 'name_104', 'translation_104', 'priority_104', 'sort_order_104')
            ->groupBy('id_104', 'name_104', 'translation_104', 'priority_104', 'sort_order_104')
            ->get();
    }

    public static function customCountIndexRecords($query, $parameters)
    {
        return $query
            ->select('id_104')
            ->groupBy('id_104')
            ->get()     // without get, don't count correctly, count group number
            ->count();
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

    public function getTaxRuleShoppingCart()
    {
        return new TaxRuleShoppingCart(
            Lang::has($this->translation_104) ? trans($this->translation_104) : $this->name_104,
            $this->tax_rate_103,
            $this->priority_104,
            $this->sort_order_104
        );
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