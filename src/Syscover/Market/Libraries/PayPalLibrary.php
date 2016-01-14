<?php namespace Syscover\Market\Libraries;

class PayPalLibrary
{
    /**
     * Execute redirection to PayPal
     */
    public static function executeRedirection()
    {
        echo PayPalLibrary::createForm();
        echo '<script>document.forms["paypal_form"].submit();</script>';
    }

    /**
     * Generate form html
     *
     * @return string
     */
    public static function createForm()
    {
        $form='
            <form id="paypal_form" action="' . route('createMarketPayPalPayment') . '" method="post">
                <input type="hidden" name="_token" value="' . csrf_token() . '"/>
            </form>
        ';

        return $form;
    }
}