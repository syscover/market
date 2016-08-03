<?php namespace Syscover\Market\Libraries;


class TaxRuleLibrary
{
    const PRICE_WITHOUT_TAX = 1;
    const PRICE_WITH_TAX    = 2;

    /**
     * @param   float                               $price
     * @param   \Syscover\Market\Models\TaxRule[]   $taxRules
     * @return  array
     */
    public static function taxCalculate($price, $taxRules)
    {
        // taxProductPrices

        // 1 excluding tax
        if((int)config('market.taxProductPrices') == self::PRICE_WITHOUT_TAX)
        {
            $priority       = 0;
            $totalTax       = 0;
            $response       = collect();
            $priorityPrice  = $price;


            for ($i = 0; $i < count($taxRules); $i++)
            {
                $taxRate = $taxRules[$i]->tax_rate_103 / 100;

                // check priority
                if($taxRules[$i]->priority_104 > $priority)
                {
                    $priority       = $taxRules[$i]->priority_104;
                    $priorityPrice  += $totalTax;
                }
                
                $taxAmount  = round($priorityPrice * $taxRate, 2);
                $totalTax   +=  $taxAmount;
                
                $response->push([
                    'taxRule'   => $taxRules[$i],
                    'taxAmount' => $taxAmount
                ]);
            }
            
            return $response;
        }
        
        // 2 including tax
        if((int)config('market.taxProductPrices') == self::PRICE_WITH_TAX)
        {
            $priority       = 0;
            $totalTax       = 0;
            $response       = collect();
            $priorityPrice  = $price;


            for ($i = count($taxRules)-1; $i >= 0; $i--)
            {
                $taxRate = $taxRules[$i]->tax_rate_103 / 100;

                // check priority
                if($taxRules[$i]->priority_104 < $priority || ($priority === 0 && $taxRules[$i]->priority_104 > 0))
                {
                    $priority       = $taxRules[$i]->priority_104;
                    $priorityPrice  -= $totalTax;
                }
                
                $taxAmount  = round(($priorityPrice * $taxRate) / ($taxRate + 1), 2);
                $totalTax   +=  $taxAmount;

                $response->push([
                    'taxRule'   => $taxRules[$i],
                    'taxAmount' => $taxAmount
                ]);
            }

            return $response;
        }
    }
}