        <li{!! Miscellaneous::setCurrentOpenPage(['market-product','market-category','market-product-tax']) !!}>
            <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i>{{ trans('market::pulsar.package_name') }}</a>
            <ul class="sub-menu">
                @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-product', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('market-product') !!}><a href="{{ route('marketProduct', [session('baseLang')]) }}"><i class="fa fa-cube"></i>{{ trans_choice('market::pulsar.product', 2) }}</a></li>
                @endif
                @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-category', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('market-category') !!}><a href="{{ route('marketCategory', [session('baseLang')]) }}"><i class="fa fa-cubes"></i>{{ trans_choice('market::pulsar.category', 2) }}</a></li>
                @endif
                <li{!! Miscellaneous::setCurrentOpenPage(['market-customer-tax','market-product-tax']) !!}>
                    <a href="javascript:void(0)"><i class="fa fa-user-secret"></i>{{ trans_choice('market::pulsar.tax', 2) }}</a>
                    <ul class="sub-menu">
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-product-tax', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-product-tax') !!}><a href="{{ route('marketCustomerTax') }}"><i class="fa fa-users"></i>{{ trans_choice('market::pulsar.customer_tax', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>