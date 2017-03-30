<?php

	// Load classes needed
	function __autoload($class) {
	     require_once $class . '.php';
	}

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	$email;
	$password;
	if(isset($_POST["email"])){
		$email = $_POST["email"];
		$password = $_POST["password"];
	}


	$db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;
	$query = "select * from siteUser where siteUser.Email='$email' and siteUser.Password='$password'";
	$queryResult = $db->query($query);
	if($queryResult->num_rows == 0){
		
		header('Content-type: text/xml');
      	echo "<?xml version='1.0' encoding='utf-8'?>";
      	echo "<Word>";
      	echo "<value>Invalid Login Credentials</value>";
      	echo "</Word>";	

	} else {
		$_SESSION["email"] = $email;
		header('Content-type: text/xml');
      	echo "<?xml version='1.0' encoding='utf-8'?>";
      	echo "<Word>";
      	echo "<value>Successful Login</value>";
      	echo "</Word>";	
	}

?>
