<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Syscover\Market\Models\Order;
use Syscover\Pulsar\Models\Preference;

/**
 * Class PayPalController
 * @package Syscover\Market\Controllers
 */

class PayPalController extends Controller
{
    private $apiContext;
    private $preferences;

    /**
     * PayPalController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->preferences      = Preference::getValues(12);

        // Set mode
        if(config('market.payPalMode') == 'live')
        {
            $this->webProfile   = config('market.payPalLiveWebProfile');
            $clientID           = config('market.payPalLiveClientId');
            $secret             = config('market.payPalLiveSecret');
        }
        else
        {
            $this->webProfile   = config('market.payPalSandboxWebProfile');
            $clientID           = config('market.payPalSandboxClientId');
            $secret             = config('market.payPalSandboxSecret');
        }

        // init PayPal API Context
        $this->apiContext   = new ApiContext(new OAuthTokenCredential($clientID, $secret));

        // SDK configuration
        $this->apiContext->setConfig([
            'mode'                      => config('market.payPalMode'),         // Specify mode, sandbox or live
            'http.ConnectionTimeOut'    => 30,                                  // Specify the max request time in seconds
            'log.LogEnabled'            => true,                                // Whether want to log to a file
            'log.FileName'              => storage_path() . '/logs/paypal.log', // Specify the file that want to write on
            'log.LogLevel'              => 'FINE'                               // Available option 'FINE', 'INFO', 'WARN' or 'ERROR', Logging is most verbose in the 'FINE' level and decreases as you proceed towards ERROR
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPayment()
    {
        if( $this->request->has('_order'))
        {
            $order     = Order::builder()->where('id_116',  $this->request->input('_order'))->first();
            $orderRows = $order->getOrderRows;
        }
        else
        {
            // error no hay pedido
            exit;
        }

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // create products
        $products = [];
        foreach($orderRows as $row)
        {
            $item = new Item();
            $item->setName($row->name_117)                                              // product name
            ->setCurrency('EUR')                                                        // currency
            ->setQuantity(intval($row->quantity_117))                                   // quantity
            ->setPrice($row->total_without_discounts_117 / $row->quantity_117);         // unit price

            $products[] = $item;
        }

        // shipping
        if($order->shipping_amount_116 > 0)
        {
            $item = new Item();
            $item->setName(trans($this->preferences->where('id_018', 'marketPayPalShippingDescription')->first()->value_018))
                ->setCurrency('EUR')                        // currency
                ->setQuantity(1)                            // quantity
                ->setPrice($order->shipping_amount_116);    // price

            $products[] = $item;
        }

        // set discounts
        $discounts = $order->getDiscounts;
        foreach ($discounts as $discount)
        {
            $discountAmount = $discount->discount_amount_126 * -1;

            if($discountAmount < 0)
            {
                $item = new Item();
                $item->setName($discount->name_text_value_126)
                    ->setCurrency('EUR')                        // currency
                    ->setQuantity(1)                            // quantity
                    ->setPrice($discountAmount);                // price

                $products[] = $item;
            }
        }

        // products list
        $itemList = new ItemList();
        $itemList->setItems($products);

        // total charge
        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($order->total_116);

        // create transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription($this->preferences->where('id_018', 'marketPayPalDescriptionItemList')->first()->value_018);

        // config URL request
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('checkoutMarketPayPalPayment'))
            ->setCancelUrl(route('home'));

        // create payment
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setExperienceProfileId($this->webProfile) // web profile
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try
        {
            $payment->create($this->apiContext);
        }
        catch(\Exception $ex)
        {
            dd($ex->getMessage());
        }

        foreach($payment->getLinks() as $link)
        {
            if($link->getRel() == 'approval_url')
            {
                $redirectUrl = $link->getHref();
                break;
            }
        }

        // record payment id on order
        $order->payment_id_116 = $payment->getId();
        $order->save();


        if(isset($redirectUrl))
        {
            return redirect()->away($redirectUrl);
        }

        return redirect()->route('home')
            ->with('error', 'Unknown error occurred');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkoutPayment()
    {
        $paymentId  =  $this->request->input('paymentId');
        $payment    = Payment::get($paymentId, $this->apiContext);
        $execution  = new PaymentExecution();
        $execution->setPayerId( $this->request->input('PayerID'));

        try
        {
            $response = $payment->execute($execution, $this->apiContext);
        }
        catch(\Exception $ex)
        {
            dd($ex->getMessage());
        }

        $order = Order::builder()->where('payment_id_116',  $this->request->input('paymentId'))->first();

        if($response->getState() == 'approved')
        {
            if(!empty($order->order_status_successful_id_115))
            {
                // set next status to complete payment method
                $order->status_id_116 = $order->order_status_successful_id_115;
                $order->save();
            }

            $viewResponse['html'] = '
                <form id="redirect_paypal_form" action="' . route($this->preferences->where('id_018', 'marketPayPalSuccessRoute')->first()->value_018) . '" method="post">
                    <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                    <input type="hidden" name="order" value="' . $order->id_116 . '"/>
                </form>
                <script>document.getElementById("redirect_paypal_form").submit();</script>
            ';

            return view('pulsar::common.views.html_display', $viewResponse);
        }
        else
        {
            $viewResponse['html'] = '
                <form id="redirect_paypal_form" action="' . route($this->preferences->where('id_018', 'marketPayPalErrorRoute')->first()->value_018) . '" method="post">
                    <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                    <input type="hidden" name="order" value="' . $order->id_116 . '"/>
                </form>
                <script>document.getElementById("redirect_paypal_form").submit();</script>
            ';

            return view('pulsar::common.views.html_display', $viewResponse);
        }
    }
}