<?php
    /*
        * Payment Confirmation page : has call to execute the payment and displays the Confirmation details
    */
    function __autoload($class) {
         require_once $class . '.php';
    }
    if (session_id() == "")
        session_start();
    $userEmail = $_SESSION["email"];
    include('utilFunctions.php');
    include('paypalFunctions.php');


    if( isset($_GET['paymentId']) && isset($_GET['PayerID'])){ //Proceed to Checkout or Mark flow

        //call to execute payment
        $response = doPayment(filter_input( INPUT_GET, 'paymentId', FILTER_SANITIZE_STRING ), filter_input( INPUT_GET, 'PayerID', FILTER_SANITIZE_STRING ), NULL);

    } else { //Express checkout flow

        if(verify_nonce()){
            $expressCheckoutFlowArray = json_decode($_SESSION['expressCheckoutPaymentData'], true);
                    // $expressCheckoutFlowArray['transactions'][0]['amount']['total'] = (float)$expressCheckoutFlowArray['transactions'][0]['amount']['total'] + (float)$_POST['shipping_method'] - (float)$expressCheckoutFlowArray['transactions'][0]['amount']['details']['shipping'];
                    // $expressCheckoutFlowArray['transactions'][0]['amount']['details']['shipping'] = $_POST['shipping_method'];
                    $transactionAmountUpdateArray = $expressCheckoutFlowArray['transactions'][0];
                    $_SESSION['expressCheckoutPaymentData'] = json_encode($expressCheckoutFlowArray);

                    //call to execute payment with updated shipping and overall amount details
                    $response = doPayment($_SESSION['paymentID'], $_SESSION['payerID'], $transactionAmountUpdateArray);
        } else {
            die('Session expired');
        }
    }
	
	// REST validation; route non-HTTP 200 to error page
	if ($response['http_code'] != 200 && $response['http_code'] != 201) {		
		$_SESSION['error'] = $response;
		header( 'Location: error.php');
		
		// need exit() here to maintain session data after redirect to error page
		exit();
	}
	
	$json_response = $response['json']; 
	
    $paymentID= $json_response['id'];
    $paymentState = $json_response['state'];
    $finalAmount = $json_response['transactions'][0]['amount']['total'];
    $currency = $json_response['transactions'][0]['amount']['currency'];
    $transactionID= $json_response['transactions'][0]['related_resources'][0]['sale']['id'];

    $payerFirstName = filter_var($json_response['payer']['payer_info']['first_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $payerLastName = filter_var($json_response['payer']['payer_info']['last_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $recipientName= filter_var($json_response['payer']['payer_info']['shipping_address']['recipient_name'],FILTER_SANITIZE_SPECIAL_CHARS);
    $addressLine1= filter_var($json_response['payer']['payer_info']['shipping_address']['line1'],FILTER_SANITIZE_SPECIAL_CHARS);
    $addressLine2 = (isset($json_response['payer']['payer_info']['shipping_address']['line2']) ? filter_var($json_response['payer']['payer_info']['shipping_address']['line2'],FILTER_SANITIZE_SPECIAL_CHARS) :  "" );
    $city= filter_var($json_response['payer']['payer_info']['shipping_address']['city'],FILTER_SANITIZE_SPECIAL_CHARS);
    $state= filter_var($json_response['payer']['payer_info']['shipping_address']['state'],FILTER_SANITIZE_SPECIAL_CHARS);
    $postalCode = filter_var($json_response['payer']['payer_info']['shipping_address']['postal_code'],FILTER_SANITIZE_SPECIAL_CHARS);
    $countryCode= filter_var($json_response['payer']['payer_info']['shipping_address']['country_code'],FILTER_SANITIZE_SPECIAL_CHARS);
	
    include('header.php');

    #Update Database with Transaction
    $timeID = $_COOKIE["orderID"];
    $query = "select * from trainerTimes where trainerTimes.trainerTimes__id = '$timeID'";

    $db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
    if ($db->connect_error):
        die ("Could not connect to db: " . $db->connect_error);
    endif;
    $results = $db->query($query);
    $start = $_COOKIE["orderStart"];
    $finish = $_COOKIE["orderFinish"];
    $updateTime = $results->fetch_assoc();
    if($start == $updateTime['Start']){
        if($finish == $updateTime['Finish']){
            $oldFinish = $updateTime['Finish'];
            $query2 = "UPDATE trainerTimes SET trainerTimes.Start = '$oldFinish' WHERE trainerTimes.trainerTimes__id = '$timeID' ";
            $db->query($query2);
        } else {
            $query2 = "UPDATE trainerTimes SET trainerTimes.Start = '$finish' WHERE trainerTimes.trainerTimes__id = '$timeID' ";
            $db->query($query2);
        }
    } else {
        if($finish == $updateTime['Finish']){
            $query2 = "UPDATE trainerTimes SET trainerTimes.Finish = '$start' WHERE trainerTimes.trainerTimes__id = '$timeID' ";
            $db->query($query2);
        } else {
            $time = $updateTime['Date'];
            $query2 = "select * from trainerTimes where trainerTimes.Date = '$time'";
            $results2 = $db->query($query);
            $query3 = "select * from trainerTimes";
            $countResults = $db->query($query3);
            $counter = $countResults->num_rows+1;
            $newPartition = $updateTime['Block']+1;
            $email = $updateTime['Email'];
            $date = $updateTime['Date'];
            $oldStart = $updateTime['Start'];
            $oldFinish = $updateTime['Finish'];
            $query4 = "insert into trainerTimes values ('$counter', '$email', '$date', '$finish', '$oldFinish', '$newPartition')";
            $db->query($query4);
            $query5 = "UPDATE trainerTimes SET trainerTimes.Finish = '$start' WHERE trainerTimes.trainerTimes__id = '$timeID' ";
            $db->query($query5);
            if($updateTime['Block'] != $results2->num_rows){
                while($row = $results2->fetch_assoc()){
                    if($updateTime['Block'] < $row['Block']){
                        $rowID = $row['trainerTimes__id'];
                        $newPartition = $row['Block'] + 1;
                        $query6 ="UPDATE trainerTimes SET trainerTimes.Block = '$newPartition' WHERE trainerTimes.trainerTimes__id = '$rowID' "; 
                    }
                }
            }

        }

    }
    $query3 = "select * from userTimes";
    $countResults = $db->query($query3);
    $counter = $countResults->num_rows+1;
    $email = $updateTime['Email'];
    $date = $updateTime['Date'];
    $queryUser = "insert into userTimes values ('$counter', '$userEmail','$email', '$date', '$start', '$finish')";
    $db->query($queryUser)

?>
    <div id="main-wrapper">
        <div class="container">
            <article class="box post">
                <header style="text-align:center">
                    <h2>Order Complete</h2>
                    <!-- <p>Lorem ipsum dolor sit amet feugiat</p> -->
                </header>
                <section style="text-align:center">
            
                    <h4>
                        <?php echo($payerFirstName.' '.$payerLastName.', Thank you for your Order!');?><br/><br/>
                        
                        <h4>Payment ID: <?php echo($paymentID);?> <br/>
                        Transaction ID : <?php echo($transactionID);?> <br/>
                        State : <?php echo($paymentState);?> <br/>
                        Total Amount: <?php echo($finalAmount);?> &nbsp;  <?php echo($currency);?> <br/>
                    </h4>
                    <br/>
                    Return to <a href="index.php">home page</a>.
                </section>
            </article>
        </div>
            
    </div>
    
<?php
    $mailpath = '/xampp/htdocs/WahooWorkouts/PHPMailer';
    $path = get_include_path();
    set_include_path($path . PATH_SEPARATOR . $mailpath);
    require 'PHPMailerAutoload.php';

    $mail = new PHPMailer();
     
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets tls authentication
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server; or your email service
    $mail->Port = 587; // set the SMTP port for GMAIL server; or your email server port
    $mail->Username = "wahooworkouts@gmail.com"; // email username
    $mail->Password = "UVACSROCKS"; // email password
    
    $email = $_COOKIE["signupEmail"];
    echo($email);
    // $email = str_replace("%40", "@", $email);
    // echo($email);
    $email = strip_tags($userEmail);
          // Put information into the message
    $mail->SetFrom("wahooworkouts@gmail.com");
    $mail->Subject = "Wahoo WOrkouts - Thank You For Your Purchase!";
    $address = strip_tags($email);
    $mail->addAddress($email, "Person");
    $mail->Body = "Thank you for your purchase! Your order information is: 
    Trainer: ".$_COOKIE["orderTrainer"]."
    Date: ".$_COOKIE["orderDate"]."
    Start: ".$_COOKIE["orderStart"]."
    Finish: ".$_COOKIE["orderFinish"];
    $mail->send();
    $email;
    if (session_id() !== "") {
            if(isset($_SESSION['email'])){
                $email = $_SESSION['email'];
            } else {
                $email = false;
            }
               session_unset();
               session_destroy();
            }
    session_start();
    if($email){
      $_SESSION['email'] = $email;
    }
    include('footer.php');
?>

