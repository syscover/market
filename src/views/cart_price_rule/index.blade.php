@extends('pulsar::layouts.index', ['newTrans' => 'new'])

@section('head')
    @parent
    <!-- market::cart_price_rule.index -->
    <script type="text/javascript">
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'iDisplayStart' : {{ $offset }},
                    'aoColumnDefs': [
                        { 'bSortable': false, 'aTargets': [7,8]},
                        { 'sClass': 'checkbox-column', 'aTargets': [7]},
                        { 'sClass': 'align-center', 'aTargets': [6,8]}
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ route('jsonData' . ucfirst($routeSuffix), [session('baseLang')->id_001]) }}"
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- /.market::cart_price_rule.index -->
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
    <!-- /.market::cart_price_rule.index -->
@stop