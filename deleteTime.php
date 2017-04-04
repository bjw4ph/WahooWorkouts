<?php
    
    if (!isset($_GET["id"])){
        header("Location: memberHome.php");
    }
    $type;
    if(isset($_GET["type"])){
        $type = true;
    } else {
        $type = false;
    }
    $id = $_GET["id"];

    $db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
    if ($db->connect_error):
        die ("Could not connect to db: " . $db->connect_error);
    endif;
    if($type){
        $results = $db->query("DELETE FROM trainerTimes WHERE trainerTimes.trainerTimes__id='$id'");
    } else {
        $results = $db->query("DELETE FROM userTimes WHERE userTimes.userTimes__id='$id'");
    }
    header("Location: memberHome.php?success=deleteTime")
    
?>