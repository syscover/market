<?php namespace Syscover\Market\Old\Middleware;

use Closure;

class TaxRule
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth('crm')->check())
        {
            $customer = auth('crm')->user();

            if(! empty($customer->country_id_301))
            {
                // set country tax rule
                config(['market.taxCountry' => $customer->country_id_301]);
            }

            if($customer->classTax != null)
            {
                // set group customer
                config(['market.taxCustomerClass' => $customer->classTax]);
            }
        }
        return $next($request);
    }
}
