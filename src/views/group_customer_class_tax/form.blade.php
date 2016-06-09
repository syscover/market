@extends('pulsar::layouts.form')

@section('rows')
    <!-- market::group_customer_class_tax.create -->
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 7,
        'label' => trans_choice('pulsar::pulsar.group', 1),
        'id' => 'group',
        'name' => 'group',
        'value' => (int)old('group', isset($object->group_id_102)? $object->group_id_102 : null),
        'objects' => $groups,
        'idSelect' => 'id_300',
        'nameSelect' => 'name_300',
        'required' => $action != 'update',
        'class' => 'select2',
        'disabled' => $action == 'update',
        'data' => [
            'language' => config('app.locale'),
            'width' => '100%',
            'error-placement' => 'select2-group-outer-container'
        ]
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 7,
        'id' => 'customer-class-tax',
        'label' => trans_choice('market::pulsar.customer_class_tax', 1),
        'name' => 'customerClassTax',
        'value' => (int)old('customerClassTax', isset($object->customer_class_tax_id_102)? $object->customer_class_tax_id_102 : null),
        'objects' => $customerClassTaxes,
        'idSelect' => 'id_100',
        'nameSelect' => 'name_100',
        'required' => true,
        'class' => 'select2',
        'data' => [
            'language' => config('app.locale'),
            'width' => '100%',
            'error-placement' => 'select2-customer-class-tax-outer-container'
        ]
    ])
    <!-- /market::group_customer_class_tax.create -->
@stop