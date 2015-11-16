@extends('pulsar::layouts.tab', ['tabs' => [
        ['id' => 'box_tab1', 'name' => trans_choice('hotels::pulsar.hotel', 1)],
        ['id' => 'box_tab2', 'name' => trans_choice('pulsar::pulsar.description', 2)],
        ['id' => 'box_tab3', 'name' => trans('hotels::pulsar.billing_data')],
        ['id' => 'box_tab4', 'name' => trans_choice('pulsar::pulsar.attachment', 2)]
    ]])

@section('css')
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/attachment/css/attachment-library.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/getfile/css/getfile.css') }}">
@stop

@section('script')
    @parent
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/cropper/cropper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/mobiledetect/mdetect.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getfile/libs/filedrop/filedrop.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/getfile/js/jquery.getfile.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/attachment/js/attachment-library.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/speakingurl/speakingurl.min.js') }}"></script>

    @include('pulsar::includes.js.attachment', [
        'action'            => 'edit',
        'resource'          => 'market-product',
        'routesConfigFile'  => 'market'])
    @include('pulsar::includes.js.check_slug', ['route' => 'apiCheckSlugMarketProduct'])
    @include('pulsar::includes.js.delete_translation_record')

    <script type="text/javascript">
        $(document).ready(function() {
            // launch slug function when change name and slug
            $("[name=name], [name=slug]").on('change', function(){
                $("[name=slug]").val(getSlug($(this).val(),{
                    separator: '-',
                    lang: '{{ $lang->id_001 }}'
                }));
                $.checkSlug();
            });

            // set tab active
            @if($tab == 0)
            $('.tabbable li:eq(0) a').tab('show');
            @elseif($tab == 1)
            $('.tabbable li:eq(1) a').tab('show');
            @elseif($tab == 2)
            $('.tabbable li:eq(2) a').tab('show');
            @elseif($tab == 3)
            $('.tabbable li:eq(3) a').tab('show');
            @endif
        });
    </script>
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
            @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'fieldSize' => 4, 'name' => 'id',  'value' => $object->id_111, 'readOnly' => true])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_image_group', ['label' => 'ID', 'fieldSize' => 4, 'label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
        </div>
    </div>
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => $object->name_112, 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('pulsar::pulsar.slug'), 'name' => 'slug', 'value' => $object->slug_112, 'maxLength' => '255', 'rangeLength' => '2,255', 'required' => true])

    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('hotels::pulsar.service', 2), 'icon' => 'fa fa-star'])
    @include('pulsar::includes.html.form_checkbox_group', ['labelSize' => 1, 'fieldSize' => 11, 'label' => trans('pulsar::pulsar.active'), 'name' => 'active', 'value' => 1, 'checked' => $object->active_111])
    <!-- /market::products.create -->
@stop

@section('box_tab2')
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