@extends('pulsar::layouts.index')

@section('head')
    @parent
    <!-- market-old::products.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": {{ $offset }},
                    "columnDefs": [
                        { "sortable": false, "targets": [6,7]},
                        { "class": "checkbox-column", "targets": [6]},
                        { "class": "align-center", "targets": [2,3,4,7]}
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
        });
    </script>
    <!-- /market-old::products.index -->
@stop

@section('tHead')
    <!-- market-old::products.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th data-hide="phone,tablet">{{ trans('pulsar::pulsar.active') }}</th>
        <th>{{ trans('market-old::pulsar.subtotal') }}</th>
        <th>{{ trans('pulsar::pulsar.sorting') }}</th>
        <th>{{ trans_choice('pulsar::pulsar.category', 2) }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /market-old::products.index -->
@stop