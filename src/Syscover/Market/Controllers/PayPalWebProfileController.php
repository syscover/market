<?php namespace Syscover\Market\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\ExecutePayment;
use Syscover\Pulsar\Models\Preference;

/**
 * Class PayPalWebProfileController
 * @package Syscover\Market\Controllers
 */

class PayPalWebProfileController extends Controller
{
    protected $routeSuffix	= 'marketPayPalWebProfile';
    protected $folder	   	= 'paypal_web_profile';
    protected $package	  	= 'market';
    protected $icon		 	= 'fa fa-users';
    protected $objectTrans  = 'web_profile';

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
            $clientID           = config('market.payPalLiveClientId');
            $secret             = config('market.payPalLiveSecret');
        }
        else
        {
            $clientID           = config('market.payPalSandboxClientId');
            $secret             = config('market.payPalSandboxSecret');
        }

        // init PayPal API Context
        $this->apiContext       = new ApiContext(new OAuthTokenCredential($clientID, $secret));

        // SDK configuration
        $this->apiContext->setConfig([
            'mode'                      => config('market.payPalMode'),         // Specify mode, sandbox or live
            'http.ConnectionTimeOut'    => 30,                                  // Specify the max request time in seconds
            'log.LogEnabled'            => true,                                // Whether want to log to a file
            'log.FileName'              => storage_path() . '/logs/paypal.log', // Specify the file that want to write on
            'log.LogLevel'              => 'FINE'                               // Available option 'FINE', 'INFO', 'WARN' or 'ERROR', Logging is most verbose in the 'FINE' level and decreases as you proceed towards ERROR
        ]);
    }

    public function customIndex($parameters)
    {
        $this->viewParameters['deleteSelectButton'] = false;

        try
        {
            $parameters['webProfiles'] = \PayPal\Api\WebProfile::get_list($this->apiContext);
        }
        catch (\PayPal\Exception\PayPalConnectionException $e)
        {
            dd($e);
        }

        return $parameters;
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