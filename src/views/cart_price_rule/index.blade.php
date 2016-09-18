@extends('pulsar::layouts.index')

@section('head')
    @parent
    <!-- market::cart_price_rule.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": {{ $offset }},
                    "columnDefs": [
                        { "sortable": false, "targets": [7,8]},
                        { "class": "checkbox-column", "targets": [7]},
                        { "class": "align-center", "targets": [6,8]}
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
    <!-- /market::cart_price_rule.index -->
@stop

@section('tHead')
    <!-- market::cart_price_rule.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th>{{ trans_choice('market::pulsar.coupon', 1) }}</th>
        <th data-hide="phone,tablet">{{ trans('market::pulsar.enable_from') }}</th>
        <th data-hide="phone,tablet">{{ trans('market::pulsar.enable_to') }}</th>
        <th data-hide="phone">{{ trans('market::pulsar.total_used') }}</th>
        <th data-hide="phone,tablet">{{ trans('pulsar::pulsar.active') }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /market::cart_price_rule.index -->
@stop