<?php namespace Syscover\Market\Libraries;

use Gloudemans\Shoppingcart\Facades\Cart;
use Syscover\Market\Models\CartPriceRule;

class CouponLibrary
{
    /**
     * @param   $couponCode
     * @param   null $sessionGuard
     * @return  array
     */
    public static function checkCouponCode($couponCode, $sessionGuard = null)
    {
        $cartPriceRule  = CartPriceRule::where('coupon_code_120', 'like', $couponCode)->first();
        $errors         = [];

        if($cartPriceRule == null)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 1,
                'message'   => 'This coupon code, doesn\'t exist'
            ];
        }

        if($cartPriceRule != null && $sessionGuard != null && $cartPriceRule->uses_customer_120 != null && $cartPriceRule->uses_customer_120 > 0)
        {
            // se requiere que el usuario está autentificado para comprobar el número de usos por cupon
            if($sessionGuard->guest())
            {
                $errors[] = [
                    'status'    => 'error',
                    'code'      => 2,
                    'message'   => 'User has to be authenticated to use this coupon code'
                ];
            }
        }

        if($cartPriceRule != null && $cartPriceRule->uses_coupon_120 != null && $cartPriceRule->uses_coupon_120 >= $cartPriceRule->total_used_120)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 3,
                'message'   => 'This coupon has already been claimed'
            ];
        }

        if($cartPriceRule != null && $cartPriceRule->enable_from_120 != null && date('U') < $cartPriceRule->enable_from_120)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 4,
                'message'   => 'This coupon is not yet in its period of validity'
            ];
        }

        if($cartPriceRule != null && $cartPriceRule->enable_to_120 != null && date('U') > $cartPriceRule->enable_to_120)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 5,
                'message'   => 'This coupon is expired'
            ];
        }

        if($cartPriceRule != null && $cartPriceRule->active_120 == false)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 6,
                'message'   => 'This coupon is inactive'
            ];
        }

        if(count($errors) > 0)
        {
            return [
                'status'    => 'error',
                'errors'    => $errors
            ];
        }
        else
        {
            return [
                'status'        => 'success',
                'couponCode'    => $couponCode
            ];
        }
    }

    public static function applyCouponCode($couponCode, $sessionGuard = null)
    {
        $response = CouponLibrary::checkCouponCode($couponCode, $sessionGuard);

        if($response['status'] == 'success')
        {
            $cart = Cart::total();



            foreach($cart as $row)
            {
                if(is_numeric($request->input($row->rowid)))
                    Cart::update($row->rowid, (int)$request->input($row->rowid));
            }
        }
    }
}