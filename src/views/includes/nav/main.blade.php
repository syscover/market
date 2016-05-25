<li{!! is_current_resource(['market-product','market-category','market-customer-class-tax','market-payment-method','market-order-status','market-tax-setting','market-order','market-tpv','market-tpv-paypal','market-tpv-paypal-setting','market-cart-price-rule']) !!}>
    <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i>{{ trans('market::pulsar.package_name') }}</a>
    <ul class="sub-menu">
        <li{!! is_current_resource(['market-order'], true) !!}>
            <a href="javascript:void(0)"><i class="fa fa-usd"></i>{{ trans_choice('market::pulsar.sale', 2) }}</a>
            <ul class="sub-menu">
                @if(is_allowed('market-order', 'access'))
                    <li{!! is_current_resource('market-order') !!}><a href="{{ route('marketOrder') }}"><i class="fa fa-shopping-basket"></i>{{ trans_choice('market::pulsar.order', 2) }}</a></li>
                @endif
            </ul>
        </li>
        <li{!! is_current_resource(['market-product','market-category'], true) !!}>
            <a href="javascript:void(0)"><i class="fa fa-cube"></i>{{ trans('market::pulsar.catalog') }}</a>
            <ul class="sub-menu">
                @if(is_allowed('market-product', 'access'))
                    <li{!! is_current_resource('market-product') !!}><a href="{{ route('marketProduct', [session('baseLang')->id_001]) }}"><i class="fa fa-barcode"></i>{{ trans_choice('market::pulsar.product', 2) }}</a></li>
                @endif
                @if(is_allowed('market-category', 'access'))
                    <li{!! is_current_resource('market-category') !!}><a href="{{ route('marketCategory', [session('baseLang')->id_001]) }}"><i class="fa fa-cubes"></i>{{ trans_choice('market::pulsar.category', 2) }}</a></li>
                @endif
            </ul>
        </li>
        <li{!! is_current_resource(['market-cart-price-rule'], true) !!}>
            <a href="javascript:void(0)"><i class="fa fa-bullhorn"></i>{{ trans('market::pulsar.marketing') }}</a>
            <ul class="sub-menu">
                @if(is_allowed('market-cart-price-rule', 'access'))
                    <li{!! is_current_resource('market-cart-price-rule') !!}><a href="{{ route('cartPriceRule', [session('baseLang')->id_001]) }}"><i class="fa fa-shopping-cart"></i>{{ trans_choice('market::pulsar.cart_price_rule', 2) }}</a></li>
                @endif
            </ul>
        </li>
        <li{!! is_current_resource(['market-tpv','market-tpv-paypal','market-tpv-paypal-setting'], true) !!}>
            <a href="javascript:void(0)"><i class="fa fa-credit-card"></i>{{ trans_choice('market::pulsar.tpv', 2) }}</a>
            <ul class="sub-menu">
                <li{!! is_current_resource(['market-tpv-paypal','market-tpv-paypal-setting'], true) !!}>
                    <a href="javascript:void(0)"><i class="fa fa-paypal"></i>{{ trans('market::pulsar.paypal') }}</a>
                    <ul class="sub-menu">
                        @if(is_allowed('market-tpv-paypal-setting', 'access'))
                            <li{!! is_current_resource('market-tpv-paypal-setting') !!}><a href="{{ route('marketPayPalSettings') }}"><i class="fa fa-cog"></i>{{ trans_choice('pulsar::pulsar.setting', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>
        <li{!! is_current_resource(['market-payment-method','market-order-status','market-customer-tax','market-customer-class-tax','market-tax-setting'], true) !!}>
            <a href="javascript:void(0)"><i class="fa fa-cogs"></i>{{ trans_choice('pulsar::pulsar.preference', 2) }}</a>
            <ul class="sub-menu">
                @if(is_allowed('market-payment-method', 'access'))
                    <li{!! is_current_resource('market-payment-method') !!}><a href="{{ route('marketPaymentMethod', [session('baseLang')->id_001]) }}"><i class="fa fa-random"></i>{{ trans_choice('market::pulsar.payment_method', 2) }}</a></li>
                @endif
                @if(is_allowed('market-order-status', 'access'))
                    <li{!! is_current_resource('market-order-status') !!}><a href="{{ route('marketOrderStatus', [session('baseLang')->id_001]) }}"><i class="fa fa-refresh"></i>{{ trans_choice('market::pulsar.order_status', 2) }}</a></li>
                @endif
                <li{!! is_current_resource(['market-customer-class-tax','market-tax-setting'], true) !!}>
                    <a href="javascript:void(0)"><i class="fa fa-user-secret"></i>{{ trans_choice('market::pulsar.tax', 2) }}</a>
                    <ul class="sub-menu">
                        @if(is_allowed('market-customer-class-tax', 'access'))
                            <li{!! is_current_resource('market-customer-class-tax') !!}><a href="{{ route('marketCustomerClassTax') }}"><i class="fa fa-users"></i>{{ trans_choice('market::pulsar.customer_class_tax', 2) }}</a></li>
                        @endif
                        @if(is_allowed('market-tax-setting', 'access'))
                            <li{!! is_current_resource('market-tax-setting') !!}><a href="{{ route('marketTaxSettings') }}"><i class="fa fa-cog"></i>{{ trans_choice('pulsar::pulsar.setting', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</li>