<?php
	/*
		* Contains call to create payment object and receive Approval URL to which user is then redirected to.
	*/
	if (session_id() == "")
		session_start();

	include('utilFunctions.php');
	include('paypalFunctions.php');

	$access_token = getAccessToken();
	$_SESSION['access_token'] = $access_token;

	if(verify_nonce()){
		if(isset($_POST['markFlow']) && $_POST['markFlow'] == "true"){ //Proceed to Checkout or Mark flow

        		$markFlowArray = json_decode($_SESSION['markFlowPaymentData'], true);
        		$markFlowArray['transactions'][0]['amount']['total'] = (float)$markFlowArray['transactions'][0]['amount']['total'] + (float)$_POST['shipping_method'] - (float)$markFlowArray['transactions'][0]['amount']['details']['shipping'];
        		$markFlowArray['transactions'][0]['amount']['details']['shipping'] = $_POST['shipping_method'];
        		$markFlowArray['transactions'][0]['item_list']['shipping_address']['recipient_name'] =  filter_input( INPUT_POST, 'recipient_name', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['line1'] =  filter_input( INPUT_POST, 'line1', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['line2'] =  filter_input( INPUT_POST, 'line2', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['city'] =  filter_input( INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['country_code'] =  filter_input( INPUT_POST, 'country_code', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['postal_code'] =  filter_input( INPUT_POST, 'postal_code', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['state'] =  filter_input( INPUT_POST, 'state', FILTER_SANITIZE_SPECIAL_CHARS );
        		$markFlowJson = json_encode($markFlowArray);
        		$approval_url = getApprovalURL($access_token, $markFlowJson). "&useraction=commit";
        	} else { //Express checkout flow
                        $total = intval($_POST["pricing"]) * (intval($_POST["finish"]) - intval($_POST["start"]));
                        //$total = 60 * intval($_POST["hours"]);
        		$expressCheckoutArray = json_decode($_SESSION['expressCheckoutPaymentData'], true);
        		$expressCheckoutArray['transactions'][0]['amount']['details']['subtotal'] = $total;
        		$expressCheckoutArray['transactions'][0]['item_list']['items'][0]['price'] = $total;
        		// $expressCheckoutArray['transactions'][0]['item_list']['items'][0]['currency'] = $_POST['currencyCodeType'];
        		// $expressCheckoutArray['transactions'][0]['amount']['details']['tax'] = $_POST['tax'];
        		// $expressCheckoutArray['transactions'][0]['amount']['details']['insurance'] = $_POST['insurance'];
        		// $expressCheckoutArray['transactions'][0]['amount']['details']['shipping'] = $_POST['estimated_shipping'];
        		// $expressCheckoutArray['transactions'][0]['amount']['details']['handling_fee'] = $_POST['handling_fee'];
        		// $expressCheckoutArray['transactions'][0]['amount']['details']['shipping_discount'] = $_POST['shipping_discount'];
        		$expressCheckoutArray['transactions'][0]['amount']['total'] = (float)$total;
        		// $expressCheckoutArray['transactions'][0]['amount']['currency'] = $_POST['currencyCodeType'];

        		$_SESSION['expressCheckoutPaymentData'] = json_encode($expressCheckoutArray);
        		$approval_url = getApprovalURL($access_token, $_SESSION['expressCheckoutPaymentData']);
        	}

        	if(isset($_COOKIE["orderTrainer"])){
                        unset($_COOKIE["orderTrainer"]);
                        unset($_COOKIE["orderID"]);
                        unset($_COOKIE["orderDate"]);
                        unset($_COOKIE["orderStart"]);
                        unset($_COOKIE["orderFinish"]);
                        unset($_COOKIE["orderPartition"]);
                }
                setcookie("orderTrainer", $_POST["trainer"]);
                setcookie("orderDate", $_POST["date"]);
                setcookie("orderStart", $_POST["start"]);
                setcookie("orderFinish", $_POST["finish"]);
                setcookie("orderID", $_POST["id"]);
                setcookie("orderPartition", $_POST["partition"]);

                //redirect user to the Approval URL
        	header("Location:".$approval_url);
	}else {
		 die('Session expired');
	}

?>