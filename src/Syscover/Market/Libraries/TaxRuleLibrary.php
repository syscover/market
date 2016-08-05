<?php namespace Syscover\Market\Libraries;

/**
 * Class TaxRuleLibrary
 * @package Syscover\Market\Libraries
 */
class TaxRuleLibrary
{
    const PRICE_WITHOUT_TAX = 1;
    const PRICE_WITH_TAX    = 2;

    /**
     * @param   float                               $price
     * @param   \Syscover\Market\Models\TaxRule[]   $taxRules
     * @return  array
     */
    public static function taxCalculateOverSubtotal($price, $taxRules)
    {
        $priority       = 0;
        $totalTax       = 0;
        $response       = collect();
        $priorityPrice  = $price;

        foreach ($taxRules as $taxRule)
        {
            $taxRate = $taxRule->tax_rate_103 / 100;

            // check priority
            if($taxRule->priority_104 > $priority)
            {
                $priority       = $taxRule->priority_104;
                $priorityPrice  += $totalTax;
            }

            $taxAmount  = $priorityPrice * $taxRate;
            $totalTax   += $taxAmount;

            $response->push([
                'taxRule'   => $taxRule,
                'taxAmount' => $taxAmount
            ]);
        }

        return $response;
    }

    /**
     * @param   float                               $price
     * @param   \Syscover\Market\Models\TaxRule[]   $taxRules
     * @return  array
     */
    public static function taxCalculateOverTotal($price, $taxRules)
    {
        $priority       = 0;
        $totalTax       = 0;
        $response       = collect();
        $priorityPrice  = $price;

        foreach ($taxRules->reverse() as $taxRule)
        {
            $taxRate = $taxRule->tax_rate_103 / 100;

            // check priority
            if($taxRule->priority_104 < $priority || ($priority === 0 && $taxRule->priority_104 > 0))
            {
                $priority       = $taxRule->priority_104;
                $priorityPrice  -= $totalTax;
            }

            $taxAmount  = ($priorityPrice * $taxRate) / ($taxRate + 1);
            $totalTax   +=  $taxAmount;

            $response->push([
                'taxRule'   => $taxRule,
                'taxAmount' => $taxAmount
            ]);
        }

        return $response;
    }
}