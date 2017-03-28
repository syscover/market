@extends('pulsar::layouts.tab', ['tabs' => [
        ['id' => 'box_tab1', 'name' => trans_choice('market::pulsar.product', 1)],
        ['id' => 'box_tab2', 'name' => trans_choice('pulsar::pulsar.description', 2)],
        ['id' => 'box_tab3', 'name' => trans_choice('market::pulsar.grouped_product', 2)],
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
    <script>
        $(document).ready(function() {

            $('.wysiwyg').froalaEditor({
                language: '{{ config('app.locale') }}',
                toolbarInline: false,
                toolbarSticky: true,
                tabSpaces: true,
                shortcutsEnabled: ['show', 'bold', 'italic', 'underline', 'strikeThrough', 'indent', 'outdent', 'undo', 'redo', 'insertImage', 'createLink'],
                toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'insertHR', 'insertLink', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
                toolbarButtonsMD: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'insertHR', 'insertLink', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
                heightMin: 130,
                enter: $.FroalaEditor.ENTER_BR,
                key: '{{ config('pulsar.froalaEditorKey') }}'
            });

            // launch slug function when change name and slug
            $('[name=name], [name=slug]').on('change', function(){
                $('[name=slug]').val(getSlug($(this).val(), {
                    separator: '-',
                    lang: '{{ $lang->id_001 }}'
                }));
                $.checkSlug();
            });

            // set disable to false, because is a required property
            $('#recordForm').on('submit', function() {
                $("[name=priceType],[name=productType],[name=customFieldGroup]").prop("disabled", false);
            });

            $('[name=parentProduct]').on('change', function() {
                if($(this).val() != '')
                {
                    $('#categoriesContent').fadeOut();
                }
            });

            // check tax value
            $('[name=productClassTax], [name=price]').on('change', function() {

                if($('[name=price]').val() != '' && $('[name=productClassTax]').val() != '')
                {
                    var url = '{{ route('apiGetProductTaxesMarketTaxRule', ['price' => '%price%', 'productClassTax' => '%productClassTax%']) }}';
                    $.ajax({
                        dataType: 'json',
                        type: "GET",
                        url: url.replace('%productClassTax%', $('[name=productClassTax]').val()).replace('%price%', $('[name=price]').val()),
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        success: function(data)
                        {
                            $('[name=subtotal]').val(data.subtotalFormat);
                            $('[name=taxAmount]').val(data.taxAmountFormat);
                            $('[name=total]').val(data.totalFormat);
                        }
                    });
                }
            });

            // set tab active
            $('.tabbable li:eq({{ $tab }}) a').tab('show')

            @if(isset($object->parent_product_id_111))
                $('#categoriesContent').hide();
            @endif
        })
    </script>

    @include('pulsar::includes.html.froala_references')
    @include('pulsar::includes.js.attachment', [
        'resource'          => 'market-product',
        'routesConfigFile'  => 'market',
        'objectId'          => isset($object->id_111)? $object->id_111 : null
    ])
    @include('pulsar::includes.js.check_slug', [
        'route' => 'apiCheckSlugMarketProduct',
        'lang'  => null
    ])
    @include('pulsar::includes.js.delete_translation_record')
    @include('pulsar::includes.js.custom_fields', [
        'resource' => 'market-product'
    ])
    <!-- /market::products.create -->
@stop

@section('layoutTabHeader')
    @include('pulsar::includes.html.form_record_header')
@stop
@section('layoutTabFooter')
    @include('pulsar::includes.html.form_record_footer')
@stop

@section('box_tab1')
    <!-- market::products.create -->
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 5,
        'label' => trans('market::pulsar.parent_product'),
        'name' => 'parentProduct',
        'value' => old('parentProduct', isset($object->parent_product_id_111)? $object->parent_product_id_111 : null),
        'objects' => $parentsProducts,
        'idSelect' => 'id_111',
        'nameSelect' => 'name_112',
        'disabled' => $action == 'update' || $action == 'store'? false : true,
        'class' => 'col-md-12',
        'data' => [
            'placeholder' => trans('pulsar::pulsar.select_category'),
            'width' => '100%'
        ]
    ])

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans('market::pulsar.product_details'),
        'icon' => 'fa fa-reorder'
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 4,
                'label' => 'ID',
                'name' => 'id',
                'value' => old('id', isset($object->id_111)? $object->id_111 : null),
                'readOnly' => true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_image_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans_choice('pulsar::pulsar.language', 1),
                'name' => 'lang',
                'nameImage' => $lang->name_001,
                'value' => $lang->id_001,
                'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)
            ])
        </div>
    </div>
    @include('pulsar::includes.html.form_select_group', [
        'label' => trans_choice('pulsar::pulsar.category', 2),
        'containerId' => 'categoriesContent',
        'name' => 'categories[]',
        'value' => old('categories', isset($object)? $object->getCategories : null),
        'objects' => $categories,
        'idSelect' => 'id_110',
        'nameSelect' => 'name_110',
        'multiple' => true,
        'class' => 'col-md-12 select2',
        'fieldSize' => 10,
        'data' => [
            'placeholder' => trans('pulsar::pulsar.select_category'),
            'width' => '100%'
        ],
        'disabled' => $action == 'update' || $action == 'store'? false : true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object->name_112)? $object->name_112 : null),
        'maxLength' => '100',
        'rangeLength' => '2,100',
        'required' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.slug'),
        'name' => 'slug',
        'value' => old('slug', isset($object->slug_112)? $object->slug_112 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true
    ])
    @include('pulsar::includes.html.form_select_group', [
        'label' => trans_choice('market::pulsar.product_types', 1),
        'name' => 'productType',
        'value' => old('productType', isset($object->type_id_111)? $object->type_id_111 : null),
        'objects' => $productTypes,
        'idSelect' => 'id',
        'nameSelect' => 'name',
        'fieldSize' => 3,
        'required' => true,
        'disabled' => $action == 'update' || $action == 'store'? false : true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'fieldSize' => 2,
        'label' => trans_choice('pulsar::pulsar.weight', 1),
        'name' => 'weight',
        'value' => old('weight', isset($object->weight_111)? $object->weight_111 : null),
        'readOnly' => $action == 'update' || $action == 'store'? false : true
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 5,
        'label' => trans_choice('pulsar::pulsar.field_group', 1),
        'name' => 'customFieldGroup',
        'value' => old('customFieldGroup', isset($object->field_group_id_111)? $object->field_group_id_111 : null),
        'objects' => $customFieldGroups,
        'idSelect' => 'id_025',
        'nameSelect' => 'name_025',
        'disabled' => $action == 'update' || $action == 'store'? false : true
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_checkbox_group', [
                'labelSize' => 4,
                'fieldSize' => 8,
                'label' => trans('pulsar::pulsar.active'),
                'name' => 'active',
                'value' => 1,
                'checked' => old('active', isset($object)? $object->active_111 : null),
                'disabled' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 4,
                'label' => trans('pulsar::pulsar.sorting'),
                'name' => 'sorting',
                'type' => 'number',
                'value' => old('sorting', isset($object->sorting_111)? $object->sorting_111 : null),
                'maxLength' => '3',
                'rangeLength' => '1,3',
                'min' => '0',
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans('market::pulsar.prices_taxes'),
        'icon' => 'fa fa-usd'
    ])

    @include('pulsar::includes.html.form_hidden', [
        'name'  => 'productPricesValues',
        'value' => config('market.taxProductPrices')
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'label' => trans('market::pulsar.price_type'),
                'name' => 'priceType',
                'value' => old('priceType', isset($object->price_type_id_111)? $object->price_type_id_111 : null),
                'objects' => $priceTypes,
                'idSelect' => 'id',
                'nameSelect' => 'name',
                'required' => true,
                'disabled' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_select_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'label' => trans_choice('market::pulsar.product_class_tax', 1),
                'name' => 'productClassTax',
                'value' => old('productClassTax', isset($object->product_class_tax_id_111)? $object->product_class_tax_id_111 : null),
                'objects' => $productClassTaxes,
                'idSelect' => 'id_101',
                'nameSelect' => 'name_101',
                'disabled' => $action == 'update' || $action == 'store'? false : true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'type' => 'number',
                'label' => trans_choice('pulsar::pulsar.price', 1),
                'name' => 'price',
                'value' => old('price'),
                'readOnly' => $action == 'update' || $action == 'store'? false : true
            ])
            @include('pulsar::includes.html.form_hidden', [
                'name'  => 'precisionSubtotal',
                'value' => isset($object->subtotal_111)? $object->subtotal_111 : null
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'label' => trans_choice('market::pulsar.subtotal', 1),
                'name' => 'subtotal',
                'value' => old('subtotal', isset($object->subtotal_111)? $object->getSubtotal() : null),
                'readOnly' => true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'label' => trans_choice('market::pulsar.tax', 1),
                'name' => 'taxAmount',
                'value' => old('taxAmount', isset($object->tax_amount_111)? $object->getTaxAmount() : null),
                'readOnly' => true
            ])
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'label' => trans_choice('market::pulsar.total', 1),
                'name' => 'total',
                'value' => old('total', isset($object->total_111)? $object->getTotal() : null),
                'readOnly' => true
            ])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('pulsar::pulsar.custom_field', 2),
        'icon' => 'fa fa-align-left',
        'containerId' => 'headerCustomFields'
    ])
    <div id="wrapperCustomFields"></div>
    <!-- /market::products.create -->
@stop

@section('box_tab2')
    @include('pulsar::includes.html.form_wysiwyg_group', [
        'label' => trans_choice('pulsar::pulsar.description', 1),
        'name' => 'description',
        'value' => old('description', isset($object->description_112)? $object->description_112 : null)
    ])
@stop

@section('box_tab3')

@stop

@section('box_tab4')
    @include('pulsar::includes.html.attachment', [
        'routesConfigFile'  => 'market'
    ])
@stop

@section('endBody')
    <!--TODO: Implementar botón para añadir fotografías desde la librería-->
    <div id="attachment-library-mask">
        <div id="attachment-library-content">
            {{ trans('pulsar::pulsar.drag_files') }}
        </div>
    </div>
@stop