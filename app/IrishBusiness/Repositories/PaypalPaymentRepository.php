<?php namespace Archiver\Repositories;
use User;
use Auth;
class PaypalPaymentRepository {

	protected $helper;
	protected $facebook2;

	/**
     * object to authenticate the call.
     * @param object $_apiContext
     */
    private $_apiContext;

    /**
     * Set the ClientId and the ClientSecret.
     * @param 
     *string $_ClientId
     *string $_ClientSecret
     */
    private $_ClientId='ARteZhDvXwv3xUCKA3SmW2zD-ngDXyzHruamBLhukL6QpXheDOpX-8JoLXEq';
    private $_ClientSecret='ELW-JhCKHZMuRG6uBLTQuFLLPzQPL6DaqaD0gx0bF_BCCe6N8l9VT2uA7a-U';

    /*
     *   These construct set the SDK configuration dynamiclly, 
     *   If you want to pick your configuration from the sdk_config.ini file
     *   make sure to update you configuration there then grape the credentials using this code :
     *   $this->_cred= Paypalpayment::OAuthTokenCredential();
    */


	public function __construct()
	{	

		$config = array (
		 	'mode' => 'sandbox' , 
		 	'acct1.UserName' => 'jb-us-seller_api1.paypal.com',
			'acct1.Password' => 'WX4WTU3S8MY44S7F', 
			'acct1.Signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31A7yDhhsPUU2XhtMoZXsWHFxu-RWy'
		);
		$paypalService = new PayPalAPIInterfaceServiceService($config);
		$paymentDetails= new PaymentDetailsType();

		$orderTotal = new BasicAmountType();
		$orderTotal->currencyID = 'USD';
		$orderTotal->value = 0;

		$paymentDetails->OrderTotal = $orderTotal;
		$paymentDetails->PaymentAction = 'Sale';

		$setECReqDetails = new SetExpressCheckoutRequestDetailsType();
		$setECReqDetails->PaymentDetails[0] = $paymentDetails;
		$setECReqDetails->CancelURL = 'https://devtools-paypal.com/guide/recurring_payment_ec/php?cancel=true';
		$setECReqDetails->ReturnURL = 'https://devtools-paypal.com/guide/recurring_payment_ec/php?success=true';
		  
		$billingAgreementDetails = new BillingAgreementDetailsType('RecurringPayments');
		$billingAgreementDetails->BillingAgreementDescription = 'recurringbilling';
		$setECReqDetails->BillingAgreementDetails = array($billingAgreementDetails);

		$setECReqType = new SetExpressCheckoutRequestType();
		$setECReqType->Version = '104.0';
		$setECReqType->SetExpressCheckoutRequestDetails = $setECReqDetails;

		$setECReq = new SetExpressCheckoutReq();
		$setECReq->SetExpressCheckoutRequest = $setECReqType;

		$setECResponse = $paypalService->SetExpressCheckout($setECReq);
		
	}

	 /*
        Use this call to get a list of payments. 
        url:payment/
    */
    public function index()
    {
        echo "<pre>";

        $payments = Paypalpayment::all(array('count' => 1, 'start_index' => 0),$this->_apiContext);

        print_r($payments);
    }

	public function create(){
		
	}

	/*
        Use this call to get details about payments that have not completed, 
        such as payments that are created and approved, or if a payment has failed.
        url:payment/PAY-3B7201824D767003LKHZSVOA
    */

    public function show($payment_id)
    {
       
    }
}

?>