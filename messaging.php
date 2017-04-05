<?php

if(isset($_GET["success"])){
    echo "<div class='alert alert-success' role='alert' style='margin-top:0px'>";
    if($_GET["success"] == 'signup'){
        echo "Successfully Signed Up";
    }
    else if($_GET["success"] == 'login'){
        echo "Successfully Logged In";
    }
    else if($_GET["success"] == 'logout'){
        echo "Successfully Logged Out";
    }
    else if($_GET["success"] == 'deleteTime'){
        echo "Appointment Successfully Deleted";
    }
    else if($_GET["success"] == 'deleteAccount'){
        echo "Account Successfully Deleted";
    }
    else {
        echo "Operation Successful";
    }
    echo "</div>";
}

if(isset($_GET["error"])){
    echo "<div class='alert alert-warning' role='alert' style='margin-top:0px'>";
    if($_GET["error"] == 'needLogin'){
        echo "Need to Log In to View This Page";
    }
    else {
        echo "Something Wrong with your Request";
    }
    echo "</div>";
}
?>

