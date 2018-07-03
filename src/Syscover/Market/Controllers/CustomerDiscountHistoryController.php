<?php namespace Syscover\Market\Old\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Market\Old\Models\CustomerDiscountHistory;
use Illuminate\Http\Request;

/**
 * Class CustomerDiscountHistoryController
 * @package Syscover\Market\Controllers
 */

class CustomerDiscountHistoryController extends Controller
{
	protected $routeSuffix	= 'marketCustomerDiscountHistory';
	protected $folder	   	= 'customer_discount_history';
	protected $package	  	= 'market';
	protected $indexColumns	 	= ['id_126', 'name_text_value_126', 'coupon_code_126', 'discount_percentage_126', 'discount_amount_126', ['data' => 'free_shipping_126', 'type' => 'check']];
	protected $nameM		= 'coupon_code_126';
	protected $model		= CustomerDiscountHistory::class;
	protected $icon		 	= 'fa fa-shopping-cart';
	protected $objectTrans  = 'customer_discount';

	function __construct(Request $request)
	{
		parent::__construct($request);

		$this->viewParameters['editButton']         = false;
		$this->viewParameters['deleteButton']       = false;
		$this->viewParameters['deleteSelectButton'] = false;
		$this->viewParameters['cancelButton'] 		= false;
		$this->viewParameters['showButton'] 		= true;
	}

	public function showCustomRecord($parameters)
	{
		$parameters['ruleFamilies'] = array_map(function($object) {
			$object->name = trans_choice($object->name, 1);
			return $object;
		}, config('market.ruleFamilies'));

		$parameters['discountTypes'] = array_map(function($object) {
			$object->name = trans($object->name);
			return $object;
		}, config('market.discountTypes'));
		
		return $parameters;
	}
}