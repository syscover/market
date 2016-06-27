@extends('pulsar::layouts.form')

@section('head')
    @parent

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
            }).froalaEditor('edit.off');
        })
    </script>
@stop

@section('rows')
    <!-- market::customer_discount_history.form -->
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 4,
                'label' => 'ID',
                'name' => 'id',
                'value' => $object->id_126,
                'readOnly' => true
            ])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', [
                'labelSize' => 4,
                'fieldSize' => 6,
                'label' => trans_choice('pulsar::pulsar.date', 1),
                'name' => 'date',
                'value' => date(config('pulsar.datePattern'), $object->date_126),
                'readOnly' => true
            ])
        </div>
    </div>
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 4,
        'label' => trans_choice('market::pulsar.rule_family', 1),
        'name' => 'ruleFamily',
        'value' => $object->rule_family_id_126,
        'objects' => $ruleFamilies,
        'idSelect' => 'id',
        'nameSelect' => 'name',
        'disabled' => true
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => $object->name_text_value_126,
        'readOnly' => true
    ])
    @include('pulsar::includes.html.form_wysiwyg_group', [
        'label' => trans_choice('pulsar::pulsar.description', 1),
        'name' => 'description',
        'value' => $object->description_text_value_126,
        'disabled' => true
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('pulsar::pulsar.active'),
        'name' => 'active',
        'value' => 1,
        'checked' => $object->active_126,
        'disabled' => true
    ])
    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('market::pulsar.coupon', 1),
        'icon' => 'fa fa-shopping-basket'
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('market::pulsar.has_coupon'),
        'name' => 'hasCoupon',
        'value' => 1,
        'checked' => $object->has_coupon_126,
        'disabled' => true
    ])
    @if($object->has_coupon_126)
        @include('pulsar::includes.html.form_text_group', [
            'fieldSize' => 4,
            'label' => trans_choice('market::pulsar.coupon', 1),
            'name' => 'couponCode',
            'value' => $object->coupon_code_126,
            'readOnly' => true
        ])
    @endif

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('pulsar::pulsar.amount', 2),
        'icon' => 'fa fa-gavel'
    ])
    @include('pulsar::includes.html.form_select_group', [
        'fieldSize' => 4,
        'label' => trans_choice('market::pulsar.discount_type', 1),
        'name' => 'discountType',
        'value' => $object->discount_type_id_126,
        'required' => true,
        'objects' => $discountTypes,
        'idSelect' => 'id',
        'nameSelect' => 'name',
        'disabled' => true
    ])
    @if($object->discount_type_id_126 == 2)
        <div class="row" id="percentageAmountSection">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', [
                    'labelSize' => 4,
                    'fieldSize' => 5,
                    'type' => 'number',
                    'label' => trans('market::pulsar.discount_percentage'),
                    'name' => 'discountPercentage',
                    'value' => $object->discount_percentage_126,
                    'readOnly' => true
                ])
            </div>
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', [
                    'labelSize' => 4,
                    'fieldSize' => 5,
                    'type' => 'number',
                    'label' => trans('market::pulsar.discount_amount'),
                    'name' => 'discountPercentageAmount',
                    'value' => $object->discount_percentage_amount_126,
                    'readOnly' => true
                ])
            </div>
        </div>
        @include('pulsar::includes.html.form_checkbox_group', [
            'label' => trans('market::pulsar.apply_shipping_amount'),
            'name' => 'applyShippingAmount',
            'value' => 1,
            'checked' => $object->apply_shipping_amount_126,
            'disabled' => true
        ])
    @endif
    @if($object->discount_type_id_126 == 3)
        <div class="row">
            <div class="col-md-6">
                @include('pulsar::includes.html.form_text_group', [
                    'labelSize' => 4,
                    'fieldSize' => 5,
                    'type' => 'number',
                    'label' => trans('market::pulsar.discount_amount'),
                    'name' => 'discountFixedAmount',
                    'value' => $object->discount_fixed_amount_126,
                    'readOnly' => true
                ])
            </div>
            <div class="col-md-6"></div>
        </div>
        @include('pulsar::includes.html.form_checkbox_group', [
            'label' => trans('market::pulsar.apply_shipping_amount'),
            'name' => 'applyShippingAmount',
            'value' => 1,
            'checked' => $object->apply_shipping_amount_126,
            'disabled' => true
        ])
    @endif

    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('pulsar::pulsar.shipping', 1),
        'icon' => 'fa fa-truck'
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('market::pulsar.free_shipping'),
        'name' => 'freeShipping',
        'value' => 1,
        'checked' => old('freeShipping', isset($object)? $object->free_shipping_126 : null),
        'disabled' => $action == 'update' || $action == 'store'? false : true
    ])
    <!-- /market::customer_discount_history.form -->
@stop