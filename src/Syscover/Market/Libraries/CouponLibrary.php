<?php namespace Syscover\Market\Libraries;

use Syscover\Market\Models\CartPriceRule;
use Syscover\Market\Models\CustomerDiscountHistory;
use Syscover\ShoppingCart\Exceptions\ShoppingCartNotCombinablePriceRuleException;
use Syscover\ShoppingCart\Facades\CartProvider;
use Syscover\ShoppingCart\PriceRule;

class CouponLibrary
{
    /**
     * @param   string                          $couponCode
     * @param   string                          $lang           Check coupon code from this language
     * @param   string                          $instance       Cart instance
     * @param   \Illuminate\Auth\SessionGuard   $sessionGuard   request session guard to check if user is authenticated, for cases necessary
     * @return array
     */
    public static function checkCouponCode($couponCode, $lang, $sessionGuard = null, $instance = 'default')
    {


        $shoppingCart   = CartProvider::instance($instance);
        $cartPriceRule  = CartPriceRule::builder($lang)
            ->where('coupon_code_120', 'like', $couponCode)
            ->first();
        $errors         = [];

        if($cartPriceRule == null)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 1,
                'message'   => 'This coupon code, does not exist',
                'trans'     => trans('market::pulsar.error_coupon_code_01'),
                'data'      => [
                    'couponCode' => $couponCode
                ]
            ];
        }

        //check if this coupon has exceeded limit of use
        if($cartPriceRule != null && $cartPriceRule->uses_coupon_120 != null && $cartPriceRule->total_used_120 >= $cartPriceRule->uses_coupon_120)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 3,
                'message'   => 'This coupon has exceeded the limit of uses',
                'trans'     => trans('market::pulsar.error_coupon_code_03'),
                'data'      => [
                    'couponCode'    => $couponCode,
                    'usesCoupon'    => $cartPriceRule->uses_coupon_120,
                    'totalUsed'     => $cartPriceRule->total_used_120,
                ]
            ];
        }

        if($cartPriceRule != null && $sessionGuard != null && $cartPriceRule->uses_customer_120 != null && $cartPriceRule->uses_customer_120 > 0)
        {
            // need to be loged to use this coupon
            if($sessionGuard->guest())
            {
                $errors[] = [
                    'status'    => 'error',
                    'code'      => 2,
                    'message'   => 'User has to be authenticated to use this coupon code',
                    'trans'     => trans('market::pulsar.error_coupon_code_02'),
                    'data'      => [
                        'couponCode' => $couponCode
                    ]
                ];
            }
            elseif(CustomerDiscountHistory::builder()->where('customer_id_126', auth('crm')->user()->id_301)->where('coupon_code_126', $couponCode)->where('active_126', true)->count() >= $cartPriceRule->uses_customer_120)
            {
                $errors[] = [
                    'status'    => 'error',
                    'code'      => 10,
                    'message'   => 'User has exceeded the limit of uses',
                    'trans'     => trans('market::pulsar.error_coupon_code_10'),
                    'data'      => [
                        'couponCode' => $couponCode
                    ]
                ];
            }
        }

        if($cartPriceRule != null && $cartPriceRule->enable_from_120 != null && date('U') < $cartPriceRule->enable_from_120)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 4,
                'message'   => 'This coupon is not yet in its period of validity',
                'trans'     => trans('market::pulsar.error_coupon_code_04'),
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
                'trans'     => trans('market::pulsar.error_coupon_code_05'),
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
                'trans'     => trans('market::pulsar.error_coupon_code_06'),
                'data'      => [
                    'couponCode' => $couponCode
                ]
            ];
        }

        if($cartPriceRule != null && $cartPriceRule->combinable_120 == false && $shoppingCart->hasCartPriceRuleNotCombinable() == true)
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 7,
                'message'   => 'This coupon is not combinable with other coupon',
                'trans'     => trans('market::pulsar.error_coupon_code_07'),
                'data'      => [
                    'couponCode'                    => $couponCode,
                    'priceRuleInCartNotCombinable'  => $shoppingCart->getCartPriceRuleNotCombinable()->toArray()
                ]
            ];
        }

        // check if exist this cart price rule in cart
        if($cartPriceRule != null && $shoppingCart->getPriceRules()->has($cartPriceRule->id))
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 8,
                'message'   => 'This coupon already exist in cart',
                'trans'     => trans('market::pulsar.error_coupon_code_08'),
                'data'      => [
                    'couponCode' => $couponCode
                ]
            ];
        }

        // check if is a free shipping and there isn't shipping and cart price rule, haven't any discount
        if($cartPriceRule != null && $cartPriceRule->free_shipping_120 && $cartPriceRule->discount_type_id_120 == 1 && ! $shoppingCart->hasShipping())
        {
            $errors[] = [
                'status'    => 'error',
                'code'      => 9,
                'message'   => 'there are no shipping costs, this coupon is not necessary',
                'trans'     => trans('market::pulsar.error_coupon_code_09'),
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
     * @param \Syscover\ShoppingCart\Cart           $shoppingCart
     * @param string                                $couponCode
     * @param string                                $lang           add coupon code from this language
     * @param \Illuminate\Auth\SessionGuard         $sessionGuard   request session guard to check if user is authenticated, for cases necessary
     * @return null | \Syscover\Market\Models\CartPriceRule
     */
    public static function addCouponCode($shoppingCart, $couponCode, $lang, $sessionGuard = null)
    {
        $response       = CouponLibrary::checkCouponCode($couponCode, $lang, $sessionGuard);
        $cartPriceRule  = null;

        // check that rule its ok
        if($response['status'] == 'success')
        {
            $cartPriceRule = CartPriceRule::builder($lang)->where('coupon_code_120', 'like', $couponCode)->first();

            if($cartPriceRule != null)
            {
                try
                {
                    CartProvider::instance()->addCartPriceRule(
                        new PriceRule(
                            $cartPriceRule->name_text_value,
                            $cartPriceRule->description_text_value,
                            $cartPriceRule->discount_type_id_120,
                            $cartPriceRule->free_shipping_120,
                            $cartPriceRule->discount_fixed_amount_120,
                            $cartPriceRule->discount_percentage_120,
                            $cartPriceRule->maximum_discount_amount_120,
                            $cartPriceRule->apply_shipping_amount_120,
                            $cartPriceRule->combinable_120
                        )
                    );
                }
                catch (ShoppingCartNotCombinablePriceRuleException $e)
                {
                    dd($e->getMessage());
                }
                catch (\Exception $e)
                {
                    dd($e->getMessage());
                }
            }
            else
            {
                dd("this coupon number not exist");
            }
        }

        return $cartPriceRule;
    }
}