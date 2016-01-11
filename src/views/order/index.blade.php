@extends('pulsar::layouts.index', ['newTrans' => 'new'])

@section('script')
    @parent
    <!-- market::order.index -->
    <script type="text/javascript">
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'iDisplayStart' : {{ $offset }},
                    'aoColumnDefs': [
                        { 'bSortable': false, 'aTargets': [7,8]},
                        { 'sClass': 'checkbox-column', 'aTargets': [7]},
                        { 'sClass': 'align-center', 'aTargets': [5,6,8]}
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ route('jsonData' . ucfirst($routeSuffix)) }}"
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- ./market::order.index -->
@stop

@section('tHead')
    <!-- market::order.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.date') }}</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.surname') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.email') }}</th>
        <th data-hide="phone,tablet">{{ trans('pulsar::pulsar.state') }}</th>
        <th data-hide="phone,tablet">{{ trans('pulsar::pulsar.amount') }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- ./market::order.index -->
@stop