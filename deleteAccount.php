<?php

	// Load classes needed
	function __autoload($class) {
	     require_once $class . '.php';
	}

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION["email"])){
    	header("Location: index.php?error=cantDelete");
    }

    $email = $_SESSION["email"];

	$db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;

	$query = "DELETE from siteUser where siteUser.Email= '$email'";
	$queryResult = $db->query($query);

	session_unset();
    session_destroy();

	header("Location: index.php?success=deleteAccount");

?>
