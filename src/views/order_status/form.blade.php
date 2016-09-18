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
        'value' => old('name', isset($object->id_114)? $object->id_114 : null),
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_image_group', [
        'label' => trans_choice('pulsar::pulsar.language', 1),
        'name' => 'lang',
        'nameImage' => $lang->name_001,
        'value' => $lang->id_001,
        'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object->name_114)? $object->name_114 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50',
        'required' => true
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('pulsar::pulsar.active'),
        'name' => 'active',
        'value' => 1,
        'checked' => old('active', isset($object->active_114)? $object->active_114 : null)
    ])
    <!-- /market::order_status.create -->
@stop