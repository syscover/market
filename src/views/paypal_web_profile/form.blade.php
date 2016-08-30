@extends('pulsar::layouts.form')

@section('head')
    @parent
    @include('pulsar::includes.js.delete_translation_record')
@stop

@section('rows')
    <!-- market::order_status.create -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => old('id', isset($object)? $object->getId() : null),
        'readOnly' => true,
        'fieldSize' => 7
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.name', 1),
        'name' => 'name',
        'value' => old('name', isset($object)? $object->getName() : null),
        'required' => true
    ])
    @include('pulsar::includes.html.form_select_group', [
        'label' => trans('market::pulsar.landing_page'),
        'name' => 'landingPageType',
        'value' => old('landingPageType', isset($object)? $object->getFlowConfig()->getLandingPageType() : null),
        'required' => true,
        'objects' => $landingPageTypes,
        'idSelect' => 'id',
        'nameSelect' => 'name',
        'fieldSize' => 4,
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('market::pulsar.url_after_bank_transfer'),
        'name' => 'bankTxnPendingUrl',
        'value' => old('bankTxnPendingUrl', isset($object)? $object->getFlowConfig()->getBankTxnPendingUrl() : null),
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('market::pulsar.url_logo'),
        'name' => 'logoImage',
        'value' => old('logoImage', isset($object)? $object->getPresentation()->getLogoImage() : null),
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('market::pulsar.brand_name'),
        'name' => 'brandName',
        'value' => old('brandName', isset($object)? $object->getPresentation()->getBrandName() : null),
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('market::pulsar.local_code'),
        'name' => 'localCode',
        'value' => old('localCode', isset($object)? $object->getPresentation()->getLocaleCode() : null),
        'fieldSize' => 2,
        'required' => true
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('market::pulsar.allow_note'),
        'name' => 'allowNote',
        'value' => 1,
        'checked' => old('allowNote', isset($object)? $object->getInputFields()->getAllowNote() : null)
    ])
    @include('pulsar::includes.html.form_select_group', [
        'label' => trans('market::pulsar.shipping_data_type'),
        'name' => 'shippingDataType',
        'value' => old('shippingDataType', isset($object)? $object->getInputFields()->getNoShipping() : null),
        'required' => true,
        'objects' => $shippingDataTypes,
        'idSelect' => 'id',
        'nameSelect' => 'name',
        'fieldSize' => 4,
        'required' => true
    ])
    @include('pulsar::includes.html.form_select_group', [
        'label' => trans('market::pulsar.display_shipping_data_type'),
        'name' => 'displayShippingDataType',
        'value' => old('displayShippingDataType', isset($object)? $object->getInputFields()->getAddressOverride() : null),
        'required' => true,
        'objects' => $displayShippingDataTypes,
        'idSelect' => 'id',
        'nameSelect' => 'name',
        'fieldSize' => 4,
        'required' => true
    ])
    <!-- /.market::order_status.create -->
@stop