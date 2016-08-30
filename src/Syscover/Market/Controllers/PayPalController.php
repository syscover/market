<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
    private $webProfile;
    protected $viewParameters = [
        'newButton'             => true,    // button from index view to create record
        'cancelButton'          => true,    // button from form view to cancel and return to index
        'checkBoxColumn'        => true,    // checkbox from index view to select various records
        'showButton'            => false,   // button from ajax response, to view record
        'editButton'            => true,    // button from ajax response, to edit record
        'deleteButton'          => true,    // button from ajax response, to delete record
        'deleteSelectButton'    => true,    // button delete records when select checkbox on index view
        'relatedButton'         => false,   // button to related elements, used on modal windows
    ];

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
            $item->setName($row->name_117)              // product name
            ->setCurrency('EUR')                        // currency
            ->setQuantity(intval($row->quantity_117))   // quantity
            ->setPrice($row->price_117);                // unit price

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
        catch(Exception $ex)
        {
            //\ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $payment, $ex);
            exit;
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
            //\ResultPrinter::printError("Executed Payment", "Payment", null, null, $ex);
            exit(1);
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

    public function webProfiles()
    {
        try
        {
            $response['webProfiles'] = \PayPal\Api\WebProfile::get_list($this->apiContext);
        }
        catch (\PayPal\Exception\PayPalConnectionException $e)
        {
            dd($e);
        }

        // set viewParamentes on parameters for throw to view
        $parameters['viewParameters'] = $this->viewParameters;

        return view('market::paypal_web_profile.index', $response);
    }

    public function createWebProfile()
    {
        // ### Create Web Profile
        // Use the /web-profiles resource to create seamless payment experience profiles. See the payment experience overview for further information about using the /payment resource to create the PayPal payment and pass the experience_profile_id.
        // Documentation available at https://developer.paypal.com/webapps/developer/docs/api/#create-a-web-experience-profile

        // Lets create an instance of FlowConfig and add
        // landing page type information
        $flowConfig = new \PayPal\Api\FlowConfig();

        // Type of PayPal page to be displayed when a user lands on the PayPal site for checkout.
        // Allowed values: Billing or Login. When set to Billing, the Non-PayPal account landing page is used. When set to Login, the PayPal account login landing page is used.
        $flowConfig->setLandingPageType("Login");

        // The URL on the merchant site for transferring to after a bank transfer payment.
        $flowConfig->setBankTxnPendingUrl('http://urbansafari.es');

        // Parameters for style and presentation.
        $presentation = new \PayPal\Api\Presentation();

        // A URL to logo image. Allowed vaues: .gif, .jpg, or .png.
        $presentation->setLogoImage('http://urbansafari.es/images/logo-urbansafari-paypal.png')
            //	A label that overrides the business name in the PayPal account on the PayPal pages.
            ->setBrandName("urbansafari.es")
            //  Locale of pages displayed by PayPal payment experience.
            ->setLocaleCode("ES");

        // Parameters for input fields customization.
        $inputFields = new \PayPal\Api\InputFields();
        // Enables the buyer to enter a note to the merchant on the PayPal page during checkout.
        $inputFields->setAllowNote(true)
            // Determines whether or not PayPal displays shipping address fields on the experience pages.
            // Allowed values: 0, 1, or 2. When set to 0, PayPal displays the shipping address on the PayPal pages. When set to 1, PayPal does not display shipping address fields whatsoever. When set to 2, if you do not pass the shipping address, PayPal obtains it from the buyer’s account profile. For digital goods, this field is required, and you must set it to 1.
            ->setNoShipping(1)
            // Determines whether or not the PayPal pages should display the shipping address and not the shipping address on file with PayPal for this buyer. Displaying the PayPal street address on file does not allow the buyer to edit that address. Allowed values: 0 or 1. When set to 0, the PayPal pages should not display the shipping address. When set to 1, the PayPal pages should display the shipping address.
            ->setAddressOverride(0);

        // #### Payment Web experience profile resource
        $webProfile = new \PayPal\Api\WebProfile();

        // Name of the web experience profile. Required. Must be unique
        $webProfile->setName("UBANSAFARI" . uniqid())
            // Parameters for flow configuration.
            ->setFlowConfig($flowConfig)
            // Parameters for style and presentation.
            ->setPresentation($presentation)
            // Parameters for input field customization.
            ->setInputFields($inputFields);

        // For Sample Purposes Only.
        $this->request = clone $webProfile;

        try
        {
            // Use this call to create a profile.
            $createProfileResponse = $webProfile->create($this->apiContext);
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex)
        {
            //\ResultPrinter::printError("Created Web Profile", "Web Profile", null,  $this->request, $ex);
            exit(1);
        }
        var_dump($createProfileResponse);

        //ResultPrinter::printResult("Created Web Profile", "Web Profile", $createProfileResponse->getId(),  $this->request, $createProfileResponse);

        //return $createProfileResponse;
    }
}