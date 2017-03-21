<?php
    /*
        * Home Page - has Sample Buyer credentials, Camera (Product) Details and Instructiosn for using the code sample
    */
    include('apiCallsData.php');
    include('paypalConfig.php');

    //setting the environment for Checkout script
    if(SANDBOX_FLAG) {
        $environment = SANDBOX_ENV;
    } else {
        $environment = LIVE_ENV;
    }
    $id;
    if(isset($_GET["id"])){
    	$id = $_GET["id"];
    } else {
    	$id = 1;
    }
    $query = "select * from siteUser, trainerInfo where siteUser.Email = trainerInfo.Email and siteUser.siteUser__id = '$id'";

	$db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;
	$results = $db->query($query);
	$trainer = $results->fetch_assoc();
	$email = $trainer["Email"];
	$query2 = "select * from trainerTimes where trainerTimes.Email = '$email'";
	$results2 = $db->query($query2);
	$times = [];
	while($row = $results2->fetch_assoc()){
		$times[] = $row;
	}
	$timeEncoded = json_encode($times);
	$timeEncoded = str_replace('"','\"', $timeEncoded);


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Trainer Info</title>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
			<link rel="stylesheet" href="assets/css/main.css" />
<!-- 		<link rel="stylesheet" type="text/css" href="userOptions.css"/>
 -->		<script src="http://code.jquery.com/jquery-latest.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
				    function updateStartFinish(){
				    	
				    }
				    $("#dateSelect").on("change", updateStartFinish());
				});
	
				
			
				
			</script>
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->		
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

				      <div class="navbar-brand" href="#" style="font-size:30px; color:black;">Wahoo Workouts</div>
					  

				      
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      
				      
				      <ul class="nav navbar-nav navbar-right">
				        <li><a href="index.html">Home</a></li>
				        <li class="active"><a href="#">Trainers</a></li>
				        <li><a href="aboutus.html">About Us</a></li>
				        <li><a href="signup.php">Sign Up</a></li>
				      </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
							
				<div id="main-wrapper">
					<div class="container">
						<article class="box post">
							<header style="text-align:center; padding-bottom:50px">
								<h2><?php echo($trainer["Name"]); ?></h2>
								<!-- <p>Lorem ipsum dolor sit amet feugiat</p> -->
							</header>
						<section>
							<div class=row>
								<div class="6u 12u(mobile)">
								<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" style="padding-top:25px" /></a>
								</div>
								<div class="6u 12u(mobile)">
					
									<header>
										<h3>Information</h3>
									</header>
									<p>
										<?php echo($trainer["Info"])?>
									</p>
									<header>
										<h3>Available Times</h3>
									</header>
									<table>
										<tr>
											<th>Date</th>
											<th>Start</th>
											<th>Finish</th>
										</tr>
										<?php
											for($i =0; $i < sizeof($times); $i++){
												echo "<tr><td>".$times[$i]["Date"]."</td><td>".$times[$i]["Start"]."</td><td>".$times[$i]["Finish"]."</td></tr>";
											}
										?>
									</table>
									<header>
										<h3>Payment Information</h3>
									</header>
									Hourly Rate: <?php echo($trainer["Pricing"]); ?> <br>
									<form action="startPayment.php" method="POST" onsubmit="checkStartFinish()">
										
										<table>
											<tr>
												<th>Date</th>
												<th>Start</th>
												<th>Finish</th>
											</tr>
											<tr>
												<td>
												<select class="form-control" type="text" name="date" id="dateSelect">
													<?php
														for($i = 0; $i < sizeof($times); $i++){
															echo("<option value=".$times[$i]["Date"].">".$times[$i]["Date"]."</option>");
														}
													?>
												</select>
												</td>
												<td>
												<select class="form-control" type="text" name="start" id="startSelect">
													<?php
														for($i= $times[0]["Start"]; $i <= $times[0]["Finish"]; $i++){
															echo("<option value=".$i.">".$i."</option>");
														}
													?>
												</select>
												</td>
												<td>
												<select class="form-control" type="text" name="finish" id="finishSelect">
													<?php
														for($i= $times[0]["Start"]; $i <= $times[0]["Finish"]; $i++){
															echo("<option value=".$i.">".$i."</option>");
														}
													?>
												</select>
												</td>
											</tr>
										</table>
										 <!-- Hours: <select class="form-control" type="text" name="hours">
										 	<option value="1">1</option>
										 	<option value="2">2</option>
										 	<option value="3">3</option>
										 	<option value="4">4</option>
										 	<option value="5">5</option>
										 </input> -->
										 
						                 <input type="hidden" name="csrf" value="<?php echo($_SESSION['csrf']);?>" hidden readonly/>
						                 <input type="hidden" name="pricing" value="<?php echo($trainer["Pricing"]);?>" hidden readonly/>
						                 <input type="hidden" name="trainer" value="<?php echo($trainer["Name"]); ?>" hidden readonly/>
						                 <input type="hidden" name="id" value="1" id="idSelect" hidden readonly/>
						    

						                <br/>
						                <!--Container for Checkout with PayPal button-->
						                <div id="myContainer"></div>
						                <br/>
						                
						            </form>

								</div>
							</div>
								
							<div id="responseText">
							</div>
							
						</section>
					</div>
				</div>
				<div id="footer-wrapper">
					<section id="footer" class="container">
						
						<div class="row">
							
							<div class="8u 12u(mobile)">
								<section>
									<header>
										<h2>Recent Listings</h2>
									</header>
									<ul class="dates">
										<li>
											<span class="date">Feb <strong>13</strong></span>
											<h3><a href="#">London Perrantes</a></h3>
											<p>Come learn some basketball fundamentals with me, London Perrantes</p>
										</li>
										<li>
											<span class="date">Jan <strong>23</strong></span>
											<h3><a href="#">Jack Salt</a></h3>
											<p>Come learn some basketball fundamentals with me, Jack Salt</p>
										</li>
										<li>
											<span class="date">Jan <strong>15</strong></span>
											<h3><a href="#">Devon Hall</a></h3>
											<p>Come learn some basketball funadmentals with me, Devon Hall</p>
										</li>
										<li>
											<span class="date">Jan <strong>12</strong></span>
											<h3><a href="#">Kyle Guy</a></h3>
											<p>Come learn some basketball fundamentals with me, Kyle Guy</p>
										</li>
										<li>
											<span class="date">Jan <strong>10</strong></span>
											<h3><a href="#">Ty Jerome</a></h3>
											<p>Come learn some basketball fundamentals with me, Ty Jerome</p>
										</li>
									</ul>
								</section>
							</div>
							<div class="4u 12u(mobile)">
								<section>
									<header>
										<h2>Connect With Us</h2>
									</header>
									<ul class="social">
										<li><a class="icon fa-facebook" href="#"><span class="label">Facebook</span></a></li>
										<li><a class="icon fa-twitter" href="#"><span class="label">Twitter</span></a></li>
										<li><a class="icon fa-dribbble" href="#"><span class="label">Dribbble</span></a></li>
										<li><a class="icon fa-linkedin" href="#"><span class="label">LinkedIn</span></a></li>
										<li><a class="icon fa-google-plus" href="#"><span class="label">Google+</span></a></li>
									</ul>
									<ul class="contact">
										<li>
											<h3>Address</h3>
											<p>
												Rice Hall<br />
												85 Engineer's Way<br />
												Charlottesville, VA 22903
											</p>
										</li>
										<li>
											<h3>Mail</h3>
											<p><a href="#">bjw4ph@wahooworkouts.com</a></p>
										</li>
										<li>
											<h3>Phone</h3>
											<p>(800) 000-0000</p>
										</li>
									</ul>
								</section>
							</div>
						</div>
						<!-- <div class="row">
							<div class="12u">

								
									<div id="copyright">
										<ul class="links">
											<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
										</ul>
									</div>

							</div>
						</div> -->
					</section>
				</div>

		</div>
	<script type="text/javascript">
		document.getElementById("dateSelect").addEventListener("click", updateStartFinish, false);
		function updateStartFinish(){
			var date = document.getElementById("dateSelect").value;
			console.log("Date:", date);
			counter=0
			var timesArray = JSON.parse("<?php echo($timeEncoded); ?>");
			//console.log(timesArray);
			// var row = "<?php echo json_encode($times) ?>";
			var row = timesArray[0]['Date'];
			while(row != date){
				counter ++;
				row = timesArray[counter]['Date'];
				
			}
			
			var start = timesArray[counter]['Start'];
			var finish = timesArray[counter]['Finish'];
			document.getElementById("idSelect").value = timesArray[counter]['trainerTimes__id'];
			console.log("Id: ", document.getElementById("idSelect").value);
			
			optionString = ""
			for (var j=start; j <= finish; j++){
				optionString += ("<option value=" + j + ">" + j + "</option>");
			}
			console.log("start:", start);
			console.log("finish:", finish);
			document.getElementById("startSelect").innerHTML=optionString;
			document.getElementById("finishSelect").innerHTML = optionString;
				
			 

		}
		function checkStartFinish(){
			if(document.getElementById("startSelect").value >= document.getElementById("finishSelect").value){
				alert("Start Time must be less than Finish Time");
				document.getElementById("startSelect").focus();
				return false;
			}
			return true;
		}
     window.paypalCheckoutReady = function () {
         paypal.checkout.setup('<?php echo(MERCHANT_ID); ?>', {
             container: 'myContainer', //{String|HTMLElement|Array} where you want the PayPal button to reside
             environment: '<?php echo($environment); ?>' //or 'production' depending on your environment
         });
     };
     </script>
     <script src="//www.paypalobjects.com/api/checkout.js" async></script>
	</body>
</html>