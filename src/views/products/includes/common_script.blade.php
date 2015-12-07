<script type="text/javascript">
    $(document).ready(function() {

        $('.wysiwyg').froalaEditor({
            language: '{{ config('app.locale') }}',
            toolbarInline: false,
            toolbarSticky: true,
            tabSpaces: true,
            shortcutsEnabled: ['show', 'bold', 'italic', 'underline', 'strikeThrough', 'indent', 'outdent', 'undo', 'redo', 'insertImage', 'createLink'],
            toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'insertHR', 'insertLink', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
            heightMin: 130,
            enter: $.FroalaEditor.ENTER_BR,
            key: '{{ config('pulsar.froalaEditorKey') }}'
        });

        // launch slug function when change name and slug
        $("[name=name], [name=slug]").on('change', function(){
            $("[name=slug]").val(getSlug($(this).val(),{
                separator: '-',
                lang: '{{ $lang->id_001 }}'
            }));
            $.checkSlug();
        });

        // hide every elements
        $('#headerCustomFields').hide()
        $('#wrapperCustomFields').hide()

        // on change family show fields and custom fields
        $("[name=customFieldGroup]").on('change', function() {
            if($("[name=customFieldGroup]").val()) {
                // get html doing a request to controller to render the views
                @if($action == 'edit' || isset($id))
                    var request = {
                        customFieldGroup: $("[name=customFieldGroup]").val(),
                        lang: '{{ $lang->id_001 }}',
                        object: '{{ $id }}',
                        resource: 'market-product',
                        action: '{{ $action }}'
                    }
                @else
                    var request = {
                        customFieldGroup: $("[name=customFieldGroup]").val(),
                        lang: '{{ $lang->id_001 }}'
                    }
                @endif

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: '{{ route('apiGetCustomFields') }}',
                    data: request,
                    success: function (data) {
                        // add html custom fields section
                        $('#wrapperCustomFields').prepend(data.html)

                        if (data.html != '')
                        {
                            $(".uniform").uniform()
                            $('#headerCustomFields').fadeIn()
                            $('#wrapperCustomFields').fadeIn()
                        }
                    }
                });
            }
            else
            {
                $('#headerCustomFields').fadeOut()
                $('#wrapperCustomFields').fadeOut()
                $('#wrapperCustomFields').html('')
            }
        })

        // if we have customFieldGroup value, throw event to show or hide elements
        if($("[name=customFieldGroup]").val())
        {
            $("[name=customFieldGroup]").trigger('change');
        }

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