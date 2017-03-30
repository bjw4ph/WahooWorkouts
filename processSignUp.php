<?php

	// Load classes needed
	function __autoload($class) {
	     require_once $class . '.php';
	}

	session_start();
	$name;
	$email;
	$address; 
	$city;
	$state;
	$zipcode;
	$password;
	if(isset($_POST["name"])){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$zipcode = $_POST["zipcode"];
		$password = $_POST["password"];
	}

	if(isset($_COOKIE["signupEmail"])){
		unset($_COOKIE["signupEmail"]);
	}
	setcookie("signupEmail", $email);

	$db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;
	$query = "select * from siteUser where siteUser.Email='$email'";
	$queryResult = $db->query($query);
	if($queryResult->num_rows == 0){
		$countQuery = "select * from siteUser";
		$countResult = $db->query($countQuery);
		$counter = $countResult->num_rows +1;

		$query3 = "insert into siteUser values ('$counter', '$name', '$email', '$address', '$city', '$state', '$zipcode', '$password') ";
		$db->query($query3) or die("Invalid Insert " .$db->error);
		

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
		

		$email = strip_tags($email);
			  // Put information into the message
		$mail->SetFrom("wahooworkouts@gmail.com");
		$mail->Subject = "Wahoo WOrkouts - Succesfully Registered!";
		$address = strip_tags($email);
		$mail->addAddress($email, "Person");
		$mail->Body = "Thank you for registering with Wahoo Workouts! We hope you are able to find the fitness regimen for you";
		$mail->send();



		header('Content-type: text/xml');
      	echo "<?xml version='1.0' encoding='utf-8'?>";
      	echo "<Word>";
      	echo "<value>Successfully added</value>";
      	echo "</Word>";	

	
	} else {
	
		header('Content-type: text/xml');
      	echo "<?xml version='1.0' encoding='utf-8'?>";
      	echo "<Word>";
      	echo "<value>User with that email already exists</value>";
      	echo "</Word>";	
	}

?>
