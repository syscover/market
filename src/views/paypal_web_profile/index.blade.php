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
            <td>
                @if(is_allowed($resource, 'edit'))
                    <a class="btn btn-xs bs-tooltip" href="{{ route('edit' . ucfirst($routeSuffix), ['id' => $webProfile->getId()]) }}" data-original-title="{{ trans('pulsar::pulsar.edit_record') }}"><i class="fa fa-pencil"></i></a>
                @endif
                @if(is_allowed($resource, 'delete'))
                    <a class="btn btn-xs bs-tooltip delete-record" data-id="{{ $webProfile->getId() }}" data-original-title=" {{ trans('pulsar::pulsar.delete_record') }}" data-delete-url="{{ route('delete' . ucfirst($routeSuffix), ['id' => $webProfile->getId()]) }}"><i class="fa fa-trash"></i></a>
                @endif
            </td>
        </tr>
    @endforeach
    <!-- /market::paypal_web_profile.index -->
@stop