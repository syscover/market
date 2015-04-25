        <li{!! Miscellaneous::setCurrentOpenPage(['market-customer-tax','market-product-tax']) !!}>
            <a href="javascript:void(0);"><i class="icomoon-icon-images"></i>{{ trans('marketplace::pulsar.package_name') }}</a>
            <ul class="sub-menu">
                @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'mifinan', 'access'))
                    <li{{ Miscellaneous::setCurrentPage('market-customer-tax') }}><a href="#"><i class="icomoon-icon-truck"></i>Productos</a></li>
                @endif
                <li{!! Miscellaneous::setCurrentOpenPage(['market-customer-tax','market-product-tax']) !!}>
                    <a href="javascript:void(0);"><i class="icomoon-icon-grid"></i>{{ trans_choice('marketplace::pulsar.tax', 2) }}</a>
                    <ul class="sub-menu">
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-customer-tax', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-customer-tax') !!}><a href="{{ route('CustomerTax') }}"><i class="icomoon-icon-factory"></i>Categorías</a></li>
                        @endif
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-product-tax', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-product-tax') !!}><a href="{{ route('CustomerTax') }}"><i class="icomoon-icon-factory"></i>Categorías</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>