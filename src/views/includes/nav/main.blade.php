        <li{!! Miscellaneous::setCurrentOpenPage(['market-product','market-category','market-product-tax','market-payment-method','market-order-status','market-tax-setting','market-order','market-tpv','market-tpv-paypal','market-tpv-paypal-setting']) !!}>
            <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i>{{ trans('market::pulsar.package_name') }}</a>
            <ul class="sub-menu">
                <li{!! Miscellaneous::setCurrentOpenPage(['market-order']) !!}>
                    <a href="javascript:void(0)"><i class="fa fa-usd"></i>{{ trans_choice('market::pulsar.sale', 2) }}</a>
                    <ul class="sub-menu">
                        @if(session('userAcl')->allows('market-order', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-order') !!}><a href="{{ route('marketOrder') }}"><i class="fa fa-ticket"></i>{{ trans_choice('market::pulsar.order', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
                <li{!! Miscellaneous::setCurrentOpenPage(['market-product','market-category']) !!}>
                    <a href="javascript:void(0)"><i class="fa fa-cube"></i>{{ trans('market::pulsar.catalog') }}</a>
                    <ul class="sub-menu">
                        @if(session('userAcl')->allows('market-product', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-product') !!}><a href="{{ route('marketProduct', [session('baseLang')]) }}"><i class="fa fa-barcode"></i>{{ trans_choice('market::pulsar.product', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('market-category', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-category') !!}><a href="{{ route('marketCategory', [session('baseLang')]) }}"><i class="fa fa-cubes"></i>{{ trans_choice('market::pulsar.category', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
                <li{!! Miscellaneous::setCurrentOpenPage(['market-payment-method','market-order-status','market-customer-tax','market-product-tax','market-tax-setting']) !!}>
                    <a href="javascript:void(0)"><i class="fa fa-cogs"></i>{{ trans_choice('pulsar::pulsar.preference', 2) }}</a>
                    <ul class="sub-menu">
                        @if(session('userAcl')->allows('market-payment-method', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-payment-method') !!}><a href="{{ route('marketPaymentMethod', [session('baseLang')]) }}"><i class="fa fa-random"></i>{{ trans_choice('market::pulsar.payment_method', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->allows('market-order-status', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('market-order-status') !!}><a href="{{ route('marketOrderStatus', [session('baseLang')]) }}"><i class="fa fa-refresh"></i>{{ trans_choice('market::pulsar.order_status', 2) }}</a></li>
                        @endif
                        <li{!! Miscellaneous::setCurrentOpenPage(['market-customer-tax','market-product-tax','market-tax-setting']) !!}>
                            <a href="javascript:void(0)"><i class="fa fa-user-secret"></i>{{ trans_choice('market::pulsar.tax', 2) }}</a>
                            <ul class="sub-menu">
                                @if(session('userAcl')->allows('market-product-tax', 'access'))
                                    <li{!! Miscellaneous::setCurrentPage('market-product-tax') !!}><a href="{{ route('marketCustomerTax') }}"><i class="fa fa-users"></i>{{ trans_choice('market::pulsar.customer_tax', 2) }}</a></li>
                                @endif
                                @if(session('userAcl')->allows('market-tax-setting', 'access'))
                                    <li{!! Miscellaneous::setCurrentPage('market-tax-setting') !!}><a href="{{ route('marketTaxSettings') }}"><i class="fa fa-cog"></i>{{ trans_choice('pulsar::pulsar.setting', 2) }}</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>
                <li{!! Miscellaneous::setCurrentOpenPage(['market-tpv','market-tpv-paypal','market-tpv-paypal-setting']) !!}>
                    <a href="javascript:void(0)"><i class="fa fa-credit-card"></i>{{ trans_choice('market::pulsar.tpv', 2) }}</a>
                    <ul class="sub-menu">
                        <li{!! Miscellaneous::setCurrentOpenPage(['market-tpv-paypal','market-tpv-paypal-setting']) !!}>
                            <a href="javascript:void(0)"><i class="fa fa-paypal"></i>{{ trans('market::pulsar.paypal') }}</a>
                            <ul class="sub-menu">
                                @if(session('userAcl')->allows('market-tpv-paypal-setting', 'access'))
                                    <li{!! Miscellaneous::setCurrentPage('market-tpv-paypal-setting') !!}><a href="{{ route('marketPayPalSettings') }}"><i class="fa fa-cog"></i>{{ trans_choice('pulsar::pulsar.setting', 2) }}</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>