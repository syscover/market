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
                'message'   => 'This coupon code, does not exist',
                'data'      => [
                    'couponCode' => $couponCode
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
                        'couponCode' => $couponCode
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
                    'couponCode'    => $couponCode,
                    'usesCoupon'    => $cartPriceRule->uses_coupon_120,
                    'totalUsed'     => $cartPriceRule->total_used_120,
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
                    'couponCode' => $couponCode
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
                    'couponCode' => $couponCode
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
                    'couponCode' => $couponCode
                ]
            ];
        }

        if($cartPriceRule != null && $cartPriceRule->combinable_120 == false && $cart->hasCartPriceRuleNotCombinable() == true)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 7,
                'message'   => 'This coupon is not combinable with other coupon',
                'data'      => [
                    'couponCode'                    => $couponCode,
                    'priceRuleInCartNotCombinable'  => $cart->getCartPriceRuleNotCombinable()->toArray()
                ]
            ];
        }

        // check if exist this cart price rule in cart
        if($cartPriceRule != null && $cart->hasCartPriceRule($cartPriceRule))
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 8,
                'message'   => 'This coupon already exist in cart',
                'data'      => [
                    'couponCode' => $couponCode
                ]
            ];
        }

        // check if is a free shipping and there isn't shipping and cart price rule, haven't any discount
        if($cartPriceRule != null && $cartPriceRule->free_shipping_120 && $cartPriceRule->discount_type_120 == 1 && !$cart->hasShipping())
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 9,
                'message'   => 'there are no shipping costs, this coupon is not necessary',
                'data'      => [
                    'couponCode' =>  $couponCode
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