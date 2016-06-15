<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Market\Models\CustomerDiscountHistory;
use Illuminate\Http\Request;

/**
 * Class CustomerDiscountHistoryController
 * @package Syscover\Market\Controllers
 */

class CustomerDiscountHistoryController extends Controller
{
	protected $routeSuffix	= 'marketOrder';
	protected $folder	   	= 'order';
	protected $package	  	= 'market';
	protected $aColumns	 	= ['id_126', 'coupon_code_126', 'free_shipping_126'];
	protected $nameM		= 'coupon_code_126';
	protected $model		= CustomerDiscountHistory::class;
	protected $icon		 	= 'fa fa-shopping-basket';
	protected $objectTrans  = 'order';

	function __construct(Request $request)
	{
		parent::__construct($request);

		// todo, provisional hasta establecer las accioner de la fila de productos
		$this->viewParameters['editButton']         = false;
		$this->viewParameters['deleteButton']       = false;
		$this->viewParameters['deleteSelectButton'] = false;
	}
}