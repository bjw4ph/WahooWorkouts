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
	if(isset($_POST["name"])){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$zipcode = $_POST["zipcode"];
	}

	$db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;
	$query = "select * from siteUser where siteUser.Name='$name'";
	$queryResult = $db->query($query);
	if($queryResult->num_rows == 0){
		$countQuery = "select * from siteUser";
		$countResult = $db->query($countQuery);
		$counter = $countResult->num_rows +1;

		$query3 = "insert into siteUser values ('$counter', '$name', '$email', '$address', '$city', '$state', '$zipcode') ";
		$db->query($query3) or die("Invalid Insert " .$db->error);
		header('Content-type: text/xml');
      	echo "<?xml version='1.0' encoding='utf-8'?>";
      	echo "<Word>";
      	echo "<value>Successfully added</value>";
      	echo "</Word>";	

	
	} else {
	
		header('Content-type: text/xml');
      	echo "<?xml version='1.0' encoding='utf-8'?>";
      	echo "<Word>";
      	echo "<value>User already exists</value>";
      	echo "</Word>";	
	}

?>
