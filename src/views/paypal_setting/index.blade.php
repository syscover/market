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
    @include('pulsar::includes.html.form_text_group', ['label' => trans('market::pulsar.description'), 'name' => 'marketPayPalDescriptionItemList', 'value' => $marketPayPalDescriptionItemList->value_018, 'required' => true])
    <!-- ./market::paypal_settings.index -->
@stop