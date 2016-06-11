@extends('pulsar::layouts.form')

@section('head')
    @parent
    <script src="{{ asset('packages/syscover/pulsar/vendor/getaddress/js/jquery.getaddress.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.getAddress({
                type: 'laravel',
                appName: 'pulsar',
                token: '{{ csrf_token() }}',
                lang: '{{ config('app.locale') }}',
                highlightCountrys: ['ES', 'US'],

                useSeparatorHighlight: true,
                textSeparatorHighlight: '------------------',

                countryValue: '{{ old('country', isset($object->country_id_103)? $object->country_id_103 : null) }}',
                territorialArea1Value: '{{ old('territorialArea1', isset($object->territorial_area_1_id_103)? $object->territorial_area_1_id_103 : null) }}',
                territorialArea2Value: '{{ old('territorialArea2', isset($object->territorial_area_2_id_103)? $object->territorial_area_2_id_103 : null) }}',
                territorialArea3Value: '{{ old('territorialArea3', isset($object->territorial_area_3_id_103)? $object->territorial_area_3_id_103 : null) }}'
            });
        });
    </script>
@stop

@section('rows')
    <!-- market::tax_rate_zone.form -->
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'label' => 'ID',
        'name' => 'id',
        'value' => old('id', isset($object)? $object->id_103 : null),
        'readOnly' => true,
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 6,
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object)? $object->name_103 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 6,
        'label' => trans_choice('pulsar::pulsar.country', 1),
        'id' => 'country',
        'name' => 'country',
        'idSelect' => 'id_002',
        'nameSelect' => 'name_002',
        'class' => 'col-md-12 select2',
        'required' => true,
        'style' => 'width:100%',
        'data' => [
            'language' => config('app.locale'),
            'error-placement' => 'select2-country-outer-container',
            'disabled' => $action == 'update' || $action == 'store'? false : true
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 6,
        'containerId' => 'territorialArea1Wrapper',
        'labelId' => 'territorialArea1Label',
        'name' => 'territorialArea1',
        'class' => 'col-md-12 select2',
        'style' => 'width:100%',
        'data' => [
            'language' => config('app.locale'),
            'disabled' => $action == 'update' || $action == 'store'? false : true
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 6,
        'containerId' => 'territorialArea2Wrapper',
        'labelId' => 'territorialArea2Label',
        'name' => 'territorialArea2',
        'class' => 'col-md-12 select2',
        'style' => 'width:100%',
        'data' => [
            'language' => config('app.locale'),
            'disabled' => $action == 'update' || $action == 'store'? false : true
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 6,
        'containerId' => 'territorialArea3Wrapper',
        'labelId' => 'territorialArea3Label',
        'name' => 'territorialArea3',
        'class' => 'col-md-12 select2',
        'style' => 'width:100%',
        'data' => [
            'language' => config('app.locale'),
            'disabled' => $action == 'update' || $action == 'store'? false : true
        ]
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 4,
        'label' => trans('pulsar::pulsar.cp'),
        'name' => 'cp',
        'value' => old('cp', isset($object->cp_103)? $object->cp_103 : null),
        'maxLength' => '10',
        'rangeLength' => '2,10',
        'readOnly' => $action == 'update' || $action == 'store'? false : true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 4,
        'type' => 'number',
        'label' => trans('market::pulsar.rate_percent'),
        'name' => 'ratePercent',
        'value' => old('ratePercent', isset($object->rate_percent_103)? $object->rate_percent_103 : null),
        'readOnly' => $action == 'update' || $action == 'store'? false : true
    ])
    <!-- /market::tax_rate_zone.form -->
@stop