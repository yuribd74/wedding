<?php
/*==================================================================
 PayPal Express Checkout Call
 ===================================================================
*/
// Check to see if the Request object contains a variable named 'token'	
$token = "";
if (isset($_REQUEST['token']))
{
	$token = $_REQUEST['token'];
	
}

// If the Request object contains the variable 'token' then it means that the user is coming from PayPal site.	
if ( $token != "" )
{

	require_once ("paypalfunctions.php");

	/*
	'------------------------------------
	' Calls the GetExpressCheckoutDetails API call
	'
	' The GetShippingDetails function is defined in PayPalFunctions.jsp
	' included at the top of this file.
	'-------------------------------------------------
	*/
	

	$resArray = GetShippingDetails( $token );
	$ack = strtoupper($resArray["ACK"]);
	if( $ack == "SUCCESS" || $ack == "SUCESSWITHWARNING") 
	{
		/*
		' The information that is returned by the GetExpressCheckoutDetails call should be integrated by the partner into his Order Review 
		' page		
		*/
		$email 				= $resArray["EMAIL"]; // ' Email address of payer.
		$payerId 			= $resArray["PAYERID"]; // ' Unique PayPal customer account identification number.
		$payerStatus		= $resArray["PAYERSTATUS"]; // ' Status of payer. Character length and limitations: 10 single-byte alphabetic characters.
		$salutation			= $resArray["SALUTATION"]; // ' Payer's salutation.
		$firstName			= $resArray["FIRSTNAME"]; // ' Payer's first name.
		$middleName			= $resArray["MIDDLENAME"]; // ' Payer's middle name.
		$lastName			= $resArray["LASTNAME"]; // ' Payer's last name.
		$suffix				= $resArray["SUFFIX"]; // ' Payer's suffix.
		$cntryCode			= $resArray["COUNTRYCODE"]; // ' Payer's country of residence in the form of ISO standard 3166 two-character country codes.
		$business			= $resArray["BUSINESS"]; // ' Payer's business name.
		$shipToName			= $resArray["PAYMENTREQUEST_0_SHIPTONAME"]; // ' Person's name associated with this address.
		$shipToStreet		= $resArray["PAYMENTREQUEST_0_SHIPTOSTREET"]; // ' First street address.
		$shipToStreet2		= $resArray["PAYMENTREQUEST_0_SHIPTOSTREET2"]; // ' Second street address.
		$shipToCity			= $resArray["PAYMENTREQUEST_0_SHIPTOCITY"]; // ' Name of city.
		$shipToState		= $resArray["PAYMENTREQUEST_0_SHIPTOSTATE"]; // ' State or province
		$shipToCntryCode	= $resArray["PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE"]; // ' Country code. 
		$shipToZip			= $resArray["PAYMENTREQUEST_0_SHIPTOZIP"]; // ' U.S. Zip code or other country-specific postal code.
		$addressStatus 		= $resArray["ADDRESSSTATUS"]; // ' Status of street address on file with PayPal   
		$invoiceNumber		= $resArray["INVNUM"]; // ' Your own invoice or tracking number, as set by you in the element of the same name in SetExpressCheckout request .
		$phonNumber			= $resArray["PHONENUM"]; // ' Payer's contact telephone number. Note:  PayPal returns a contact telephone number only if your Merchant account profile settings require that the buyer enter one. 
		
		$netamount = $resArray["AMT"] * (100 / $_COOKIE['deppercent']);		
		$t = array($token => 
				array('Payer_ID' => $payerId, 'First_Name' => $firstName, 'Last_Name' => $lastName, 'Email' => $email, 'Country' => $cntryCode, 'Amount' => $resArray["AMT"], 'Room_ID' => $_COOKIE['roomid'], 'Service_IDs' => $_COOKIE['serviceids'], 'Check_In' => $_COOKIE['checkin'], 'Check_Out' => $_COOKIE['checkout'], 'Adults' => $_COOKIE['adults'], 'Childs' => $_COOKIE['childs'], 'Deposit_Due' => $_COOKIE['deppercent'], 'Net_Amount' => $netamount ));

		$tdetails = get_option('hb_order_settings');

		if($tdetails == NULL) {
			update_option('hb_order_settings', $t);
		} else {
			$tdetails = array_merge($tdetails, $t);
			update_option('hb_order_settings', $tdetails);
		}

		veda_admin_notify($token, $firstName, $lastName, $email, $resArray["AMT"], $_COOKIE['roomid'], $_COOKIE['checkin'], $_COOKIE['checkout'], $_COOKIE['adults'], $_COOKIE['childs'], $_COOKIE['deppercent'], $netamount);
		veda_user_notify($token, $firstName, $email, $resArray["AMT"], $_COOKIE['roomid'], $_COOKIE['serviceids'], $_COOKIE['checkin'], $_COOKIE['checkout'], $_COOKIE['adults'], $_COOKIE['childs'], $_COOKIE['deppercent'], $netamount);
		
		setcookie('checkin', "", (time()-3600), "/"); setcookie('checkout', "", (time()-3600), "/");
		setcookie('adults', "", (time()-3600), "/"); setcookie('childs', "", (time()-3600), "/");
		setcookie('roomid', "", (time()-3600), "/"); setcookie('serviceids', "", (time()-3600), "/");
		setcookie('deppercent', "", (time()-3600), "/");
	}
	else
	{
		//Display a user friendly Error on the page using any of the following error information returned by PayPal
		$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
		$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
		$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
		$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
		
		echo "GetExpressCheckoutDetails API call failed. ";
		echo "Detailed Error Message: " . $ErrorLongMsg;
		echo "Short Error Message: " . $ErrorShortMsg;
		echo "Error Code: " . $ErrorCode;
		echo "Error Severity Code: " . $ErrorSeverityCode;
	}
}		
?>