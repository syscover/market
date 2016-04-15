@extends('pulsar::layouts.tab', ['tabs' => [
		['id' => 'box_tab1', 'name' => trans('market::pulsar.order_data')],
		['id' => 'box_tab2', 'name' => trans('market::pulsar.customer_data')],
	]])

@section('head')
	@parent
	<link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/mappoint/css/mappoint.css') }}">
	<link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/attachment/css/attachment-library.css') }}">
	<link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.css') }}">
	<link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.css') }}">
	<link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/css/getfile.css') }}">
	<link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/select-listdescription/select-listdescription.css') }}">
	<link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/magnific-popup.css') }}">

	<script src="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/vendor/jquery.element-table/jquery.element-table.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/vendor/getaddress/js/jquery.getaddress.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.min.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cssloader/js/jquery.cssloader.min.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/mobiledetect/mdetect.min.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.min.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/vendor/getfile/js/jquery.getfile.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/vendor/speakingurl/speakingurl.min.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/vendor/duallistbox/jquery.duallistbox.1.3.1.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/vendor/datetimepicker/js/moment.min.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="{{ asset('packages/syscover/pulsar/plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
<!--	<script src="{{ asset('packages/syscover/pulsar/vendor/mappoint/js/jquery.mappoint.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key={{ config('api.googleMapsApiKey') }}&libraries=places"></script> -->
	<script src="{{ asset('packages/syscover/pulsar/vendor/attachment/js/attachment-library.js') }}"></script>

	@include('pulsar::includes.html.froala_references')

	<script>
		$(document).ready(function() {
			$.getAddress({
				id:						 '01',
				type:					   'laravel',
				appName:					'pulsar',
				token:					  '{{ csrf_token() }}',
				lang:					   '{{ config('app.locale') }}',
				highlightCountrys:		  ['ES','US'],

				useSeparatorHighlight:	  true,
				textSeparatorHighlight:	 '------------------',

				countryValue:			   '{{ old('country') }}',
				territorialArea1Value:	  '{{ old('territorialArea1') }}',
				territorialArea2Value:	  '{{ old('territorialArea2') }}',
				territorialArea3Value:	  '{{ old('territorialArea3') }}'
			});

			$.getAddress({
				id:						 '02',
				type:					   'laravel',
				appName:					'pulsar',
				token:					  '{{ csrf_token() }}',
				lang:					   '{{ config('app.locale') }}',
				highlightCountrys:		  ['ES','US'],

				useSeparatorHighlight:	  true,
				textSeparatorHighlight:	 '------------------',

				tA1Wrapper:					'billingTerritorialArea1Wrapper',
				tA2Wrapper:					'billingTerritorialArea2Wrapper',
				tA3Wrapper:					'billingTerritorialArea3Wrapper',
				tA1Label:				   'billingTerritorialArea1Label',
				tA2Label:				   'billingTerritorialArea2Label',
				tA3Label:				   'billingTerritorialArea3Label',
				countrySelect:			  'billingCountry',
				tA1Select:				  'billingTerritorialArea1',
				tA2Select:				  'billingTerritorialArea2',
				tA3Select:				  'billingTerritorialArea3',

				countryValue:			   '{{ old('billingCountry') }}',
				territorialArea1Value:	  '{{ old('billingTerritorialArea1') }}',
				territorialArea2Value:	  '{{ old('billingTerritorialArea2') }}',
				territorialArea3Value:	  '{{ old('billingTerritorialArea3') }}'
			});
/*
			$.mapPoint({
				id: '01',
				urlPlugin: '/packages/syscover/pulsar/vendor',
				customIcon: {
					src: '/packages/syscover/hotels/images/location.svg',
					scaledWidth: 49,
					scaledHeight: 71,
					anchorX: 25,
					anchorY: 71
				}
			});
*/
			$('.wysiwyg').froalaEditor({
				language: '{{ config('app.locale') }}',
				toolbarInline: false,
				toolbarSticky: true,
				tabSpaces: true,
				shortcutsEnabled: ['show', 'bold', 'italic', 'underline', 'strikeThrough', 'indent', 'outdent', 'undo', 'redo', 'insertImage', 'createLink'],
				toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'insertHR', 'insertLink', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
				heightMin: 130,
				enter: $.FroalaEditor.ENTER_BR,
				key: '{{ config('pulsar.froalaEditorKey') }}'
			});

			$('input[name="isgift"]').change(function() {
				if ($('input[name="isgift"]').is(':checked')) {$('#gift_fields').slideDown('slow');}
				else {$('#gift_fields').slideUp('slow');}
			});

			$('.tabbable li:eq({{ $tab }}) a').tab('show');
		});
	</script>
@stop

@section('layoutTabHeader')
	@include('pulsar::includes.html.form_record_header', ['action' => 'store'])
@stop
@section('layoutTabFooter')
	@include('pulsar::includes.html.form_record_footer', ['action' => 'store'])
@stop

@section('box_tab1')
		<!-- market::order.create/tab1 -->
		<div class="row">
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'labelSize' => 4,
					'fieldSize' => 4,
					'name' => 'id',
					'label' => 'ID',
					'value' => old('id', isset($object->id_116)? $object->id_116 : null),
					'readOnly' => true
				])
				@include('pulsar::includes.html.form_select_group', [
					'labelSize' => 4,
					'fieldSize' => 8,
					'name' => 'status',
					'label' => trans('market::pulsar.order_status'),
					'value' => old('status', isset($object->status_116)? $object->status_116 : null),
					'objects' => $ordersStatus,
					'idSelect' => 'id_114',
					'nameSelect' => 'name_114',
				])
				@include('pulsar::includes.html.form_select_group', [
					'labelSize' => 4,
					'fieldSize' => 8,
					'name' => 'paymentMethod',
					'label' => trans_choice('market::pulsar.payment_method', 1),
					'value' => old('orderStatus', isset($object->payment_method_116)? $object->payment_method_116 : null),
					'objects' => $paymentsMethod,
					'idSelect' => 'id_115',
					'nameSelect' => 'name_115',
				])
			</div>
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'labelSize' => 4,
					'fieldSize' => 8,
					'name' => 'ip',
					'label' => trans('pulsar::pulsar.ip'),
					'value' => old('ip', isset($object->ip_116)? $object->ip_116 : null),
					'id' => 'ip',
					'readOnly' => true,
				])
				@include('pulsar::includes.html.form_datetimepicker_group', [
					'labelSize' => 4,
					'fieldSize' => 6,
					'label' => trans_choice('pulsar::pulsar.date', 1),
					'name' => 'date',
					'data' => [
						'format' => Miscellaneous::convertFormatDate(config('pulsar.datePattern')),
						'locale' => config('app.locale'),
						'default-date' => old('date', isset($object->date_116)? date('Y-m-d', $object->date_116) : null)
					]
				])
				@include('pulsar::includes.html.form_text_group', [
					'labelSize' => 4,
					'fieldSize' => 8,
					'name' => 'paymentId',
					'label' => trans('market::pulsar.payment_id'),
					'value' => old('paymentId', isset($object->payment_id_116)? $object->payment_id_116 : null),
					'readOnly' => true,
				])
			</div>
		</div>



		@include('pulsar::includes.html.form_section_header', [
			'label' => trans('market::pulsar.gift'),
			'icon' => 'fa fa-gift'
		])
		<div class="row">
			<div class="col-md-6">
				@include('pulsar::includes.html.form_checkbox_group', [
					'labelSize' => 4,
					'fieldSize' => 8,
					'name' => 'gift',
					'label' => trans('market::pulsar.gift'),
					'value' => 1,
					'checked' => old('gift', isset($object->gift_116)? $object->gift_116 : null)
				])
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'labelSize' => 4,
					'fieldSize' => 8,
					'name' => 'mobile',
					'label' => trans('pulsar::pulsar.from'),
					'value' => old('from', isset($object->gift_from_116)? $object->gift_from_116 : null),
					'maxLength' => '255',
					'rangeLength' => '2,255'
				])
			</div>
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'labelSize' => 4,
					'fieldSize' => 8,
					'name' => 'mobile',
					'label' => trans('pulsar::pulsar.to'),
					'value' => old('to', isset($object->gift_to_116)? $object->gift_to_116 : null),
					'maxLength' => '255',
					'rangeLength' => '2,255'
				])
			</div>
		</div>
		<!-- /.market::order.create/tab1 -->
@stop

@section('box_tab2')
		<!-- market::order.create/tab2 -->
		<div class="row">
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'id',
					'label' => 'ID',
					'value' => old('id'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'readOnly' => true,
				])
				@include('pulsar::includes.html.form_select_group', [
					'name' => 'orderStatus',
					'label' => trans('market::pulsar.order_status'),
					'value' => old('orderStatus'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'objects' => $ordersStatus,
					'idSelect' => 'id_114',
					'nameSelect' => 'name_114',
				])
				@include('pulsar::includes.html.form_select_group', [
					'name' => 'orderStatus',			// <===================================================== !!
					'label' => trans('market::pulsar.order_payment_method'),
					'value' => old('orderStatus'),		// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'objects' => $ordersStatus,
					'idSelect' => 'id_114',
					'nameSelect' => 'name_114',
				])
			</div>
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'ip',
					'label' => trans('pulsar::pulsar.ip'),
					'value' => '',
					'labelSize' => 4,
					'fieldSize' => 8,
					'id' => 'ip',
					'readOnly' => true,
				])
				@include('pulsar::includes.html.form_datetimepicker_group', [
					'name' => 'date',
					'label' => trans_choice('pulsar::pulsar.date', 1),
					'value' => old('date', date(config('pulsar.datePattern'))),
					'labelSize' => 4,
					'fieldSize' => 8,
					'containerId' => 'dateContent',
					'id' => 'idDate',
					'data' => [
						'format' => Miscellaneous::convertFormatDate(config('pulsar.datePattern')),
						'locale' => config('app.locale')
					]
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'tin',				// <===================================================== !!
					'label' => trans('market::pulsar.order_number'),
					'value' => old('tin'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '255',
					'rangeLength' => '2,255'
				])
			</div>
		</div>

		@include('pulsar::includes.html.form_section_header', ['label' => '&nbsp; ' . trans('market::pulsar.order_section_invoice_data'), 'icon' => 'fa fa-file-text-o'])
		<div class="row">
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'tin',
					'label' => trans('market::pulsar.order_customer_tin'),
					'value' => old('tin'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '255',
					'rangeLength' => '2,255'
				])
			</div>
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'company',
					'label' => trans_choice('pulsar::pulsar.company', 1),
					'value' => old('company'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '255',
					'rangeLength' => '2,255'
				])
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'name',
					'label' => trans('pulsar::pulsar.name'),
					'value' => old('name'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',
					'label' => trans('pulsar::pulsar.surname'),
					'value' => old('surname'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => trans_choice('pulsar::pulsar.address', 1),
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => trans('market::pulsar.order_invoice_shipping_zipcode'),
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => trans('market::pulsar.order_invoice_shipping_locality'),
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => 'Provincia',				// <===================================================== !!
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
			</div>
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'email',
					'label' => trans('pulsar::pulsar.email'),
					'value' => old('email'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50',
					'type' => 'email',
					'required' => true
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'phone',
					'label' => trans_choice('pulsar::pulsar.phone', 1),
					'value' => old('phone'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'mobile',
					'label' => trans('pulsar::pulsar.mobile'),
					'value' => old('mobile'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => trans_choice('pulsar::pulsar.country', 1),
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => trans('market::pulsar.order_invoice_shipping_latitude'),
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,100'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => trans('market::pulsar.order_invoice_shipping_longitude'),
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,100'
				])
			</div>
		</div>

		@include('pulsar::includes.html.form_section_header', ['label' => '&nbsp; ' . trans('market::pulsar.order_section_shipping_data'), 'icon' => 'fa fa-file-text'])
		<div class="row">
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'tin',
					'label' => trans('market::pulsar.order_customer_tin'),
					'value' => old('tin'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '255',
					'rangeLength' => '2,255'
				])
			</div>
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'company',
					'label' => trans_choice('pulsar::pulsar.company', 1),
					'value' => old('company'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '255',
					'rangeLength' => '2,255'
				])
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'name',
					'label' => trans('pulsar::pulsar.name'),
					'value' => old('name'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',
					'label' => trans('pulsar::pulsar.surname'),
					'value' => old('surname'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => trans('market::pulsar.order_invoice_shipping_address'),
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => trans('market::pulsar.order_invoice_shipping_zipcode'),
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => trans('market::pulsar.order_invoice_shipping_locality'),
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
			</div>
			<div class="col-md-6">
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'email',
					'label' => trans('pulsar::pulsar.email'),
					'value' => old('email'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50',
					'type' => 'email',
					'required' => true
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'phone',
					'label' => trans_choice('pulsar::pulsar.phone', 1),
					'value' => old('phone'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'mobile',
					'label' => trans('pulsar::pulsar.mobile'),
					'value' => old('mobile'),
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => trans_choice('pulsar::pulsar.country', 1),
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
				@include('pulsar::includes.html.form_text_group', [
					'name' => 'surname',				// <===================================================== !!
					'label' => 'Provincia',				// <===================================================== !!
					'value' => old('surname'),			// <===================================================== !!
					'labelSize' => 4,
					'fieldSize' => 8,
					'maxLength' => '50',
					'rangeLength' => '2,50'
				])
			</div>
		</div>
		<!-- /market::order.create/tab2 -->
@stop

@section('endBody')
@stop
