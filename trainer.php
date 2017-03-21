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
								<h2>Florence Joyner</h2>
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
									<p>Come on my cardio journey to learn the way to burn those pesky calories and lose fat while making friends and having a great time</p>
									<header>
										<h3>Payment Information</h3>
									</header>
									Hourly Rate: $60 <br>
									<form action="startPayment.php" method="POST">
										<div>
										 Hours: <select class="form-control" type="text" name="hours">
										 	<option value="1">1</option>
										 	<option value="2">2</option>
										 	<option value="3">3</option>
										 	<option value="4">4</option>
										 	<option value="5">5</option>
										 </input>
										 </div>
						                 <input type="hidden" name="csrf" value="<?php echo($_SESSION['csrf']);?>" hidden readonly/>
						    

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
	<script>
		
	
		function createNewUser(){
			var regOnlyLetters = /^[a-zA-Z]+$/
			var regAlphanumeric = /^[a-zA-Z0-9." "]*$/
			// var regNumbers = /[0-9][0-9][0-9][0-9][0-9]/
			var regNumbers = /^\d{5}$/
			var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
			
			if(document.getElementById("firstName").value == ""){

				// document.getElementById("responseText").innerHTML = "<div class=\"alert alert-danger\" role=\"alert\">Please Enter a First Name</div>";
				alert("Please Enter a First Name")
				document.getElementById("firstName").focus();
				return false;
			}
			if(!regOnlyLetters.test(document.getElementById("firstName").value)){
				// document.getElementById("responseText").innerHTML = "First Name can only contain english letters";
				alert("First Name can only contain english letters")
				document.getElementById("firstName").focus();
				return false;
			}
			if(document.getElementById("lastName").value == ""){
				// document.getElementById("responseText").innerHTML = "Please Enter a Last Name";
				alert("Please Enter a Last Name")
				document.getElementById("lastName").focus();
				return false;
			}


			if(!regOnlyLetters.test(document.getElementById("lastName").value)){
				// document.getElementById("responseText").innerHTML = "Last Name can only contain english letters";
				alert("Last Name can only contain english letters")
				document.getElementById("lastName").focus();
				return false;
			}

			if(document.getElementById("email").value == ""){
				// document.getElementById("responseText").innerHTML = "Please Enter an Email";
				alert("Please Enter an Email")
				document.getElementById("email").focus();
				return false;
			}

			if(!regEmail.test(document.getElementById("email").value)){
				// document.getElementById("responseText").innerHTML = "Email incorrect";
				alert("Email Incorrect")
				document.getElementById("email").focus();
				return false;
			}
			if(document.getElementById("address").value == ""){
				// document.getElementById("responseText").innerHTML = "Please Enter an Address";
				alert("Please Enter an Address")
				document.getElementById("address").focus();
				return false;
			}
			if(!regAlphanumeric.test(document.getElementById("address").value)){
				// document.getElementById("responseText").innerHTML = "Address can only contain alphanumeric characters";
				alert("Address can only contain alphanumeric characters")
				document.getElementById("address").focus();
				return false;
			}
			if(document.getElementById("city").value == ""){
				// document.getElementById("responseText").innerHTML = "Please Enter a City";
				alert("Please Enter a City")
				document.getElementById("city").focus();
				return false;
			}
			if(!regOnlyLetters.test(document.getElementById("city").value)){
				// document.getElementById("responseText").innerHTML = "City can only contain English letters";
				alert("City can only contain English letters")
				document.getElementById("city").focus();
				return false;
			}
			if(document.getElementById("state").value == ""){
				// document.getElementById("responseText").innerHTML = "Please Enter a State";
				alert("Please Enter a State")
				document.getElementById("state").focus();
				return false;
			}
			if(!regOnlyLetters.test(document.getElementById("state").value)){
				// document.getElementById("responseText").innerHTML = "State can only contain English letters";
				alert("State can only contain English letters")
				document.getElementById("state").focus();
				return false;
			}
			if(document.getElementById("zipcode").value == ""){
				// document.getElementById("responseText").innerHTML = "Please Enter a Zip Code";
				alert("Please Enter a Zip Code")
				document.getElementById("zipcode").focus();
				return false;
			}

			if(!regNumbers.test(document.getElementById("zipcode").value)){
				// document.getElementById("responseText").innerHTML = "Zip Code only contains five numbers";
				alert("Zip Code only contains five numbers")
				document.getElementById("zipcode").focus();
				return false;
			}

			// var httpRequest;
	        var name2 = document.getElementById("firstName").value + " " + document.getElementById("lastName").value;
	        var email2 = document.getElementById("email").value;
	        var address2 = document.getElementById("address").value;
	        var city2 = document.getElementById("city").value;
	        var state2 = document.getElementById("state").value;
	        var zipcode2 = document.getElementById("zipcode").value;
	        $.post("processLogin.php",
	        	{
	        		name: name2,
	        		email: email2,
	        		address: address2,
	        		city: city2,
	        		state: state2,
	        		zipcode: zipcode2
	        	},
	        	function(data){
	        		var response = $(data).find("value").text();
	        		alert(response);
	        		if(response == "Successfully added"){
	        			document.getElementById("firstName").value = "";
	        			document.getElementById("lastName").value = "";
	        			document.getElementById("email").value = "";
	        			document.getElementById("address").value = "";
	  					document.getElementById("city").value = "";
	        			document.getElementById("state").value = "";
	        			document.getElementById("zipcode").value = "";
	        		}
	        		// document.getElementById("responseText").innerHTML = response;
	        	});
	       

		}
		function processAddUser(httpRequest){
	    	if (httpRequest.readyState == 4)
	        {
	           if (httpRequest.status == 200)
	           {
	           	//showLogin();
	           	document.getElementById("loginForm").innerHTML = httpRequest.response + "<br><br>" + document.getElementById("loginForm").innerHTML;

	           }
	       }

	    }
		
	</script>
	<script type="text/javascript">
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