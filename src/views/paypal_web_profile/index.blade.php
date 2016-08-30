@extends('pulsar::layouts.index')

@section('head')
    @parent
    <!-- market::paypal_web_profile.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "columnDefs": [
                        { "sortable": false, "targets": [2]},
                        { "class": "align-center", "targets": [2]}
                    ]
                });
            }
        });
    </script>
    <!-- market::paypal_web_profile.index -->
@stop

@section('tHead')
    <!-- market::paypal_web_profile.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /market::paypal_web_profile.index -->
@stop

@section('tBody')
    <!-- market::paypal_web_profile.index -->
    @foreach($webProfiles as $webProfile)
        <tr>
            <td>{{ $webProfile->getId() }}</td>
            <td>{{ $webProfile->getName() }}</td>
            <td>Acciones</td>
        </tr>
    @endforeach
    <!-- /market::paypal_web_profile.index -->
@stop