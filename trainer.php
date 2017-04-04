<?php
	session_start(); 
    
    if(!isset($_SESSION["email"])){
        header("Location: login.php?error=needLogin&next=trainer.php");
    }
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

	include('header.php')
?>
							
				<div id="main-wrapper">
					<div class="container">
					<?php include('messaging.php') ?>
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
						                 <input type="hidden" name="partition" value="1" id="partitionSelect" hidden readonly/>
						    

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
			document.getElementById("partitionSelect").value = timesArray[counter]['Partition'];
			
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
<?php
	include('footer.php')
?>