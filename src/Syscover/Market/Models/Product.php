<?php namespace Syscover\Market\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Syscover\Market\Libraries\TaxRuleLibrary;

/**
 * Class Product
 *
 * Model with properties
 * <br><b>[id, field_group_id, type_id, parent_product_id, weight, active, sorting, price_type_id, subtotal, data_lang, data]</b>
 *
 * @package     Syscover\Market\Models
 */

class Product extends Model
{
    use Eloquence, Mappable;

	protected $table        = '012_111_product';
    protected $primaryKey   = 'id_111';
    protected $suffix        = '111';
    public $timestamps      = false;
    protected $fillable     = ['id_111', 'field_group_id_111', 'type_id_111', 'parent_product_id_111', 'weight_111', 'active_111', 'sorting_111', 'price_type_id_111', 'subtotal_111', 'product_class_tax_id_111', 'data_lang_111', 'data_111'];
    protected $maps         = [];
    protected $relationMaps = [
        'lang'          => \Syscover\Pulsar\Models\Lang::class,
        'product_lang'  => \Syscover\Market\Models\ProductLang::class
    ];
    private static $rules   = [
        'priceType'     => 'required',
        'productType'   => 'required',
    ];

    // custom properties
    protected $taxRules   = null;
    protected $taxAmount  = null;
    protected $total      = null;

    /**
     * Dynamically access route parameters.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        // total property
        if($key === 'price' || $key === 'price_111')
        {
            if(config('market.taxProductDisplayPrices') == TaxRuleLibrary::PRICE_WITHOUT_TAX)
            {
                return round($this->subtotal_111, 2);
            }
            elseif(config('market.taxProductDisplayPrices') == TaxRuleLibrary::PRICE_WITH_TAX)
            {
                return round($this->total_111, 2);
            }
        }

        // total property
        if($key === 'total' || $key === 'total_111')
        {
            if($this->total !== null)
            {
                return $this->total;
            }

            if($this->taxAmount !== null)
            {
                $this->total = $this->subtotal_111 + $this->taxAmount;
                return $this->total;
            }

            if($this->taxRules === null)
            {
                $this->taxRules = TaxRule::builder()
                    ->where('country_id_103', config('market.taxCountry'))
                    ->where('customer_class_tax_id_106', config('market.taxCustomerClass'))
                    ->where('product_class_tax_id_107', $this->product_class_tax_id_111)
                    ->orderBy('priority_104', 'asc')
                    ->get();
            }

            $taxes              = TaxRuleLibrary::taxCalculateOverSubtotal($this->subtotal_111, $this->taxRules->where('product_class_tax_id_107', $this->product_class_tax_id_111));
            $this->taxAmount    = $taxes->sum('taxAmount');
            $this->total        = $this->subtotal_111 + $this->taxAmount;

            return $this->total;

        }

        // taxAmount property
        if($key === 'taxAmount' || $key === 'tax_amount' || $key === 'tax_amount_111')
        {
            if($this->taxAmount !== null)
            {
                return $this->taxAmount;
            }
            else
            {
                if($this->taxRules === null)
                {
                    $this->taxRules = TaxRule::builder()
                        ->where('country_id_103', config('market.taxCountry'))
                        ->where('customer_class_tax_id_106', config('market.taxCustomerClass'))
                        ->where('product_class_tax_id_107', $this->product_class_tax_id_111)
                        ->orderBy('priority_104', 'asc')
                        ->get();

                }

                $taxes              = TaxRuleLibrary::taxCalculateOverSubtotal($this->subtotal_111, $this->taxRules->where('product_class_tax_id_107', $this->product_class_tax_id_111));
                $this->taxAmount    = $taxes->sum('taxAmount');

                return $this->taxAmount;
            }
        }

        if($key === 'taxRules' || $key === 'tax_rules' || $key === 'tax_rules_111')
        {
            return $this->taxRules;
        }

        // call parent method in model
        return parent::getAttribute($key);
    }

    /**
     * Dynamically set attributes on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function __set($key, $value)
    {
        if($key === 'taxAmount' || $key === 'tax_amount' || $key === 'tax_amount_111')
        {
            $this->taxAmount = $value;
        }

        if($key === 'total' || $key === 'total_111')
        {
            $this->total = $value;
        }

        parent::setAttribute($key, $value);
    }

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('012_112_product_lang', '012_111_product.id_111', '=', '012_112_product_lang.id_112')
            ->join('001_001_lang', '012_112_product_lang.lang_id_112', '=', '001_001_lang.id_001');
    }

    public function scopeProductsByCategories($query, $categories)
    {
        return $query->builder()
            ->whereIn('id_111', function($query) use ($categories) {
                $query->select('product_id_113')
                    ->from('012_113_products_categories')
                    ->whereIn('category_id_113', $categories)
                    ->groupBy('product_id_113')
                    ->get();
            });
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_id_112');
    }

    public function getCategories()
    {
        return $this->belongsToMany('Syscover\Market\Models\Category', '012_113_products_categories', 'product_id_113', 'category_id_113');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        $query = $this->builder();

        if(isset($parameters['lang'])) $query->where('lang_id_112', $parameters['lang']);

        return $query;
    }
    
    public static function getTranslationRecord($parameters)
    {
        return Product::builder()->where('lang_id_112', $parameters['lang'])
            ->where('lang_id_112', $parameters['lang'])
            ->where('id_111', $parameters['id'])
            ->first();
    }

    public static function getCustomReturnIndexRecords($query, $parameters)
    {
        return $query->leftJoin('012_113_products_categories', '012_111_product.id_111', '=', '012_113_products_categories.product_id_113')
            ->leftJoin('012_110_category', function($join){
                $join->on('012_113_products_categories.category_id_113', '=', '012_110_category.id_110')
                    ->where('012_110_category.lang_id_110', '=', base_lang()->id_001);
            })
            ->groupBy('id_111')
            ->get(['*', DB::raw('GROUP_CONCAT(name_110 SEPARATOR \', \') AS name_110')]);
    }

    public static function customCountIndexRecords($query, $parameters)
    {
        return $query->leftJoin('012_113_products_categories', '012_111_product.id_111', '=', '012_113_products_categories.product_id_113')
            ->leftJoin('012_110_category', function($join){
                $join->on('012_113_products_categories.category_id_113', '=', '012_110_category.id_110')
                    ->where('012_110_category.lang_id_110', '=', base_lang()->id_001);
            })
            ->groupBy('id_111')
            ->get(['*', DB::raw('GROUP_CONCAT(name_110 SEPARATOR \', \') AS name_110')])
            ->count();
    }

    /**
     * Returns formatted product price.
     *
     * @param   int       $decimals
     * @param   string    $decimalPoint
     * @param   string    $thousandSeperator
     * @return  string
     */
    public function getPrice($decimals = 2, $decimalPoint = ',', $thousandSeperator = '.')
    {
        return number_format($this->price_111, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Returns formatted product subtotal.
     *
     * @param   int       $decimals
     * @param   string    $decimalPoint
     * @param   string    $thousandSeperator
     * @return  string
     */
    public function getSubtotal($decimals = 2, $decimalPoint = ',', $thousandSeperator = '.')
    {
        return number_format($this->subtotal_111, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Returns formatted product tax amount.
     *
     * @param   int       $decimals
     * @param   string    $decimalPoint
     * @param   string    $thousandSeperator
     * @return  string
     */
    public function getTaxAmount($decimals = 2, $decimalPoint = ',', $thousandSeperator = '.')
    {
        return number_format($this->tax_amount_111, $decimals, $decimalPoint, $thousandSeperator);
    }

    /**
     * Returns formatted product total amount.
     *
     * @param   int       $decimals
     * @param   string    $decimalPoint
     * @param   string    $thousandSeperator
     * @return  string
     */
    public function getTotal($decimals = 2, $decimalPoint = ',', $thousandSeperator = '.')
    {
        return number_format($this->total_111, $decimals, $decimalPoint, $thousandSeperator);
    }
}