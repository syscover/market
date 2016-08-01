@extends('pulsar::layouts.form')

@section('head')
    @parent
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">

    <script src="{{ asset('packages/syscover/pulsar/vendor/datetimepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    @include('pulsar::includes.js.delete_translation_record')
    @include('pulsar::includes.html.froala_references')

    <script>
        $(document).ready(function() {
            $('.wysiwyg').froalaEditor({
                language: '{{ config('app.locale') }}',
                placeholderText: '{{ trans('pulsar::pulsar.type_something') }}',
                toolbarInline: false,
                toolbarSticky: true,
                tabSpaces: true,
                shortcutsEnabled: ['show', 'bold', 'italic', 'underline', 'strikeThrough', 'indent', 'outdent', 'undo', 'redo', 'createLink'],
                toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', '|', 'color', 'emoticons', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', 'insertHR', '-', 'insertLink', 'insertTable', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
                toolbarButtonsMD: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', '|', 'color', 'emoticons', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', 'insertHR', '-', 'insertLink', 'insertTable', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
                heightMin: 250,
                enter: $.FroalaEditor.ENTER_BR,
                key: '{{ config('pulsar.froalaEditorKey') }}',
            }).on('froalaEditor.image.beforeUpload', function (e, editor, images) {
                return false
            })
            .on('froalaEditor.file.beforeUpload', function (e, editor, images) {
                return false
            });

            $("[name=hasCoupon]").on('click', function() {

                if($(this).is(":checked"))
                {
                    $('#couponSection').fadeIn()
                    $.getCouponCode()
                }
                else
                {
                    $('#couponSection').fadeOut()
                }
            })

            $("[name=discountType]").on('change', function() {
                if(($(this).val() != '1' || $(this).val() == '') && $(this).val() == '2')
                    $('#percentageAmountSection, #applyShippingAmountLayer').fadeIn();
                else
                    $('#percentageAmountSection, #applyShippingAmountLayer').hide();

                if(($(this).val() != '1' || $(this).val() == '') && $(this).val() == '3' || $(this).val() == '4')
                    $('#fixedAmountSection').fadeIn();
                else
                    $('#fixedAmountSection').hide();
            })

            // set disable to false, because is a required property
            $("#recordForm").on('submit', function() {
                $("[name=discountType]").prop("disabled", false)
            })

            // edit option
            @if(isset($object->has_coupon_120))
                @if(!$object->has_coupon_120)
                    $("#couponSection").hide();
                @endif
                @if($object->discount_type_id_120 === null || $object->discount_type_id_120 === 1)
                    $("#percentageAmountSection, #applyShippingAmountLayer").hide()
                    $("#fixedAmountSection").hide()
                @endif
                @if($object->discount_type_id_120 === 2)
                    $("#fixedAmountSection").hide()
                @endif
                @if($object->discount_type_id_120 === 3 ||$object->discount_type_id_120 === 4)
                    $("#percentageAmountSection, #applyShippingAmountLayer").hide()
                @endif
            @endif

            // create option and create lang
            @if(! isset($object) || (isset($object) && ! $object->has_coupon_120))
                $("#couponSection").hide()
                $('#percentageAmountSection, #applyShippingAmountLayer').hide()
                $('#fixedAmountSection').hide()
            @endif
        })

        $.getCouponCode = function() {
            $.ajax({
                dataType:   'json',
                type:       'POST',
                headers:  {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url:        '{{ route('apiGetCouponCodeCartPriceRule') }}',
                data:       {
                    length: 8
                },
                success:  function(data)
                {
                    $("[name=couponCode]").val(data.couponCode)
                }
            })
        }
        // TODO: mediante ajax falta comprobar que el código de cupón no existe
    </script>
@stop

@section('rows')
    <!-- market::cart_price_rule.form -->
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 4,
                'label' => 'ID',
                'name' => 'id',
                'value' => old('id', isset($object->id_120)? $object->id_120 : null),
                'readOnly' => true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_image_group', [
                'labelSize' => 4,
                'fieldSize' => 4,
                'label' => trans_choice('pulsar::pulsar.language', 1),
                'name' => 'lang',
                'nameImage' => $lang->name_001,
                'value' => $lang->id_001,
                'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)
            ])
        </div>
    </div>
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object->name_text_value)? $object->name_text_value : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true
    ])
    @include('pulsar::includes.html.form_hidden', [
        'name' => 'idName',
        'value' => isset($object->name_text_id_120)? $object->name_text_id_120 : null
    ])
    @include('pulsar::includes.html.form_wysiwyg_group', [
        'labelSize' => 2,
        'fieldSize' => 10,
        'label' => trans_choice('pulsar::pulsar.description', 1),
        'name' => 'description',
        'value' => old('description', isset($object->description_text_value)? $object->description_text_value : null)
    ])
    @include('pulsar::includes.html.form_hidden', [
        'name' => 'idDescription',
        'value' => isset($object->description_text_id_120)? $object->description_text_id_120 : null
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('pulsar::pulsar.active'),
        'name' => 'active',
        'value' => 1,
        'checked' => old('active', isset($object)? $object->active_120 : null),
        'disabled' => $action == 'update' || $action == 'store'? false : true
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('market::pulsar.combinable'),
        'name' => 'combinable',
        'value' => 1,
        'checked' => old('combinable', isset($object)? $object->combinable_120 : null),
        'disabled' => $action == 'update' || $action == 'store'? false : true
    ])
    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('market::pulsar.coupon', 1),
        'icon' => 'fa fa-shopping-basket'
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('market::pulsar.has_coupon'),
        'name' => 'hasCoupon',
        'value' => 1,
        'checked' => old('hasCoupon', isset($object)? $object->has_coupon_120 : null),
        'disabled' => $action == 'update' || $action == 'store'? false : true
    ])
    <div id="couponSection">
        <div class="row">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', [
                    'labelSize' => 4,
                    'fieldSize' => 5,
                    'label' => trans_choice('market::pulsar.coupon', 1),
                    'name' => 'couponCode',
                    'value' => old('couponCode', isset($object)? $object->coupon_code_120 : null),
                    'readOnly' => $action == 'update' || $action == 'store'? false : true
                ])
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', [
                    'labelSize' => 4,
                    'fieldSize' => 5,
                    'type' => 'number',
                    'label' => trans('market::pulsar.uses_coupon'),
                    'name' => 'usesCoupon',
                    'value' => old('usesCoupon', isset($object->uses_coupon_120)? $object->uses_coupon_120 : null),
                    'readOnly' => $action == 'update' || $action == 'store'? false : true
                ])
            </div>
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', [
                    'labelSize' => 4,
                    'fieldSize' => 5,
                    'type' => 'number',
                    'label' => trans('market::pulsar.uses_customer'),
                    'name' => 'usesCustomer',
                    'value' => old('usesCustomer', isset($object->uses_customer_120)? $object->uses_customer_120 : null),
                    'readOnly' => $action == 'update' || $action == 'store'? false : true
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', [
                    'labelSize' => 4,
                    'fieldSize' => 5,
                    'label' => trans('market::pulsar.total_used'),
                    'name' => 'totalUsed',
                    'value' => old('totalUsed', isset($object->total_used_120)? $object->total_used_120 : null),
                    'readOnly' => true
                ])
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans('pulsar::pulsar.available'),
        'icon' => 'fa fa-calendar-check-o'
    ])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_datetimepicker_group', [
                'labelSize' => 4,
                'fieldSize' => 5,
                'label' => trans('market::pulsar.enable_from'),
                'name' => 'enableFrom',
                'value' => old('enableFrom', isset($object->enable_from_120)? date(config('pulsar.datePattern') . ' HH:mm', $object->enable_from_120) : null),
                'readOnly' => $action == 'update' || $action == 'store'? false : true,
                'data' => [
                    'format' => Miscellaneous::convertFormatDate(config('pulsar.datePattern')) . ' HH:mm',
                    'locale' => config('app.locale')
                ]
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_datetimepicker_group', [
                'labelSize' => 4,
                'fieldSize' => 5,
                'label' => trans('market::pulsar.enable_to'),
                'name' => 'enableTo',
                'value' => old('enableTo', isset($object->enable_to_120)? date(config('pulsar.datePattern') . ' HH:mm', $object->enable_to_120) : null),
                'readOnly' => $action == 'update' || $action == 'store'? false : true,
                'data' => [
                    'format' => Miscellaneous::convertFormatDate(config('pulsar.datePattern')) . ' HH:mm',
                    'locale' => config('app.locale')
                ]
            ])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('pulsar::pulsar.amount', 2),
        'icon' => 'fa fa-gavel'
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 4,
        'label' => trans_choice('market::pulsar.discount_type', 1),
        'name' => 'discountType',
        'value' => old('discountType', isset($object)? $object->discount_type_id_120 : null),
        'required' => true,
        'objects' => $discountTypes,
        'idSelect' => 'id',
        'nameSelect' => 'name',
        'disabled' => $action == 'update' || $action == 'store'? false : true
    ])
    <div>
        <div class="row" id="percentageAmountSection">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', [
                    'labelSize' => 4,
                    'fieldSize' => 5,
                    'type' => 'number',
                    'label' => trans('market::pulsar.discount_percentage'),
                    'name' => 'discountPercentage',
                    'value' => old('discountPercentage', isset($object)? $object->discount_percentage_120 : null),
                    'readOnly' => $action == 'update' || $action == 'store'? false : true
                ])
            </div>
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', [
                    'labelSize' => 4,
                    'fieldSize' => 5,
                    'type' => 'number',
                    'label' => trans('market::pulsar.maximum_discount_amount'),
                    'name' => 'maximumDiscountAmount',
                    'value' => old('maximumDiscountAmount', isset($object)? $object->maximum_discount_amount_120 : null),
                    'readOnly' => $action == 'update' || $action == 'store'? false : true
                ])
            </div>
        </div>
        <div class="row" id="fixedAmountSection">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', [
                    'labelSize' => 4,
                    'fieldSize' => 5,
                    'type' => 'number',
                    'label' => trans('market::pulsar.discount_amount'),
                    'name' => 'discountFixedAmount',
                    'value' => old('discountFixedAmount', isset($object)? $object->discount_fixed_amount_120 : null),
                    'readOnly' => $action == 'update' || $action == 'store'? false : true
                ])
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <div id="applyShippingAmountLayer">
        @include('pulsar::includes.html.form_checkbox_group', [
            'label' => trans('market::pulsar.apply_shipping_amount'),
            'name' => 'applyShippingAmount',
            'value' => 1,
            'checked' => old('applyShippingAmount', isset($object)? $object->apply_shipping_amount_120 : null),
            'disabled' => $action == 'update' || $action == 'store'? false : true
        ])
    </div>
    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('pulsar::pulsar.shipping', 1),
        'icon' => 'fa fa-truck'
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('market::pulsar.free_shipping'),
        'name' => 'freeShipping',
        'value' => 1,
        'checked' => old('freeShipping', isset($object)? $object->free_shipping_120 : null),
        'disabled' => $action == 'update' || $action == 'store'? false : true
    ])
    <!-- /market::cart_price_rule.form -->
@stop