@extends('pulsar::layouts.index')

@section('head')
    @parent
    <!-- market-old::tax_rate_zone.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": {{ $offset }},
                    "columnDefs": [
                        { "sortable": false, "targets": [5,6]},
                        { "class": "checkbox-column", "targets": [5]},
                        { "class": "align-center", "targets": [6]}
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
    <!-- /market-old::tax_rate_zone.index -->
@stop

@section('tHead')
    <!-- market-old::tax_rate_zone.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th data-hide="phone,tablet">{{ trans_choice('pulsar::pulsar.translation', 1) }}</th>
        <th>{{ trans('market-old::pulsar.priority') }}</th>
        <th>{{ trans('market-old::pulsar.sort_order') }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /market-old::tax_rate_zone.index -->
@stop