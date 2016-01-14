<?php namespace Syscover\Market\Controllers;

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
use Syscover\Pulsar\Models\Preference;

class PaypalController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalConf         = config('paypal');
        $this->apiContext   = new ApiContext(new OAuthTokenCredential($payPalConf['clientId'], $payPalConf['secret']));
        $this->apiContext->setConfig($payPalConf['settings']);
    }

    public function createPayment(Request $request)
    {
        $preferences = Preference::getValues(12);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // create products
        $products = [];
        foreach(Cart::content() as $row)
        {
            $item = new Item();
            $item->setName($row->name)          // product name
            ->setCurrency('EUR')                // currency
            ->setQuantity($row->qty)            // quantity
            ->setPrice($row->price);            // unit price

            $products[] = $item;
        }

        // products list
        $itemList = new ItemList();
        $itemList->setItems($products);

        // total charge
        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal(Cart::total());

        // create transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription($preferences->where('id_018', 'marketPayPalDescriptionItemList'));

        // config URL request
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('home'))
            ->setCancelUrl(route('home'));

        // create payment
        $payment = new Payment();
        $payment->setIntent('sale')
            //->setExperienceProfileId('XP-M8GR-6H28-68EN-ZB3Y') // web profile sandbox
            ->setExperienceProfileId('XP-QURY-XR3C-D2EF-CN6X') // web profile live
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try
        {
            $payment->create($this->apiContext);
        }
        catch(Exception $ex)
        {
            ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $payment, $ex);
            exit(1);
        }

        foreach($payment->getLinks() as $link)
        {
            if($link->getRel() == 'approval_url')
            {
                $redirectUrl = $link->getHref();
                break;
            }
        }

        // resgitrar dato en el pedido
        //$payment->getId();


        if(isset($redirectUrl))
        {
            return redirect()->away($redirectUrl);
        }

        return redirect()->route('home')
            ->with('error', 'Unknown error occurred');
    }

    public function checkoutPayment(Request $request)
    {
        if(Session::has('order') && Session::get('order')['paypalPayment'] == $request->input('paymentId'))
        {
            $paymentId = $request->input('paymentId');
            $payment = Payment::get($paymentId, $this->apiContext);

            $execution = new PaymentExecution();
            $execution->setPayerId($request->input('PayerID'));

            try
            {
                $result = $payment->execute($execution, $this->apiContext);
            }
            catch(Exception $ex)
            {
                ResultPrinter::printError("Executed Payment", "Payment", null, null, $ex);
                exit(1);
            }

            $data = Session::get('order');

            Pedido::where('paypal_payment_212', $request->input('paymentId'))->update([
                'paypal_payer_212'  => $request->input('PayerID'),
                'paypal_token_212'  => $request->input('token'),
                'estado_212'        => 1
            ]);

            $pedido = Pedido::where('paypal_payment_212', $request->input('paymentId'))->first();

            $data['url']            = route('getOrder', ['token' => $pedido->token_212]);
            $data['email']          = $pedido->email_212;
            $data['facturacion']    = $pedido->facturacion_212;

            $emailData = [
                'email'             => $pedido->email_212,
                'facturacion'       => $data['facturacion'],
                'nEntidad'          => $data['nEntidad'],
                'nMultisectorial'   => $data['nMultisectorial'],
                'nIncubadora'       => $data['nIncubadora'],
                'url'               => $data['url']
            ];

            Mail::send('emails.common.order', $emailData, function ($message) use ($emailData) {
                $message->to($emailData['email'])->subject('MI FINANCIACIÓN - Su pedido');

                $mails = config('web.emailsContact');
                foreach ($mails as $mail) {
                    $message->bcc($mail['email'], $mail['nombre']);
                }
            });

            return view('www.order-ok', $data);
        }
    }



    public function createWebProfile()
    {
        // ### Create Web Profile
        // Use the /web-profiles resource to create seamless payment experience profiles. See the payment experience overview for further information about using the /payment resource to create the PayPal payment and pass the experience_profile_id.
        // Documentation available at https://developer.paypal.com/webapps/developer/docs/api/#create-a-web-experience-profile

        // Lets create an instance of FlowConfig and add
        // landing page type information
        $flowConfig = new \PayPal\Api\FlowConfig();
        // Type of PayPal page to be displayed when a user lands on the PayPal site for checkout. Allowed values: Billing or Login. When set to Billing, the Non-PayPal account landing page is used. When set to Login, the PayPal account login landing page is used.
        $flowConfig->setLandingPageType("Billing");
        // The URL on the merchant site for transferring to after a bank transfer payment.
        $flowConfig->setBankTxnPendingUrl('http://dev.ruralka.com');

        // Parameters for style and presentation.
        $presentation = new \PayPal\Api\Presentation();

        // A URL to logo image. Allowed vaues: .gif, .jpg, or .png.
        $presentation->setLogoImage('http://dev.ruralka.com/images/logo-ruralka.png')
            //	A label that overrides the business name in the PayPal account on the PayPal pages.
            ->setBrandName("ruralka.com")
            //  Locale of pages displayed by PayPal payment experience.
            ->setLocaleCode("ES");

        // Parameters for input fields customization.
        $inputFields = new \PayPal\Api\InputFields();
        // Enables the buyer to enter a note to the merchant on the PayPal page during checkout.
        $inputFields->setAllowNote(true)
            // Determines whether or not PayPal displays shipping address fields on the experience pages. Allowed values: 0, 1, or 2. When set to 0, PayPal displays the shipping address on the PayPal pages. When set to 1, PayPal does not display shipping address fields whatsoever. When set to 2, if you do not pass the shipping address, PayPal obtains it from the buyer’s account profile. For digital goods, this field is required, and you must set it to 1.
            ->setNoShipping(1)
            // Determines whether or not the PayPal pages should display the shipping address and not the shipping address on file with PayPal for this buyer. Displaying the PayPal street address on file does not allow the buyer to edit that address. Allowed values: 0 or 1. When set to 0, the PayPal pages should not display the shipping address. When set to 1, the PayPal pages should display the shipping address.
            ->setAddressOverride(0);

        // #### Payment Web experience profile resource
        $webProfile = new \PayPal\Api\WebProfile();

        // Name of the web experience profile. Required. Must be unique
        $webProfile->setName("RURALKA" . uniqid())
            // Parameters for flow configuration.
            ->setFlowConfig($flowConfig)
            // Parameters for style and presentation.
            ->setPresentation($presentation)
            // Parameters for input field customization.
            ->setInputFields($inputFields);

        // For Sample Purposes Only.
        $request = clone $webProfile;

        try {
            // Use this call to create a profile.
            $createProfileResponse = $webProfile->create($this->apiContext);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            ResultPrinter::printError("Created Web Profile", "Web Profile", null, $request, $ex);
            exit(1);
        }
        var_dump($createProfileResponse);
        //ResultPrinter::printResult("Created Web Profile", "Web Profile", $createProfileResponse->getId(), $request, $createProfileResponse);

        //return $createProfileResponse;
    }
}