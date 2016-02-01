<!-- market::products.breadcrumbs -->
<li>
    <a href="javascript:void(0)">{{ trans('market::pulsar.package_name') }}</a>
</li>
<li class="current">
    <a href="{{ route($routeSuffix, [session('baseLang')]) }}">{{ trans_choice($objectTrans, 2) }}</a>
</li>
<!-- /market::products.breadcrumbs -->