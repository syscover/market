@extends('pulsar::layouts.index', ['newTrans' => 'new'])

@section('head')
    @parent
    <!-- market::order.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'iDisplayStart' : {{ $offset }},
                    'aaSorting': [[ 0, "desc" ]],
                    'aoColumnDefs': [
                        { 'visible': false, "bSearchable": false, 'aTargets': [1]}, // hidden column 1 and prevents search on column 1
                        { 'iDataSort': 1, 'aTargets': [2] }, // sort column 2 according hidden column 1 data
                        { 'bSortable': false, 'aTargets': [9,10]},
                        { 'sClass': 'checkbox-column', 'aTargets': [9]},
                        { 'sClass': 'align-center', 'aTargets': [10]}
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ route('jsonData' . ucfirst($routeSuffix)) }}"
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- /.market::order.index -->
@stop

@section('tHead')
    <!-- market::order.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th>{{ trans('cms::pulsar.date') }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.date', 1) }}</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.surname') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.email') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.phone') }}</th>
        <th data-hide="phone,tablet">{{ trans_choice('pulsar::pulsar.state', 1) }}</th>
        <th data-hide="phone,tablet">{{ trans_choice('pulsar::pulsar.amount', 1) }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /.market::order.index -->
@stop