<?php namespace Syscover\Market\Libraries;

class PayPalLibrary
{
    /**
     * Execute redirection to PayPal
     */
    public static function executeRedirection()
    {
        echo PayPalLibrary::createForm();
        echo '<script>document.forms["paypalForm"].submit();</script>';
    }

    /**
     * Generate form html
     *
     * @return string
     */
    public static function createForm($order)
    {
        $form='
            <form id="paypalForm" action="' . route('createMarketPayPalPayment') . '" method="post">
                <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                <input type="hidden" name="_order" value="' . $order . '"/>
            </form>
        ';

        return $form;
    }
}