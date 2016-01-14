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
    @include('pulsar::includes.html.form_select_group', ['fieldSize' => 5, 'label' => trans_choice('pulsar::pulsar.mode', 1), 'name' => 'marketPayPalMode', 'value' => $marketPayPalMode->value_018, 'objects' => $payPalModes, 'idSelect' => 'id', 'nameSelect' => 'name', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('market::pulsar.items_list_description'), 'name' => 'marketPayPalDescriptionItemList', 'value' => $marketPayPalDescriptionItemList->value_018, 'required' => true])

    @include('pulsar::includes.html.form_section_header', ['label' => 'Sandbox', 'icon' => 'fa fa-flask'])
    @include('pulsar::includes.html.form_text_group', ['label' => 'Client ID', 'name' => 'marketPayPalSandboxClientID', 'value' => $marketPayPalSandboxClientID, 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => 'Secret', 'name' => 'marketPayPalSandboxSecret', 'value' => $marketPayPalSandboxSecret, 'required' => true])

    @include('pulsar::includes.html.form_section_header', ['label' => 'Live', 'icon' => 'fa fa-rocket'])
    @include('pulsar::includes.html.form_text_group', ['label' => 'Client ID', 'name' => 'marketPayPalLiveClientID', 'value' => $marketPayPalLiveClientID, 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => 'Secret', 'name' => 'marketPayPalPalLiveSecret', 'value' => $marketPayPalPalLiveSecret, 'required' => true])
    <!-- ./market::paypal_settings.index -->
@stop