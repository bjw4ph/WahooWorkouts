<?php

	// Load classes needed
	function __autoload($class) {
	     require_once $class . '.php';
	}

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	$db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;

	$query = "DELETE from siteUser where siteUser.Email= '$email'";
	$queryResult = $db->query($query);

	if($queryResult) {

	}
	header("Location: index.php?success=deleteAccount");
