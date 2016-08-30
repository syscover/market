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
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('pulsar::pulsar.active'),
        'name' => 'active',
        'value' => 1,
        'checked' => old('active', isset($object->active_114)? $object->active_114 : null)
    ])
    <!-- /.market::order_status.create -->
@stop