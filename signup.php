<!DOCTYPE html>
<html>
	<head>
		<title>Sign-Up</title>
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
				<div id="header-wrapper">
					<div id="header">

						
							<nav class="navbar navbar-default navbar-fixed-top">
								  <div class="container-fluid">
								    
								    <div class="navbar-header">
								      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								        <span class="sr-only">Toggle navigation</span>
								        <span class="icon-bar"></span>
								        <span class="icon-bar"></span>
								        <span class="icon-bar"></span>
								      </button>
								      <a class="navbar-brand" href="#">
								        <img alt="Brand" src="images/logo.png" style="height:40px; padding-bottom:10px">
								      </a>

								      <div class="navbar-brand" href="#" style="font-size:30px; color:black;">Wahoo Workouts</div>
									  

								      
								    </div>

								    <!-- Collect the nav links, forms, and other content for toggling -->
								    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								      
								      
								      <ul class="nav navbar-nav navbar-right">
								        <li class="active"><a href="#">Home</a></li>
								        <li><a href="aboutus.html">About Us</a></li>
								        <li><a href="signup.php">Sign Up</a></li>
								      </ul>
								    </div><!-- /.navbar-collapse -->
								  </div><!-- /.container-fluid -->
								</nav>
							</div>
				</div>
				<div id="main-wrapper">
					<div class="container">
						<h1> Login </h1>
						<div id="responseText">
						</div>
						<div id="loginForm">
							<input type="text" placeholder="First Name" id="firstName"><br><input type="text" placeholder="Last Name" id="lastName"><br><input type="text" placeholder="Email" id="email"><br><input type="text" placeholder="Address" id="address"><br><input type="text" placeholder="City" id="city"><br><input type="text" placeholder="State" id="state"><br><input type="text" placeholder="Zip Code" id="zipcode"><br><input type="submit" value="Create New User" class="button" onclick="createNewUser()">
						</div>
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
						<div class="row">
							<div class="12u">

								<!-- Copyright -->
									<div id="copyright">
										<ul class="links">
											<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
										</ul>
									</div>

							</div>
						</div>
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
				document.getElementById("responseText").innerHTML = "Please Enter a First Name";
				document.getElementById("firstName").focus();
				return false;
			}
			if(!regOnlyLetters.test(document.getElementById("firstName").value)){
				document.getElementById("responseText").innerHTML = "First Name can only contain english letters";
				document.getElementById("firstName").focus();
				return false;
			}
			if(document.getElementById("lastName").value == ""){
				document.getElementById("responseText").innerHTML = "Please Enter a Last Name";
				document.getElementById("lastName").focus();
				return false;
			}


			if(!regOnlyLetters.test(document.getElementById("lastName").value)){
				document.getElementById("responseText").innerHTML = "Last Name can only contain english letters";
				document.getElementById("lastName").focus();
				return false;
			}

			if(document.getElementById("email").value == ""){
				document.getElementById("responseText").innerHTML = "Please Enter an Email";
				document.getElementById("email").focus();
				return false;
			}

			if(!regEmail.test(document.getElementById("email").value)){
				document.getElementById("responseText").innerHTML = "Email incorrect";
				document.getElementById("email").focus();
				return false;
			}
			if(document.getElementById("address").value == ""){
				document.getElementById("responseText").innerHTML = "Please Enter an Address";
				document.getElementById("address").focus();
				return false;
			}
			if(!regAlphanumeric.test(document.getElementById("address").value)){
				document.getElementById("responseText").innerHTML = "Address can only contain alphanumeric characters";
				document.getElementById("address").focus();
				return false;
			}
			if(document.getElementById("city").value == ""){
				document.getElementById("responseText").innerHTML = "Please Enter a City";
				document.getElementById("city").focus();
				return false;
			}
			if(!regOnlyLetters.test(document.getElementById("city").value)){
				document.getElementById("responseText").innerHTML = "City can only contain English letters";
				document.getElementById("city").focus();
				return false;
			}
			if(document.getElementById("state").value == ""){
				document.getElementById("responseText").innerHTML = "Please Enter a State";
				document.getElementById("state").focus();
				return false;
			}
			if(!regOnlyLetters.test(document.getElementById("state").value)){
				document.getElementById("responseText").innerHTML = "State can only contain English letters";
				document.getElementById("state").focus();
				return false;
			}
			if(document.getElementById("zipcode").value == ""){
				document.getElementById("responseText").innerHTML = "Please Enter a Zip Code";
				document.getElementById("zipcode").focus();
				return false;
			}

			if(!regNumbers.test(document.getElementById("zipcode").value)){
				document.getElementById("responseText").innerHTML = "Zip Code only contains five numbers";
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
	        		document.getElementById("responseText").innerHTML = response;
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
	</body>
</html>