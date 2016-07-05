<?php namespace Syscover\Market\Controllers;

use Syscover\Market\Libraries\TaxLibrary;
use Syscover\Market\Models\Product;
use Syscover\Pulsar\Core\Controller;
use Syscover\Market\Models\TaxRule;
use Syscover\Market\Models\TaxRateZone;
use Syscover\Market\Models\CustomerClassTax;
use Syscover\Market\Models\ProductClassTax;

/**
 * Class TaxRuleController
 * @package Syscover\Market\Controllers
 */

class TaxRuleController extends Controller
{
    protected $routeSuffix  = 'marketTaxRule';
    protected $folder       = 'tax_rule';
    protected $package      = 'market';
    protected $aColumns     = ['id_104', 'name_104', 'priority_104', 'sort_order_104'];
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
            ->where('country_id_103', config('market.taxDefaultCountry'))
            ->where('customer_class_tax_id_106', config('market.taxDefaultCustomerClass'))
            ->where('product_class_tax_id_107', $productClassTax)
            ->orderBy('priority_104', 'asc')
            ->get();


        $taxes = TaxLibrary::taxCalculate($price, $taxRules);
        
        $response = [
            'success'       => true,
            'taxes'         => $taxes,
            'totalTax'      => $taxes->sum('taxAmount')
        ];

        return response()->json($response);
    }
}