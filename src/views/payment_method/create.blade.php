@extends('pulsar::layouts.form', ['action' => 'store'])

@section('rows')
    <!-- market::payment_method.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id',  'value' => Input::old('name', isset($object->id_114)? $object->id_114 : null), 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_image_group', ['label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => Input::old('name', isset($object->name_114)? $object->name_114 : null), 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => true])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 8, 'type' => 'number', 'label' => trans('market::pulsar.minimum_price'), 'name' => 'minimumPrice',  'value' => Input::old('minimumPrice', isset($object->minimum_price_114)? $object->minimum_price_114 : null)])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 8, 'type' => 'number', 'label' => trans('market::pulsar.maximum_price'), 'name' => 'maximumPrice',  'value' => Input::old('maximumPrice', isset($object->maximum_price_114)? $object->maximum_price_114 : null)])
        </div>
    </div>
    @include('pulsar::includes.html.form_textarea_group', ['label' => trans_choice('pulsar::pulsar.instructions', 1), 'name' => 'instructions', 'value' => Input::old('instructions', isset($object->instructions_114)? $object->instructions_114 : null)])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.sorting'), 'name' => 'sorting', 'type' => 'number', 'value' => Input::old('sorting', isset($object->sorting_114)? $object->sorting_114 : null), 'maxLength' => '3', 'rangeLength' => '1,3', 'min' => '0', 'fieldSize' => 2])
    @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('pulsar::pulsar.active'), 'name' => 'active', 'value' => 1, 'checked' => Input::old('active',  isset($object->active_114))])
    <!-- /market::payment_method.create -->
@stop