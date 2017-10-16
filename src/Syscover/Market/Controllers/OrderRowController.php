<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Market\Models\OrderRow;
use Illuminate\Http\Request;

/**
 * Class OrderRowController
 * @package Syscover\Market\Controllers
 */

class OrderRowController extends Controller
{
	protected $routeSuffix	= 'marketOrder';
	protected $folder	   	= 'order';
	protected $package	  	= 'market';
	protected $indexColumns	 	= ['name_117', 'quantity_117', 'subtotal_117', 'discount_amount_117', 'subtotal_with_discounts_117', 'tax_amount_117', 'total_117', ['type' => 'gift', 'data' => 'has_gift_117'], ['type' => 'data', 'data' => 'data_117']];
	protected $nameM		= 'name_117';
	protected $model		= OrderRow::class;
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

	public function customIndex($parameters)
	{
		// init record on tap 4
		//$parameters['urlParameters']['tab']	 = 1;

		return $parameters;
	}

	public function customActionUrlParameters($actionUrlParameters, $parameters)
	{
		//$actionUrlParameters['tab'] 		= 1;
		//$actionUrlParameters['modal']   	= true;
		//$actionUrlParameters['ref']     	= $parameters['ref'];

		return $actionUrlParameters;
	}

	public function customColumnType($row, $indexColumn, $aObject)
	{
		switch ($indexColumn['type'])
		{
			case 'data':
                $dataRow = json_decode($aObject->{$indexColumn['data']}, true);
				$row[] = isset($dataRow['info'])? '<a class="ajax-magnific-popup" href="' . route('apiGetDataMarketOrderRow', ['id' => $aObject->id_117]) . '"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i></a>' : null;
				break;
            case 'gift':
                $row[] = $aObject->{$indexColumn['data']}? '<a class="ajax-magnific-popup" href="' . route('apiGetGiftMarketOrderRow', ['id' => $aObject->id_117]) . '"><i class="fa fa-gift fa-lg" aria-hidden="true"></i></a>' : null;
                break;
		}

		return $row;
	}

//	public function createCustomRecord($parameters)
//	{
//		$parameters['ordersStatus'] = OrderStatus::builder()
//			->where('lang_id_114', base_lang2()->id_001)
//			->where('active_114', true)
//			->get();
//
//		$parameters['paymentsMethod'] = PaymentMethod::builder()
//			->where('lang_id_115', base_lang2()->id_001)
//			->where('active_115', true)
//			->get();
//
//
//		return $parameters;
//	}
//
//	public function storeCustomRecord($parameters)
//	{
//		$orderDate = date('U');
//
//		Order::create([
//			'group_116'					=> $this->request->input('group'),
//			'date_116'					=> $this->request->input('date')? \DateTime::createFromFormat(config('pulsar.datePattern'), $this->request->input('date'))->getTimestamp() : $orderDate,
//			'date_text_116'				=> $this->request->input('date')?  $this->request->input('date') : date(config('pulsar.datePattern') . ' H:i', $orderDate),
//			'company_116'				=> empty($this->request->input('company'))? null : $this->request->input('company'),
//			'tin_116'					=> empty($this->request->input('tin'))? null : $this->request->input('tin'),
//			'gender_116'				=> empty($this->request->input('gender'))? null : $this->request->input('gender'),
//			'name_116'					=> empty($this->request->input('name'))? null : $this->request->input('name'),
//			'surname_116'				=> empty($this->request->input('surname'))? null : $this->request->input('surname'),
//			'avatar_116'				=> empty($this->request->input('avatar'))? null : $this->request->input('avatar'),
//			'birth_date_116'			=> $this->request->input('birthDate')? \DateTime::createFromFormat(config('pulsar.datePattern'), $this->request->input('birthDate'))->getTimestamp() : null,
//			'email_116'					=> $this->request->input('email'),
//			'phone_116'					=> empty($this->request->input('phone'))? null : $this->request->input('phone'),
//			'mobile_116'				=> empty($this->request->input('phone'))? null : $this->request->input('mobile'),
//			'user_116'					=> $this->request->input('user'),
//			'password_116'				=> Hash::make($this->request->input('password')),
//			'active_116'				=> $this->request->has('active'),
//			'confirmed_116'				=> false,
//			'country_116'				=> $this->request->has('country')? $this->request->input('country') : null,
//			'territorial_area_1_116'	=> $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
//			'territorial_area_2_116'	=> $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
//			'territorial_area_3_116'	=> $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
//			'cp_116'					=> empty($this->request->input('cp'))? null : $this->request->input('cp'),
//			'locality_116'				=> empty($this->request->input('locality'))? null : $this->request->input('locality'),
//			'address_116'				=> empty($this->request->input('address'))? null : $this->request->input('address'),
//			'latitude_116'				=> empty($this->request->input('latitude'))? null : $this->request->input('latitude'),
//			'longitude_116'				=> empty($this->request->input('longitude'))? null : $this->request->input('longitude'),
//		]);
//
//		OrderRow::create([
//			'lang_id_117'				=> '',
//			'order_id_117'				=> '',
//			'product_id_117'			=> '',
//			'name_117'					=> '',
//			'description_117'			=> '',
//			'data_117'					=> '',
//			'discount_117'				=> '',
//			'price_117'					=> '',
//			'quantity_117'				=> '',
//			'subtotal_117'				=> '',
//			'discount_percentage_117'	=> '',
//			'discount_amount_117'		=> '',
//			'tax_amount_117'			=> '',
//			'has_gift_117'			    => '',
//			'gift_from_117'				=> '',
//			'gift_to_117'				=> '',
//			'gift_message_117'			=> '',
//		]);
//	}
//
//	public function editCustomRecord($parameters)
//	{
//		$parameters['ordersStatus'] = OrderStatus::builder()
//			->where('lang_id_114', base_lang2()->id_001)
//			->where('active_114', true)
//			->get();
//
//		$parameters['paymentsMethod'] = PaymentMethod::builder()
//			->where('lang_id_115', base_lang2()->id_001)
//			->where('active_115', true)
//			->get();
//
//
//		$parameters['aliasCustomer'] = $parameters['object']->getCustomer->getIdentifierName();
//
//		return $parameters;
//	}
//
//	public function updateCustomRecord($parameters)
//	{
//		Order::where('id_116', $parameters['id'])->update([
//			'status_id_116'			=> $this->request->input('status'),
//			'payment_method_id_116'	=> $this->request->input('paymentMethod'),
//			'comments_116'			=> $this->request->has('comments')? $this->request->input('comments') : null,
//			'has_gift_116'			=> $this->request->has('gift'),
//			'gift_from_116'			=> $this->request->has('giftFrom')? $this->request->input('giftFrom') : null,
//			'gift_to_116'			=> $this->request->has('giftTo')? $this->request->input('giftTo') : null,
//			'gift_message_116'		=> $this->request->has('giftMessage')? $this->request->input('giftMessage') : null,
//			'customer_id_116'		=> $this->request->input('customerId'),
//			'customer_company_116'	=> $this->request->has('customerCompany')? $this->request->input('customerCompany') : null,
//			'customer_tin_116'		=> $this->request->has('customerTin')? $this->request->input('customerTin') : null,
//			'customer_name_116'		=> $this->request->has('customerName')? $this->request->input('customerName') : null,
//			'customer_surname_116'	=> $this->request->has('customerSurname')? $this->request->input('customerSurname') : null,
//			'customer_email_116'	=> $this->request->input('customerEmail'),
//			'customer_phone_116'	=> $this->request->has('customerPhone')? $this->request->input('customerPhone') : null,
//			'customer_mobile_116'	=> $this->request->has('customerMobile')? $this->request->input('customerMobile') : null,
//			'has_shipping_116'		=> $this->request->has('shipping'),
//			'shipping_company_116'	=> $this->request->has('shippingCompany')? $this->request->input('shippingCompany') : null,
//			'shipping_name_116'		=> $this->request->has('shippingName')? $this->request->input('shippingName') : null,
//			'shipping_surname_116'	=> $this->request->has('shippingSurname')? $this->request->input('shippingSurname') : null,
//			'shipping_email_116'	=> $this->request->has('shippingEmail')? $this->request->input('shippingEmail') : null,
//			'shipping_phone_116'	=> $this->request->has('shippingPhone')? $this->request->input('shippingPhone') : null,
//			'shipping_mobile_116'	=> $this->request->has('shippingMobile')? $this->request->input('shippingMobile') : null,
//		]);
//	}

    public function apiGetGiftRow()
    {
        $parameters = $this->request->route()->parameters();

        $orderRow = OrderRow::builder(base_lang2())->where('id_117', $parameters['id'])->first();

        if($orderRow->has_gift_117)
        {
            $data = [
                ['trans' => trans('pulsar::pulsar.from'),       'value' => $orderRow->gift_from_117],
                ['trans' => trans('pulsar::pulsar.to'),         'value' => $orderRow->gift_to_117],
                ['trans' => trans('pulsar::pulsar.message'),    'value' => $orderRow->gift_message_117]
            ];
        }
        else
        {
            $data = [];
        }

        return view('market::order.info_modal', ['info' => $data]);
    }

	public function apiGetDataRow()
	{
		$parameters = $this->request->route()->parameters();
		
		$orderRow = OrderRow::builder(base_lang2())->where('id_117', $parameters['id'])->first();

		// get object from json, and convert to array
		$data = json_decode($orderRow->data_117, true);

		return view('market::order.info_modal', $data);
	}
}