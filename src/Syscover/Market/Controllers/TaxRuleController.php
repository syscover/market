<?php namespace Syscover\Market\Old\Controllers;

use Syscover\Market\Libraries\TaxRuleLibrary;
use Syscover\Pulsar\Core\Controller;
use Syscover\Market\Old\Models\TaxRule;
use Syscover\Market\Old\Models\TaxRateZone;
use Syscover\Market\Old\Models\CustomerClassTax;
use Syscover\Market\Old\Models\ProductClassTax;

/**
 * Class TaxRuleController
 * @package Syscover\Market\Controllers
 */

class TaxRuleController extends Controller
{
    protected $routeSuffix  = 'marketTaxRule';
    protected $folder       = 'tax_rule';
    protected $package      = 'market';
    protected $indexColumns = ['id_104', 'name_104', 'translation_104', 'priority_104', 'sort_order_104'];
    protected $nameM        = 'name_104';
    protected $model        = TaxRule::class;
    protected $icon         = 'fa fa-random';
    protected $objectTrans  = 'tax_rule';

    public function createCustomRecord($parameters)
    {
        $parameters['taxRateZones']         = TaxRateZone::builder()->get();
        $parameters['customerClassTaxes']   = CustomerClassTax::builder()->get();
        $parameters['productClassTaxes']    = ProductClassTax::builder()->get();

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        $taxRule = TaxRule::create([
            'name_104'          => $this->request->input('name'),
            'translation_104'   => $this->request->has('translation')? $this->request->input('translation') : null,
            'priority_104'      => $this->request->input('priority'),
            'sort_order_104'    => $this->request->input('sortOrder')
        ]);

        $taxRule->getTaxRateZones()->sync($this->request->input('taxRateZones'));
        $taxRule->getCustomerClassTaxes()->sync($this->request->input('customerClassTaxes'));
        $taxRule->getProductClassTaxes()->sync($this->request->input('productClassTaxes'));
    }

    public function editCustomRecord($parameters)
    {
        $parameters['taxRateZones']         = TaxRateZone::builder()->get();
        $parameters['customerClassTaxes']   = CustomerClassTax::builder()->get();
        $parameters['productClassTaxes']    = ProductClassTax::builder()->get();

        return $parameters;
    }

    public function updateCustomRecord($parameters)
    {
        TaxRule::where('id_104', $parameters['id'])->update([
            'name_104'          => $this->request->input('name'),
            'translation_104'   => $this->request->has('translation')? $this->request->input('translation') : null,
            'priority_104'      => $this->request->input('priority'),
            'sort_order_104'    => $this->request->input('sortOrder')
        ]);

        $taxRule = TaxRule::find($parameters['id']);

        $taxRule->getTaxRateZones()->sync($this->request->input('taxRateZones'));
        $taxRule->getCustomerClassTaxes()->sync($this->request->input('customerClassTaxes'));
        $taxRule->getProductClassTaxes()->sync($this->request->input('productClassTaxes'));
    }

    public function apiGetProductTaxes($price, $productClassTax)
    {
        $taxRules = TaxRule::builder()
            ->where('country_id_103', config('market.taxCountry'))
            ->where('customer_class_tax_id_106', config('market.taxCustomerClass'))
            ->where('product_class_tax_id_107', $productClassTax)
            ->orderBy('priority_104', 'asc')
            ->get();

        if((int)config('market.taxProductPrices') == TaxRuleLibrary::PRICE_WITHOUT_TAX)
        {
            $taxes      = TaxRuleLibrary::taxCalculateOverSubtotal($price, $taxRules);
            $taxAmount  = $taxes->sum('taxAmount');
            $subtotal   = $price;
            $total      = $subtotal + $taxAmount;

        }
        elseif ((int)config('market.taxProductPrices') == TaxRuleLibrary::PRICE_WITH_TAX)
        {
            $taxes      = TaxRuleLibrary::taxCalculateOverTotal($price, $taxRules);
            $taxAmount  = $taxes->sum('taxAmount');
            $total      = $price;
            $subtotal   = $total - $taxAmount;
        }

        $response = [
            'success'           => true,
            'taxes'             => $taxes,
            'subtotal'          => $subtotal,
            'taxAmount'         => $taxAmount,
            'total'             => $total,
            'subtotalFormat'    => number_format($subtotal, 2, ',', '.'),
            'taxAmountFormat'   => number_format($taxAmount, 2, ',', '.'),
            'totalFormat'       => number_format($total, 2, ',', '.'),

        ];

        return response()->json($response);
    }
}