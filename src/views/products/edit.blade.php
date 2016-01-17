@extends('pulsar::layouts.tab', ['tabs' => [
        ['id' => 'box_tab1', 'name' => trans_choice('hotels::pulsar.hotel', 1)],
        ['id' => 'box_tab2', 'name' => trans_choice('pulsar::pulsar.description', 2)],
        ['id' => 'box_tab3', 'name' => 'Default'],
        ['id' => 'box_tab4', 'name' => trans_choice('pulsar::pulsar.attachment', 2)]
    ]])

@section('css')
    <!-- Froala -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/froala_editor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/froala_style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/char_counter.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/code_view.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/emoticons.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/file.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/fullscreen.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/image_manager.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/image.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/line_breaker.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/table.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/css/plugins/video.css') }}">
    <!-- ./Froala -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/attachment/css/attachment-library.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/css/getfile.css') }}">
@stop

@section('script')
    @parent
    <!-- market::products.edit -->
    <!-- Froala -->
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/froala_editor.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/char_counter.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/align.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/code_view.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/colors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/emoticons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/entities.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/file.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/font_family.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/font_size.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/fullscreen.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/image.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/image_manager.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/inline_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/line_breaker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/link.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/lists.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/paragraph_format.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/paragraph_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/quote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/table.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/save.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/url.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/plugins/video.min.js') }}"></script>
    @if(config('app.locale') != 'en')
        <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/wysiwyg.froala/js/languages/' . config('app.locale') . '.js') }}"></script>
    @endif
    <!-- ./Froala -->
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/mobiledetect/mdetect.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getfile/js/jquery.getfile.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/attachment/js/attachment-library.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/speakingurl/speakingurl.min.js') }}"></script>

    @include('pulsar::includes.js.attachment', [
        'action'            => 'edit',
        'resource'          => 'market-product',
        'routesConfigFile'  => 'market',
        'objectId'          => $object->id_111])
    @include('pulsar::includes.js.check_slug', ['route' => 'apiCheckSlugMarketProduct'])
    @include('pulsar::includes.js.delete_translation_record')

    @include('market::products.includes.common_script', ['action' => 'edit'])
    @include('pulsar::includes.js.custom_fields', ['resource' => 'market-product', 'action' => 'edit'])
    <!-- ./market::products.edit -->
@stop

@section('layoutTabHeader')
    @include('pulsar::includes.html.form_record_header', ['action' => 'update'])
@stop
@section('layoutTabFooter')
    @include('pulsar::includes.html.form_record_footer', ['action' => 'update'])
@stop

@section('box_tab1')
    <!-- market::products.create -->
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 8, 'label' => 'ID', 'name' => 'id',  'value' => $object->id_111, 'readOnly' => true])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_image_group', ['labelSize' => 4, 'fieldSize' => 8, 'label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
        </div>
    </div>
    @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.category', 2), 'containerId' => 'categoriesContent', 'name' => 'categories[]', 'value' => $object->getCategories, 'objects' => $categories, 'idSelect' => 'id_110', 'nameSelect' => 'name_110', 'multiple' => true, 'class' => 'col-md-12 select2', 'fieldSize' => 10, 'data' => ['placeholder' => trans('pulsar::pulsar.select_category'), 'width' => '100%']])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => $object->name_112, 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.slug'), 'name' => 'slug', 'value' => $object->slug_112, 'maxLength' => '255', 'rangeLength' => '2,255', 'required' => true])
    @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('market::pulsar.product_types', 1), 'name' => 'productType', 'value' => $object->product_type_111, 'objects' => $productTypes, 'idSelect' => 'id', 'nameSelect' => 'name', 'fieldSize' => 3, 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['fieldSize' => 3, 'label' => trans_choice('pulsar::pulsar.weight', 1), 'name' => 'weight', 'value' => $object->weight_111])
    @include('pulsar::includes.html.form_select_group', ['fieldSize' => 5, 'label' => trans_choice('pulsar::pulsar.field_group', 1), 'name' => 'customFieldGroup', 'value' => $object->custom_field_group_111, 'objects' => $customFieldGroups, 'idSelect' => 'id_025', 'nameSelect' => 'name_025'])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_checkbox_group', ['labelSize' => 4, 'fieldSize' => 8, 'label' => trans('pulsar::pulsar.active'), 'name' => 'active', 'value' => 1, 'checked' => $object->active_111])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 4, 'label' => trans('pulsar::pulsar.sorting'), 'name' => 'sorting', 'type' => 'number', 'value' => $object->sorting_111, 'maxLength' => '3', 'rangeLength' => '1,3', 'min' => '0'])
        </div>
    </div>
    @include('pulsar::includes.html.form_section_header', ['label' => trans('market::pulsar.prices_taxes'), 'icon' => 'fa fa-usd'])
    @include('pulsar::includes.html.form_select_group', ['label' => trans('market::pulsar.price_type'), 'name' => 'priceType', 'value' => $object->price_type_111, 'objects' => $priceTypes, 'idSelect' => 'id', 'nameSelect' => 'name', 'fieldSize' => 3, 'required' => true])
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'fieldSize' => 6, 'label' => trans_choice('pulsar::pulsar.price', 1), 'name' => 'price', 'value' => $object->price_111])
        </div>
        <div class="col-md-6">
        </div>
    </div>

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.custom_field', 2), 'icon' => 'fa fa-align-left', 'containerId' => 'headerCustomFields'])
    <div id="wrapperCustomFields"></div>
    <!-- /market::products.create -->
@stop

@section('box_tab2')
    @include('pulsar::includes.html.form_wysiwyg_group', ['label' => trans_choice('pulsar::pulsar.description', 1), 'name' => 'description', 'value' => $object->description_112])
@stop

@section('box_tab3')

@stop

@section('box_tab4')
    @include('pulsar::includes.html.attachment', [
        'action'            => 'edit',
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