<?php

	// Load classes needed
	function __autoload($class) {
	     require_once $class . '.php';
	}

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	$date;
	$start;
	$finish; 

	if(isset($_POST["date"])){
		$date = $_POST["date"];
		$start = $_POST["start"];
		$finish = $_POST["finish"];
	}

	$email = $_SESSION["email"];

	$db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;
	
	$countQuery = "select * from trainerTimes";
	$countResult = $db->query($countQuery);
	$counter = $countResult->num_rows +1;

	$query3 = "insert into trainerTimes values ('$counter', '$email', '$date', '$start', '$finish', '1') ";
	$db->query($query3) or die("Invalid Insert " .$db->error);

	// header("Location: memberHome.php?success=addTime");
	


	

?>
