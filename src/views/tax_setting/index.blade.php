@extends('pulsar::layouts.form', ['action' => 'update', 'cancelButton' => false])

@section('head')
    @parent
    <!-- market::tax_settings.index -->
    @include('pulsar::includes.js.success_message')
    <!-- /.market::tax_settings.index -->
@stop

@section('rows')
    <!-- market::tax_settings.index -->
    @include('pulsar::includes.html.form_select_group', ['fieldSize' => 5, 'label' => trans('market::pulsar.product_prices'), 'name' => 'productPricesValue', 'value' => (int)$productPricesValue->value_018, 'objects' => $productPrices, 'idSelect' => 'id', 'nameSelect' => 'name', 'required' => true])
    @include('pulsar::includes.html.form_select_group', ['fieldSize' => 5, 'label' => trans('market::pulsar.shipping_prices'), 'name' => 'shippingPricesValue', 'value' => (int)$shippingPricesValue->value_018, 'objects' => $shippingPrices, 'idSelect' => 'id', 'nameSelect' => 'name', 'required' => true])
    <!-- /.market::tax_settings.index -->
@stop