<?php
	if(!isset($_SESSION)) 
    { 
        session_start();
        if(isset($_SESSION["email"])){
			unset($_SESSION["email"]);
		} 
		session_destroy();
    }
	header("Location: index.php?success=logout");
	

?>
