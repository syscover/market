@extends('pulsar::layouts.form', ['action' => 'update', 'cancelButton' => false])

@section('script')
    @parent
    <!-- market::paypal_settings.index -->
    <link href="{{ asset('packages/syscover/pulsar/vendor/pnotify/pnotify.custom.min.css') }}" type="text/css" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/pnotify/pnotify.custom.min.js') }}"></script>
    @include('pulsar::includes.js.success_message')
    <!-- ./market::paypal_settings.index -->
@stop

@section('rows')
    <!-- market::paypal_settings.index -->
    @include('pulsar::includes.html.form_text_group', ['label' => trans('market::pulsar.items_list_description'), 'name' => 'marketPayPalDescriptionItemList', 'value' => $marketPayPalDescriptionItemList, 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['fieldSize' => 5, 'label' => trans('market::pulsar.success_route'), 'name' => 'marketPayPalSuccessRoute', 'value' => $marketPayPalSuccessRoute, 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['fieldSize' => 5, 'label' => trans('market::pulsar.error_route'), 'name' => 'marketPayPalErrorRoute', 'value' => $marketPayPalErrorRoute, 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['fieldSize' => 5, 'label' => trans('market::pulsar.shipping_description'), 'name' => 'marketPayPalShippingDescription', 'value' => $marketPayPalShippingDescription, 'required' => true])
    <!-- ./market::paypal_settings.index -->
@stop