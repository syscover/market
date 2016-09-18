@extends('pulsar::layouts.index')

@section('head')
    @parent
    <!-- market::payment_method.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": {{ $offset }},
                    "columnDefs": [
                        { "sortable": false, "targets": [5,6]},
                        { "class": "checkbox-column", "targets": [5]},
                        { "class": "align-center", "targets": [4,6]}
                    ],
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('jsonData' . ucfirst($routeSuffix), [base_lang()->id_001]) }}",
                        "type": "POST",
                        "headers": {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    }
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- /market::payment_method.index -->
@stop

@section('tHead')
    <!-- market::payment_method.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-hide="phone,tablet">{{ trans_choice('pulsar::pulsar.language', 1) }}</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.sorting', 1) }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.active', 1) }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /market::payment_method.index -->
@stop