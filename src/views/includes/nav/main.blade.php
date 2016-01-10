        <li{!! Miscellaneous::setCurrentOpenPage(['market-product','market-category','market-product-tax','market-payment-method','market-order-status']) !!}>
            <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i>{{ trans('market::pulsar.package_name') }}</a>
            <ul class="sub-menu">
                <li{!! Miscellaneous::setCurrentOpenPage(['market-customer-tax','market-product-tax']) !!}>
                    <a href="javascript:void(0)"><i class="fa fa-usd"></i>{{ trans_choice('market::pulsar.sale', 2) }}</a>
                    <ul class="sub-menu">
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-order', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-order') !!}><a href="{{ route('marketOrder') }}"><i class="fa fa-ticket"></i>{{ trans_choice('market::pulsar.order', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
                <li{!! Miscellaneous::setCurrentOpenPage(['market-product','market-category']) !!}>
                    <a href="javascript:void(0)"><i class="fa fa-cube"></i>{{ trans('market::pulsar.catalog') }}</a>
                    <ul class="sub-menu">
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-product', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-product') !!}><a href="{{ route('marketProduct', [session('baseLang')]) }}"><i class="fa fa-barcode"></i>{{ trans_choice('market::pulsar.product', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-category', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-category') !!}><a href="{{ route('marketCategory', [session('baseLang')]) }}"><i class="fa fa-cubes"></i>{{ trans_choice('market::pulsar.category', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
                <li{!! Miscellaneous::setCurrentOpenPage(['market-payment-method','market-order-status','market-customer-tax','market-product-tax']) !!}>
                    <a href="javascript:void(0)"><i class="fa fa-cog"></i>{{ trans_choice('pulsar::pulsar.preference', 2) }}</a>
                    <ul class="sub-menu">
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-payment-method', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-payment-method') !!}><a href="{{ route('marketPaymentMethod', [session('baseLang')]) }}"><i class="fa fa-credit-card"></i>{{ trans_choice('market::pulsar.payment_method', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'market-order-status', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-order-status') !!}><a href="{{ route('marketOrderStatus', [session('baseLang')]) }}"><i class="fa fa-refresh"></i>{{ trans_choice('market::pulsar.order_status', 2) }}</a></li>
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
            </ul>
        </li>