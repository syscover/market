@extends('pulsar::layouts.tab', ['tabs' => [
        ['id' => 'box_tab1', 'name' => trans_choice('hotels::pulsar.hotel', 1)],
        ['id' => 'box_tab2', 'name' => trans_choice('pulsar::pulsar.description', 2)],
        ['id' => 'box_tab3', 'name' => 'Default'],
        ['id' => 'box_tab4', 'name' => trans_choice('pulsar::pulsar.attachment', 2)]
    ]])

@section('head')
    @parent
    <!-- market::products.create -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/attachment/css/attachment-library.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/css/getfile.css') }}">

    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/mobiledetect/mdetect.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/js/jquery.getfile.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/attachment/js/attachment-library.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/speakingurl/speakingurl.min.js') }}"></script>

    @include('pulsar::includes.html.froala_references')
    @include('pulsar::includes.js.attachment', [
        'resource'          => 'market-product',
        'routesConfigFile'  => 'market'])
    @include('pulsar::includes.js.check_slug', ['route' => 'apiCheckSlugMarketProduct', 'lang'  => null])

    @include('market::products.includes.common_script', ['action' => 'create'])
    @include('pulsar::includes.js.custom_fields', ['resource' => 'market-product', 'action' => 'create'])
    <!-- ./market::products.create -->
@stop

@section('layoutTabHeader')
    @include('pulsar::includes.html.form_record_header', ['action' => 'store'])
@stop
@section('layoutTabFooter')
    @include('pulsar::includes.html.form_record_footer', ['action' => 'store'])
@stop

@section('box_tab1')
    <!-- market::products.create -->
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 8, 'label' => 'ID', 'name' => 'id',  'value' => old('id', isset($object->id_111)? $object->id_111 : null), 'readOnly' => true])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_image_group', ['labelSize' => 4, 'fieldSize' => 8, 'label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
        </div>
    </div>
    @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.category', 2), 'containerId' => 'categoriesContent', 'name' => 'categories[]', 'value' => old('categories', isset($object)? $object->getCategories : null), 'objects' => $categories, 'idSelect' => 'id_110', 'nameSelect' => 'name_110', 'multiple' => true, 'class' => 'col-md-12 select2', 'fieldSize' => 10, 'data' => ['placeholder' => trans('pulsar::pulsar.select_category'), 'width' => '100%']])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => old('name', isset($object->name_112)? $object->name_112 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.slug'), 'name' => 'slug', 'value' => old('slug', isset($object->slug_112)? $object->slug_112 : null), 'maxLength' => '255', 'rangeLength' => '2,255', 'required' => true])
    @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('market::pulsar.product_types', 1), 'name' => 'productType', 'value' => old('productType', isset($object->product_type_111)? $object->product_type_111 : null), 'objects' => $productTypes, 'idSelect' => 'id', 'nameSelect' => 'name', 'fieldSize' => 3, 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans_choice('pulsar::pulsar.weight', 1), 'name' => 'weight', 'value' => old('weight', isset($object->weight_112)? $object->weight_112 : null)])
    @include('pulsar::includes.html.form_select_group', ['fieldSize' => 5, 'label' => trans_choice('pulsar::pulsar.field_group', 1), 'name' => 'customFieldGroup', 'value' => old('customFieldGroup', isset($object->custom_field_group_111)? $object->custom_field_group_111 : null), 'objects' => $customFieldGroups, 'idSelect' => 'id_025', 'nameSelect' => 'name_025'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_checkbox_group', ['labelSize' => 4, 'fieldSize' => 8, 'label' => trans('pulsar::pulsar.active'), 'name' => 'active', 'value' => 1, 'checked' => old('active', isset($object->active_111))])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 4, 'label' => trans('pulsar::pulsar.sorting'), 'name' => 'sorting', 'type' => 'number', 'value' => old('sorting', isset($object->sorting_111)? $object->sorting_111 : null), 'maxLength' => '3', 'rangeLength' => '1,3', 'min' => '0'])
        </div>
    </div>
    @include('pulsar::includes.html.form_section_header', ['label' => trans('market::pulsar.prices_taxes'), 'icon' => 'fa fa-usd'])
    @include('pulsar::includes.html.form_select_group', ['label' => trans('market::pulsar.price_type'), 'name' => 'priceType', 'value' => old('priceType', isset($object->price_type_111)? $object->price_type_111 : null), 'objects' => $priceTypes, 'idSelect' => 'id', 'nameSelect' => 'name', 'fieldSize' => 3, 'required' => true])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 6, 'label' => trans_choice('pulsar::pulsar.price', 1), 'name' => 'price', 'value' => old('price', isset($object->price_111)? $object->price_111 : null)])
        </div>
        <div class="col-md-6">
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.custom_field', 2), 'icon' => 'fa fa-align-left', 'containerId' => 'headerCustomFields'])
    <div id="wrapperCustomFields"></div>
    <!-- /market::products.create -->
@stop

@section('box_tab2')
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans_choice('pulsar::pulsar.description', 1), 'name' => 'description', 'value' => old('description', isset($object->description_112)? $object->description_112 : null)])
@stop

@section('box_tab3')

@stop

@section('box_tab4')
    @include('pulsar::includes.html.attachment', [
        'action'            => 'create',
        'routesConfigFile'  => 'market'])
@stop

@section('endBody')
    <!--TODO: Implementar botón para añadir fotografías desde la librería-->
    <div id="attachment-library-mask">
        <div id="attachment-library-content">
            {{ trans('pulsar::pulsar.drag_files') }}
        </div>
    </div>
@stop