@extends('pulsar::layouts.form', ['action' => 'update'])

@section('head')
    @parent
    @include('pulsar::includes.js.delete_translation_record')
@stop

@section('rows')
    <!-- market::payment_method.edit -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id',  'value' => $object->id_115, 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_image_group', ['label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => $object->name_115, 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => true])
    @include('pulsar::includes.html.form_select_group', ['label' => trans('market::pulsar.order_status_successful'), 'name' => 'orderStatusSuccessful', 'value' => $object->order_status_successful_id_115, 'objects' => $orderStatus, 'idSelect' => 'id_114', 'nameSelect' => 'name_114', 'fieldSize' => 5])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 8, 'type' => 'number', 'label' => trans('market::pulsar.minimum_price'), 'name' => 'minimumPrice',  'value' => $object->minimum_price_115])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 8, 'type' => 'number', 'label' => trans('market::pulsar.maximum_price'), 'name' => 'maximumPrice',  'value' => $object->maximum_price_115])
        </div>
    </div>
    @include('pulsar::includes.html.form_textarea_group', ['label' => trans_choice('pulsar::pulsar.instructions', 1), 'name' => 'instructions', 'value' => $object->instructions_115])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.sorting'), 'name' => 'sorting', 'type' => 'number', 'value' => $object->sorting_115, 'maxLength' => '3', 'rangeLength' => '1,3', 'min' => '0', 'fieldSize' => 2])
    @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('pulsar::pulsar.active'), 'name' => 'active', 'value' => 1, 'checked' => $object->active_115])
        <!-- /market::payment_method.edit -->
@stop