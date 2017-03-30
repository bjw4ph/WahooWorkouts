<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $loggedIn = false;
    if(isset($_SESSION["email"])){
        $loggedIn = true;
    }
?>
<!DOCTYPE HTML>
<!--
    Dopetrope by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
    <style>
    </style>
        <title>Wahoo Workouts</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/bootstrap-theme.css" rel="stylesheet">

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="projectSetup.js"></script>
    </head>
    <body id="theBody">
        <?php
            if($loggedIn){
                echo "<div id='loginEmail' data-auth='yes'></div>";
            } else {
                echo "<div id='loginEmail' data-auth='no'></div>";
            }
        ?>
        <div id="page-wrapper">
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container-fluid">
                
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.html">
                    <img alt="Brand" src="images/logo.png" style="height:40px; padding-bottom:10px">
                  </a>

                  <div class="navbar-brand" href="index.html" style="font-size:30px; color:black;">Wahoo Workouts</div>
                  

                  
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  
                  
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php" id="nav1">Home</a></li>
                    <li><a href="trainer.php" id="nav2">Trainers</a></li>
                    <li><a href="aboutus.php" id="nav3">About Us</a></li>
                    <li><a href="signup.php" id="nav4">Sign Up</a></li>
                    <li><a href="login.php" id="nav5">Login</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
            



