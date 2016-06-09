@extends('pulsar::layouts.index')

@section('head')
    @parent
    <!-- market::group_customer_class_tax.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": {{ $offset }},
                    "columnDefs": [
                        { "sortable": false, "targets": [2,3]},
                        { "class": "checkbox-column", "targets": [2]},
                        { "class": "align-center", "targets": [3]}
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
    <!-- /market::group_customer_class_tax.index -->
@stop

@section('tHead')
    <!-- market::group_customer_class_tax.index -->
    <tr>
        <th data-class="expand">{{ trans_choice('pulsar::pulsar.group', 1) }}</th>
        <th>{{ trans_choice('market::pulsar.customer_class_tax', 1) }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /market::group_customer_class_tax.index -->
@stop