<?php namespace Syscover\Market\Controllers;

use Syscover\Market\Models\Order;
use Syscover\Market\Models\OrderStatus;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;

/**
 * Class OrderController
 * @package Syscover\Market\Controllers
 */

class OrderController extends Controller
{
	use TraitController;

	protected $routeSuffix  = 'marketOrder';
	protected $folder	   = 'order';
	protected $package	  = 'market';
	protected $aColumns	 = ['id_116', 'date_116', 'date_text_116', 'customer_name_116', 'customer_surname_116', 'customer_email_116', 'customer_phone_116', 'name_114', 'total_116'];
	protected $nameM		= 'name_116';
	protected $model		= '\Syscover\Market\Models\Order';
	protected $icon		 = 'fa fa-shopping-basket';
	protected $objectTrans  = 'order';

	public function indexCustom($parameters)
	{
		// init record on tap 4
		$parameters['urlParameters']['tab']	 = 4;

		return $parameters;
	}

	public function customActionUrlParameters($actionUrlParameters, $parameters)
	{
		$actionUrlParameters['tab'] = 4;

		return $actionUrlParameters;
	}

	public function createCustomRecord($request, $parameters)
	{
		$parameters['orderStatus'] = OrderStatus::builder()->where('lang_114', session('baseLang')->id_001)->where('active_114', true)->get();

		return $parameters;
	}

	public function storeCustomRecord($request, $parameters)
	{
		$orderDate = date('U');

		Order::create([
			'group_116'					=> $request->input('group'),
			'date_116'					=> $request->has('date')? \DateTime::createFromFormat(config('pulsar.datePattern'), $request->input('date'))->getTimestamp() : $orderDate,
			'date_text_116'				=> $request->has('date')?  $request->input('date') : date(config('pulsar.datePattern') . ' H:i', $orderDate),
			'company_116'				=> empty($request->input('company'))? null : $request->input('company'),
			'tin_116'					=> empty($request->input('tin'))? null : $request->input('tin'),
			'gender_116'				=> empty($request->input('gender'))? null : $request->input('gender'),
			'name_116'					=> empty($request->input('name'))? null : $request->input('name'),
			'surname_116'				=> empty($request->input('surname'))? null : $request->input('surname'),
			'avatar_116'				=> empty($request->input('avatar'))? null : $request->input('avatar'),
			'birth_date_116'			=> $request->has('birthDate')? \DateTime::createFromFormat(config('pulsar.datePattern'), $request->input('birthDate'))->getTimestamp() : null,
			'email_116'					=> $request->input('email'),
			'phone_116'					=> empty($request->input('phone'))? null : $request->input('phone'),
			'mobile_116'				=> empty($request->input('phone'))? null : $request->input('mobile'),
			'user_116'					=> $request->input('user'),
			'password_116'				=> Hash::make($request->input('password')),
			'active_116'				=> $request->has('active'),
			'confirmed_116'				=> false,
			'country_116'				=> $request->has('country')? $request->input('country') : null,
			'territorial_area_1_116'	=> $request->has('territorialArea1')? $request->input('territorialArea1') : null,
			'territorial_area_2_116'	=> $request->has('territorialArea2')? $request->input('territorialArea2') : null,
			'territorial_area_3_116'	=> $request->has('territorialArea3')? $request->input('territorialArea3') : null,
			'cp_116'					=> empty($request->input('cp'))? null : $request->input('cp'),
			'locality_116'				=> empty($request->input('locality'))? null : $request->input('locality'),
			'address_116'				=> empty($request->input('address'))? null : $request->input('address'),
			'latitude_116'				=> empty($request->input('latitude'))? null : $request->input('latitude'),
			'longitude_116'				=> empty($request->input('longitude'))? null : $request->input('longitude'),
		]);

		OrderRow::create([
			'lang_117'					=> '',
			'order_117'					=> '',
			'product_117'				=> '',
			'name_117'					=> '',
			'description_117'			=> '',
			'data_117'					=> '',
			'discount_117'				=> '',
			'price_117'					=> '',
			'quantity_117'				=> '',
			'subtotal_117'				=> '',
			'discount_percentage_117'	=> '',
			'discount_amount_117'		=> '',
			'tax_amount_117'			=> '',
			'gift_117'					=> '',
			'gift_from_117'				=> '',
			'gift_to_117'				=> '',
			'gift_message_117'			=> '',
		]);
	}

	public function editCustomRecord($request, $parameters)
	{
		$parameters['groups']	   = Group::all();

		$parameters['genres']	   = array_map(function($object){
			$object->name = trans($object->name);
			return $object;
		}, config('pulsar.genres'));

		return $parameters;
	}

	public function updateCustomRecord($request, $parameters)
	{
		Order::where('id_116', $parameters['id'])->update([
			'group_116'					=> $request->input('group'),
			'date_116'					=> $request->has('date')? \DateTime::createFromFormat(config('pulsar.datePattern'), $request->input('date'))->getTimestamp() : null,
			'date_text_116'				=> $request->has('date')?  $request->input('date') : date(config('pulsar.datePattern') . ' H:i'),
			'company_116'				=> empty($request->input('company'))? null : $request->input('company'),
			'tin_116'					=> empty($request->input('tin'))? null : $request->input('tin'),
			'gender_116'				=> empty($request->input('gender'))? null : $request->input('gender'),
			'name_116'					=> empty($request->input('name'))? null : $request->input('name'),
			'surname_116'				=> empty($request->input('surname'))? null : $request->input('surname'),
			'avatar_116'				=> empty($request->input('avatar'))? null : $request->input('avatar'),
			'birth_date_116'			=> $request->has('birthDate')? \DateTime::createFromFormat(config('pulsar.datePattern'), $request->input('birthDate'))->getTimestamp() : null,
			'email_116'					=> $request->input('email'),
			'phone_116'					=> empty($request->input('phone'))? null : $request->input('phone'),
			'mobile_116'				=> empty($request->input('phone'))? null : $request->input('mobile'),
			'user_116'					=> $request->input('user'),
			'password_116'				=> Hash::make($request->input('password')),
			'active_116'				=> $request->has('active'),
			'country_116'				=> $request->has('country')? $request->input('country') : null,
			'territorial_area_1_116'	=> $request->has('territorialArea1')? $request->input('territorialArea1') : null,
			'territorial_area_2_116'	=> $request->has('territorialArea2')? $request->input('territorialArea2') : null,
			'territorial_area_3_116'	=> $request->has('territorialArea3')? $request->input('territorialArea3') : null,
			'cp_116'					=> empty($request->input('cp'))? null : $request->input('cp'),
			'locality_116'				=> empty($request->input('locality'))? null : $request->input('locality'),
			'address_116'				=> empty($request->input('address'))? null : $request->input('address'),
			'latitude_116'				=> empty($request->input('latitude'))? null : $request->input('latitude'),
			'longitude_116'				=> empty($request->input('longitude'))? null : $request->input('longitude'),
		]);
	}
}