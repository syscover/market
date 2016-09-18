@extends('pulsar::layouts.form', ['action' => 'update'])

@section('head')
    @parent
    <!-- market::paypal_settings.index -->
    @include('pulsar::includes.js.messages')
    <!-- /market::paypal_settings.index -->
@stop

@section('rows')
    <!-- market::paypal_settings.index -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('market::pulsar.items_list_description'),
        'name' => 'marketPayPalDescriptionItemList',
        'value' => $marketPayPalDescriptionItemList,
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 5,
        'label' => trans('market::pulsar.success_route'),
        'name' => 'marketPayPalSuccessRoute',
        'value' => $marketPayPalSuccessRoute,
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 5,
        'label' => trans('market::pulsar.error_route'),
        'name' => 'marketPayPalErrorRoute',
        'value' => $marketPayPalErrorRoute,
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 5,
        'label' => trans('market::pulsar.shipping_description'),
        'name' => 'marketPayPalShippingDescription',
        'value' => $marketPayPalShippingDescription,
        'required' => true
    ])
    <!-- /market::paypal_settings.index -->
@stop