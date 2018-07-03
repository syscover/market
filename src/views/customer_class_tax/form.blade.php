@extends('pulsar::layouts.form')

@section('rows')
    <!-- market-old::customer_class_tax.form -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => old('id', isset($object)? $object->id_100 : null),
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object)? $object->name_100 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true
    ])
    <!-- /market-old::customer_class_tax.form -->
@stop