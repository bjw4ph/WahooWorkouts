<?php
    
    if (!isset($_GET["email"])){
        header("Location: trainer.php");
    }
    $email = $_GET["email"];
    $query = "select * from siteUser where siteUser.Email = '$email'";

    $db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
    if ($db->connect_error):
        die ("Could not connect to db: " . $db->connect_error);
    endif;
    $results = $db->query($query);
    $user = $results->fetch_assoc();
    header("Location: trainer.php?id=".$user["siteUser__id"])
    
?>