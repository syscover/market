@extends('pulsar::layouts.index', ['newTrans' => 'new'])

@section('head')
    @parent
    <!-- market::order.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": {{ $offset }},
                    "sorting": [[0, "desc"]],
                    "columnDefs": [
                        { "visible": false, "searchable": false, "targets": [1]}, // hidden column 1 and prevents search on column 1
                        { "dataSort": 1, "targets": [2] }, // sort column 2 according hidden column 1 data
                        { "sortable": false, "targets": [9,10]},
                        { "class": "checkbox-column", "targets": [9]},
                        { "class": "align-center", "targets": [10]}
                    ],
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('jsonData' . ucfirst($routeSuffix)) }}",
                        "type": "POST",
                        "headers": {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    }
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
        <th data-hide="phone,tablet">{{ trans_choice('market::pulsar.payment_method', 1) }}</th>
        <th data-hide="phone,tablet">{{ trans_choice('pulsar::pulsar.amount', 1) }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /.market::order.index -->
@stop