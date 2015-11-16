        <li{!! Miscellaneous::setCurrentOpenPage(['market-product','market-category','market-product-tax']) !!}>
            <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i>{{ trans('market::pulsar.package_name') }}</a>
            <ul class="sub-menu">
                @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-product', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('market-product') !!}><a href="{{ route('marketProduct', [session('baseLang')]) }}"><i class="fa fa-cube"></i>{{ trans_choice('market::pulsar.product', 2) }}</a></li>
                @endif
                @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-category', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('market-category') !!}><a href="#"><i class="icomoon-icon-truck"></i>Productos</a></li>
                @endif
                <li{!! Miscellaneous::setCurrentOpenPage(['market-customer-tax','market-product-tax']) !!}>
                    <a href="javascript:void(0)"><i class="icomoon-icon-grid"></i>{{ trans_choice('marketplace::pulsar.tax', 2) }}</a>
                    <ul class="sub-menu">
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-product-tax', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-product-tax') !!}><a href="{{ route('marketCustomerTax') }}"><i class="a fa-users"></i>{{ trans_choice('marketplace::pulsar.customer_tax', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>