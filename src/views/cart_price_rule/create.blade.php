@extends('pulsar::layouts.form', ['action' => 'store'])

@section('head')
    @parent
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/attachment/css/attachment-library.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/css/getfile.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">

    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/mobiledetect/mdetect.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/getfile/js/jquery.getfile.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/attachment/js/attachment-library.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/speakingurl/speakingurl.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/datetimepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    @include('pulsar::includes.html.froala_references')

    <script type="text/javascript">
        $(document).ready(function() {
            $('.wysiwyg').froalaEditor({
                language: '{{ config('app.locale') }}',
                placeholderText: '{{ trans('pulsar::pulsar.type_something') }}',
                toolbarInline: false,
                toolbarSticky: true,
                tabSpaces: true,
                shortcutsEnabled: ['show', 'bold', 'italic', 'underline', 'strikeThrough', 'indent', 'outdent', 'undo', 'redo', 'insertImage', 'createLink'],
                toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', '|', 'color', 'emoticons', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', 'insertHR', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
                heightMin: 250,
                enter: $.FroalaEditor.ENTER_BR,
                key: '{{ config('pulsar.froalaEditorKey') }}',
                imageUploadURL: '{{ route('froalaUploadImage') }}',
                imageUploadParams: {
                    package: 'cms',
                    _token: '{{ csrf_token() }}'
                },
                imageManagerLoadURL: '{{ route('froalaLoadImages', ['package' => 'cms']) }}',
                imageManagerDeleteURL: '{{ route('froalaDeleteImage') }}',
                imageManagerDeleteParams: {
                    package: 'cms',
                    _token: '{{ csrf_token() }}'
                },
                fileUploadURL: '{{ route('froalaUploadFile') }}',
                fileUploadParams: {
                    package: 'cms',
                    _token: '{{ csrf_token() }}'
                }
            }).on('froalaEditor.image.removed', function (e, editor, $img) {

                $.ajax({
                    method: "POST",
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    url: '{{ route('froalaDeleteImage') }}',
                    data: {
                        package: 'cms',
                        src: $img.attr('src')
                    }
                })
                .done (function (data) {
                    console.log ('image was deleted');
                })
                .fail (function () {
                    console.log ('image delete problem');
                })
            })

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
                    $('#percentageAmountSection').fadeIn()
                else
                    $('#percentageAmountSection').hide()

                if(($(this).val() != '1' || $(this).val() == '') && $(this).val() == '3')
                    $('#fixedAmountSection').fadeIn()
                else
                    $('#fixedAmountSection').hide()
            })

            // set disable to false, because is a required property
            $("#recordForm").on('submit', function() {
                $("[name=discountType]").prop("disabled", false)
            })

            @if(!isset($object) || (isset($object) && !$object->has_coupon_120))
                $("#couponSection").hide()
                $('#percentageAmountSection').hide()
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
            });
        }
    </script>
@stop

@section('rows')
    <!-- market::cart_price_rule.create -->
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 4, 'label' => 'ID', 'name' => 'id',  'value' => old('id', isset($object->id_120)? $object->id_120 : null), 'readOnly' => true])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_image_group', ['labelSize' => 4, 'fieldSize' => 4, 'label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
        </div>
    </div>
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => old('name', isset($object->name_text_text)? $object->name_text_text : null), 'maxLength' => '255', 'rangeLength' => '2,255', 'required' => true])
    @include('pulsar::includes.html.form_hidden', ['name' => 'idName', 'value' => isset($object->name_text_120)? $object->name_text_120 : null])
    @include('pulsar::includes.html.form_wysiwyg_group', ['labelSize' => 2, 'fieldSize' => 10, 'label' => trans_choice('pulsar::pulsar.description', 1), 'name' => 'description', 'value' => old('description', isset($object->description_text_text)? $object->description_text_text : null)])
    @include('pulsar::includes.html.form_hidden', ['name' => 'idDescription', 'value' => isset($object->description_text_120)? $object->description_text_120 : null])
    @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('pulsar::pulsar.active'), 'name' => 'active', 'value' => 1, 'checked' => old('active', isset($object)? $object->active_120 : null), 'disabled' => isset($object->id_120)])
    @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('market::pulsar.combinable'), 'name' => 'combinable', 'value' => 1, 'checked' => old('combinable', isset($object)? $object->combinable_120 : null), 'disabled' => isset($object->id_120)])

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('market::pulsar.coupon', 1), 'icon' => 'fa fa-shopping-basket'])
    @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('market::pulsar.has_coupon'), 'name' => 'hasCoupon', 'value' => 1, 'checked' => old('hasCoupon', isset($object)? $object->has_coupon_120 : null), 'disabled' => isset($object->id_120)])
    <div id="couponSection">
        <div class="row">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 5, 'label' => trans_choice('market::pulsar.coupon', 1), 'name' => 'couponCode',  'value' => old('couponCode', isset($object)? $object->coupon_code_120 : null), 'readOnly' => isset($object->id_120)])
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 5, 'type' => 'number', 'label' => trans('market::pulsar.uses_coupon'), 'name' => 'usesCoupon', 'value' => old('usesCoupon', isset($object->uses_coupon_120)? $object->uses_coupon_120 : null), 'readOnly' => isset($object->id_120)])
            </div>
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 5, 'type' => 'number', 'label' => trans('market::pulsar.uses_customer'), 'name' => 'usesCustomer', 'value' => old('usesCustomer', isset($object->uses_customer_120)? $object->uses_customer_120 : null), 'readOnly' => isset($object->id_120)])
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 5, 'label' => trans('market::pulsar.total_used'), 'name' => 'totalUsed',  'value' => old('totalUsed', isset($object->total_used_120)? $object->total_used_120 : null), 'readOnly' => true])
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans('pulsar::pulsar.access'), 'icon' => 'fa fa-calendar-check-o'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_datetimepicker_group', ['labelSize' => 4, 'fieldSize' => 5, 'label' => trans('market::pulsar.enable_from'), 'name' => 'enableFrom', 'value' => old('enableFrom', isset($object->enable_from_120)? date(config('pulsar.datePattern') . ' HH:mm', $object->enable_from_120) : null), 'readOnly' => isset($object->id_120), 'data' => ['format' => Miscellaneous::convertFormatDate(config('pulsar.datePattern')) . ' HH:mm', 'locale' => config('app.locale')]])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_datetimepicker_group', ['labelSize' => 4, 'fieldSize' => 5, 'label' => trans('market::pulsar.enable_to'), 'name' => 'enableTo', 'value' => old('enableTo', isset($object->enable_to_120)? date(config('pulsar.datePattern') . ' HH:mm', $object->enable_to_120) : null), 'readOnly' => isset($object->id_120), 'data' => ['format' => Miscellaneous::convertFormatDate(config('pulsar.datePattern')) . ' HH:mm', 'locale' => config('app.locale')]])
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.amount', 2), 'icon' => 'fa fa-gavel'])
    @include('pulsar::includes.html.form_select_group', ['fieldSize' => 4, 'label' => trans_choice('market::pulsar.discount_type', 1), 'name' => 'discountType', 'value' => old('discountType', isset($object)? $object->discount_type_120 : null), 'required' => true, 'objects' => $discountTypes, 'idSelect' => 'id', 'nameSelect' => 'name', 'disabled' => isset($object->id_120)])
    <div>
        <div class="row" id="percentageAmountSection">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 5, 'type' => 'number', 'label' => trans('market::pulsar.discount_percentage'), 'name' => 'discountPercentage',  'value' => old('discountPercentage', isset($object)? $object->discount_percentage_120 : null), 'readOnly' => isset($object->id_120)])
            </div>
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 5, 'type' => 'number', 'label' => trans('market::pulsar.maximum_discount_amount'), 'name' => 'maximumDiscountAmount',  'value' => old('maximumDiscountAmount', isset($object)? $object->maximum_discount_amount_120 : null), 'readOnly' => isset($object->id_120)])
            </div>
        </div>
        <div class="row" id="fixedAmountSection">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 5, 'type' => 'number', 'label' => trans('market::pulsar.discount_amount'), 'name' => 'discountFixedAmount',  'value' => old('discountFixedAmount', isset($object)? $object->discount_fixed_amount_120 : null), 'readOnly' => isset($object->id_120)])
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.transport', 1), 'icon' => 'fa fa-truck'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_checkbox_group', ['labelSize' => 4, 'fieldSize' => 5, 'label' => trans('market::pulsar.apply_shipping_amount'), 'name' => 'applyShippingAmount', 'value' => 1, 'checked' => old('applyShippingAmount', isset($object)? $object->apply_shipping_amount_120 : null), 'disabled' => isset($object->id_120)])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_checkbox_group', ['labelSize' => 4, 'fieldSize' => 5, 'label' => trans('market::pulsar.free_shipping'), 'name' => 'freeShipping', 'value' => 1, 'checked' => old('freeShipping', isset($object)? $object->free_shipping_120 : null), 'disabled' => isset($object->id_120)])
        </div>
    </div>
    <!-- /market::cart_price_rule.create -->
@stop