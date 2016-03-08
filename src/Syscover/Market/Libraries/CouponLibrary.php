<?php namespace Syscover\Market\Libraries;

use Syscover\Market\Models\CartPriceRule;
use Syscover\Shoppingcart\Facades\CartProvider;

class CouponLibrary
{
    /**
     * @param   string                          $couponCode
     * @param   string                          $instance       Cart instance
     * @param   \Illuminate\Auth\SessionGuard   $sessionGuard   request session guard to check if user is authenticated, for cases necessary
     * @return array
     */
    public static function checkCouponCode($couponCode, $sessionGuard = null, $instance = 'main')
    {
        $cart           = CartProvider::instance($instance);
        $cartPriceRule  = CartPriceRule::where('coupon_code_120', 'like', $couponCode)->first();
        $errors         = [];

        if($cartPriceRule == null)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 1,
                'message'   => 'This coupon code, doesn\'t exist',
                'data'      => [
                    'coupon_code'   =>  $couponCode
                ]
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
                    'message'   => 'User has to be authenticated to use this coupon code',
                    'data'      => [
                        'coupon_code'   =>  $couponCode
                    ]
                ];
            }
        }

        if($cartPriceRule != null && $cartPriceRule->uses_coupon_120 != null && $cartPriceRule->total_used_120 > $cartPriceRule->uses_coupon_120)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 3,
                'message'   => 'This coupon has already been used',
                'data'      => [
                    'coupon_code'   =>  $couponCode,
                    'uses_coupon'   =>  $cartPriceRule->uses_coupon_120,
                    'total_used'    =>  $cartPriceRule->total_used_120,
                ]
            ];
        }

        if($cartPriceRule != null && $cartPriceRule->enable_from_120 != null && date('U') < $cartPriceRule->enable_from_120)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 4,
                'message'   => 'This coupon is not yet in its period of validity',
                'data'      => [
                    'coupon_code'   =>  $couponCode
                ]
            ];
        }

        if($cartPriceRule != null && $cartPriceRule->enable_to_120 != null && date('U') > $cartPriceRule->enable_to_120)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 5,
                'message'   => 'This coupon is expired',
                'data'      => [
                    'coupon_code'   =>  $couponCode
                ]
            ];
        }

        if($cartPriceRule != null && $cartPriceRule->active_120 == false)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 6,
                'message'   => 'This coupon is inactive',
                'data'      => [
                    'coupon_code'   =>  $couponCode
                ]
            ];
        }

        if($cartPriceRule != null && $cartPriceRule->combinable_120 == false && $cart->hasCartPriceRuleNotCombinable == true)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 7,
                'message'   => 'This coupon is not combinable with other coupon',
                'data'      => [
                    'coupon_code'          =>  $couponCode,
                    'price_rule_in_cart'   =>  $cart->getCartPriceRuleNotCombinable()->toArray()
                ]
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

    /**
     * @param \Syscover\Shoppingcart\Libraries\Cart $cart
     * @param string                                $couponCode
     * @param \Illuminate\Auth\SessionGuard         $sessionGuard   request session guard to check if user is authenticated, for cases necessary
     */
    public static function addCouponCode($cart, $couponCode, $sessionGuard = null)
    {
        $response = CouponLibrary::checkCouponCode($couponCode, $sessionGuard);

        // check that rule its ok
        if($response['status'] == 'success')
        {
            $cartPriceRule  = CartPriceRule::where('coupon_code_120', 'like', $couponCode)->first();

            // add discount to cart
            $cart->addCartPriceRule($cartPriceRule);
        }
    }
}