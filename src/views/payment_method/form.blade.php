@extends('pulsar::layouts.form')

@section('head')
    @parent
    @include('pulsar::includes.js.delete_translation_record')
@stop

@section('rows')
    <!-- market-old::payment_method.create -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => old('name', isset($object->id_115)? $object->id_115 : null),
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
        'value' => old('name', isset($object->name_115)? $object->name_115 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50',
        'required' => true
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 5,
        'label' => trans('market-old::pulsar.order_status_successful'),
        'name' => 'orderStatusSuccessful',
        'value' => old('orderStatusSuccessful', isset($object->order_status_successful_id_115)? $object->order_status_successful_id_115 : null),
        'objects' => $orderStatus,
        'idSelect' => 'id_114',
        'nameSelect' => 'name_114'
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'type' => 'number',
                'label' => trans('market-old::pulsar.minimum_price'),
                'name' => 'minimumPrice',
                'value' => old('minimumPrice', isset($object->minimum_price_115)? $object->minimum_price_115 : null)
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'type' => 'number',
                'label' => trans('market-old::pulsar.maximum_price'),
                'name' => 'maximumPrice',
                'value' => old('maximumPrice', isset($object->maximum_price_115)? $object->maximum_price_115 : null)
            ])
        </div>
    </div>
    @include('pulsar::includes.html.form_textarea_group', [
        'label' => trans_choice('pulsar::pulsar.instructions', 1),
        'name' => 'instructions',
        'value' => old('instructions', isset($object->instructions_115)? $object->instructions_115 : null)
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'label' => trans('pulsar::pulsar.sorting'),
        'name' => 'sorting',
        'type' => 'number',
        'value' => old('sorting', isset($object->sorting_115)? $object->sorting_115 : null),
        'maxLength' => '3',
        'rangeLength' => '1,3',
        'min' => '0'
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('pulsar::pulsar.active'),
        'name' => 'active',
        'value' => 1,
        'checked' => old('active', isset($object->active_115)? $object->active_115 : null)
    ])
    <!-- /market-old::payment_method.create -->
@stop