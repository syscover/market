@extends('pulsar::layouts.form', ['action' => 'store'])

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

    @include('pulsar::includes.js.check_slug', ['route' => 'apiCheckSlugMarketCategory'])

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
        });
    </script>
@stop

@section('rows')
    <!-- market::products.create -->
    <div class="row">
        <div class="col-md-6">
            @include('pulsar::includes.html.form_text_group', ['labelSize' => 4, 'label' => 'ID', 'fieldSize' => 4, 'name' => 'id',  'value' => Input::old('id', isset($object->id_110)? $object->id_110 : null), 'readOnly' => true])
        </div>
        <div class="col-md-6">
            @include('pulsar::includes.html.form_image_group', ['labelSize' => 4, 'label' => 'ID', 'fieldSize' => 4, 'label' => trans_choice('pulsar::pulsar.language', 1), 'name' => 'lang', 'nameImage' => $lang->name_001, 'value' => $lang->id_001, 'url' => asset('/packages/syscover/pulsar/storage/langs/' . $lang->image_001)])
        </div>
    </div>
    @include('pulsar::includes.html.form_select_group', ['fieldSize' => 5, 'label' => trans_choice('market::pulsar.parent_category', 1), 'name' => 'parent', 'value' => Input::old('parent', isset($object->parent_110)? $object->parent_110 : null), 'objects' => $categories, 'idSelect' => 'id_110', 'nameSelect' => 'name_110', 'class' => 'select2', 'data' => ['language' => config('app.locale'), 'width' => '100%', 'error-placement' => 'select2-section-outer-container', 'disabled' => isset($object->id_110)? true : null]])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => Input::old('name', isset($object->name_110)? $object->name_110 : null), 'maxLength' => '100', 'rangeLength' => '2,100', 'required' => true])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.slug'), 'name' => 'slug', 'value' => Input::old('slug', isset($object->slug_110)? $object->slug_110 : null), 'maxLength' => '255', 'rangeLength' => '2,255', 'required' => true])
    @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('pulsar::pulsar.active'), 'name' => 'active', 'value' => 1, 'checked' => Input::old('active', isset($object)? $object->active_110 : null)])
    <!-- /market::products.create -->
@stop