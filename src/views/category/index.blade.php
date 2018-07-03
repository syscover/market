@extends('pulsar::layouts.index', ['newTrans' => 'new', 'firstColSize' => 8, 'secondColSize' => 4])

@section('head')
    @parent
    <!-- market-old::categories.index -->
    <script src="{{ asset('packages/syscover/pulsar/plugins/nestable/jquery.nestable.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": {{ $offset }},
                    "columnDefs": [
                        { "sortable": false, "targets": [3,4]},
                        { "class": "checkbox-column", "targets": [3]},
                        { "class": "align-center", "targets": [2,4]}
                    ],
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('jsonData' . ucfirst($routeSuffix), [base_lang2()->id_001]) }}",
                        "type": "POST",
                        "headers": {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    }
                }).fnSetFilteringDelay();
            }

            $('#nestable').nestable().on('change', updateOutput)
        });

        var updateOutput = function(e) {
            var list   = e.length ? e : $(e.target), output = list.data('output');
            console.log(JSON.stringify(list.nestable('serialize')));
        };
    </script>
    <!-- /market-old::categories.index -->
@stop

@section('tHead')
    <!-- market-old::categories.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.active') }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /market-old::categories.index -->
@stop

@section('sideContent')
    <div class="widget box">
        <div class="widget-header">
            <h4><i class="fa fa-reorder"></i> Nestable List 3 (Draggable Handles)</h4>
        </div>
        <div class="widget-content">
            <div class="dd" id="nestable">
                <ol class="dd-list">
                    <li class="dd-item dd3-item" data-id="13">
                        <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 13</div>
                    </li>
                    <li class="dd-item dd3-item" data-id="14">
                        <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 14</div>
                    </li>
                    <li class="dd-item dd3-item" data-id="15">
                        <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 15</div>
                        <ol class="dd-list">
                            <li class="dd-item dd3-item" data-id="16">
                                <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 16</div>
                            </li>
                            <li class="dd-item dd3-item" data-id="17">
                                <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 17</div>
                            </li>
                            <li class="dd-item dd3-item" data-id="18">
                                <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 18</div>
                            </li>
                        </ol>
                    </li>
                </ol>
            </div>
        </div>
    </div>
@stop