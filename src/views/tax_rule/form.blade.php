@extends('pulsar::layouts.form')

@section('rows')
    <!-- market::tax_rule.form -->
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'label' => 'ID',
        'name' => 'id',
        'value' => old('id', isset($object)? $object->id_104 : null),
        'readOnly' => true,
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object)? $object->name_104 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans_choice('pulsar::pulsar.translation', 1),
        'name' => 'translation',
        'value' => old('translation', isset($object)? $object->translation_104 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255'
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 6,
        'label' => trans_choice('market::pulsar.tax_rate_zone', 1),
        'name' => 'taxRateZones[]',
        'value' => old('taxRateZones', isset($object)? $object->getTaxRateZones : null),
        'objects' => $taxRateZones,
        'idSelect' => 'id_103',
        'nameSelect' => 'name_103',
        'multiple'  => true,
        'required' => true
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 6,
        'label' => trans_choice('market::pulsar.customer_class_tax', 1),
        'name' => 'customerClassTaxes[]',
        'value' => old('customerClassTaxes', isset($object)? $object->getCustomerClassTaxes : null),
        'objects' => $customerClassTaxes,
        'idSelect' => 'id_100',
        'nameSelect' => 'name_100',
        'multiple'  => true,
        'required' => true
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 6,
        'label' => trans_choice('market::pulsar.product_class_tax', 1),
        'name' => 'productClassTaxes[]',
        'value' => old('productClassTaxes', isset($object)? $object->getProductClassTaxes : null),
        'objects' => $productClassTaxes,
        'idSelect' => 'id_101',
        'nameSelect' => 'name_101',
        'multiple'  => true,
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'type' => 'number',
        'label' => trans('market::pulsar.priority'),
        'name' => 'priority',
        'value' => old('priority', isset($object->priority_104)? $object->priority_104 : 0),
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'type' => 'number',
        'label' => trans('market::pulsar.sort_order'),
        'name' => 'sortOrder',
        'value' => old('sortOrder', isset($object->sort_order_104)? $object->sort_order_104 : 0)
    ])
    <!-- /market::tax_rule.form -->
@stop