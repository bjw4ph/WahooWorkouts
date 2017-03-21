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
<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Wahoo Workouts</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src="http://code.jquery.com/jquery-latest.js"></script>

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header">

						<!-- Logo -->
							<!-- <h1 style="text-align: center"><img src="images/logo.png" style="height:135px; padding-bottom:10px"/><a href="index.html"><div>Wahoo Workouts</div></a></h1> -->
							<!-- <h1 style="text-align: center; align:center;"><table style="width:1%; white-space:nowrap; margin-left: auto; margin-right: auto;"><tr><td style="vertical-align:middle;"><img src="images/logo.png" style="height:100px"/></td><td style="vertical-align:middle;"><a href="index.html">Wahoo Workouts</a></td></tr></table></h1 -->


						<!-- Nav -->
							<!-- <nav id="nav" style="align:right">
								<ul>
									<li class="current"><a href="index.html">Home</a></li>
									<li>
										<a href="#">Dropdown</a>
										<ul>
											<li><a href="#">Lorem ipsum dolor</a></li>
											<li><a href="#">Magna phasellus</a></li>
											<li><a href="#">Etiam dolore nisl</a></li>
											<li>
												<a href="#">Phasellus consequat</a>
												<ul>
													<li><a href="#">Magna phasellus</a></li>
													<li><a href="#">Etiam dolore nisl</a></li>
													<li><a href="#">Veroeros feugiat</a></li>
													<li><a href="#">Nisl sed aliquam</a></li>
													<li><a href="#">Dolore adipiscing</a></li>
												</ul>
											</li>
											<li><a href="#">Veroeros feugiat</a></li>
										</ul>
									</li>
									<li><a href="left-sidebar.html">Left Sidebar</a></li>
									<li><a href="right-sidebar.html">Right Sidebar</a></li>
									<li><a href="aboutus.html">About Us</a></li>
									<li><a href="index.html">Sign Up Now</a></li>
								</ul>
							</nav> -->
							<nav class="navbar navbar-default navbar-fixed-top">
								  <div class="container-fluid">
								    <!-- Brand and toggle get grouped for better mobile display -->
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
									  

								      <!-- <a class="navbar-brand" href="/"><table style="width:1%; white-space:nowrap; margin-left: auto; margin-right: auto;"><tr><td style="vertical-align:middle;"><img src="images/logo.png" style="height:50px"/></td><td style="vertical-align:middle;"><a href="index.html">Wahoo Workouts</a></td></tr></table></a> -->
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

						<!-- Banner -->
							<section id="banner">
								<header>
									<h2>This is Wahoo Workouts.</h2>
									<p>The first personal training network optimized for you</p>
								</header>
							</section>

						<!-- Intro -->
							<section id="intro" class="container">
								<div class="row">
									<div class="4u 12u(mobile)">
										<section class="first">
											<i class="icon featured fa-cog"></i>
											<header>
												<h2>Customizable Experience</h2>
											</header>
											<p>Our wide range of trainers allows you to choose whatever workout area or skill level you desire </p>
										</section>
									</div>
									<div class="4u 12u(mobile)">
										<section class="middle">
											<i class="icon featured alt fa-flash"></i>
											<header>
												<h2>Lightning Fast Process</h2>
											</header>
											<p>Quickly find a trainer, schedule a meet up time, and pay for the experience within this site</p>
										</section>
									</div>
									<div class="4u 12u(mobile)">
										<section class="last">
											<i class="icon featured alt2 fa-star"></i>
											<header>
												<h2>World-Class Rating System</h2>
											</header>
											<p>Use our state of the art ratings to find the best trainers available in the Charlottesville area</p>
										</section>
									</div>
								</div>
								<footer>
									<ul class="actions">
										<li><a href="signup.php" class="button big">Get Started</a></li>
										<li><a href="aboutus.html" class="button alt big">Learn About Us</a></li>
									</ul>
								</footer>
							</section>

					</div>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row">
							<div class="12u">

								<!-- Portfolio -->
									<section>
										<header class="major">
											<h2>Top Trainers</h2>
										</header>
										<div class="row">
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
													<header>
														<h3>Florence Joyner</h3>
													</header>
													<p>Come on my cardio journey to learn the way to burn those pesky calories and lose fat while making friends and having a great time</p>
													<img src="images/5stars.png" style="height:75px"/>
													<form action="startPayment.php" method="POST">
										                 <input type="text" name="csrf" value="<?php echo($_SESSION['csrf']);?>" hidden readonly/>
										    

										                <br/>
										                <!--Container for Checkout with PayPal button-->
										                <div id="myContainer"></div>
										                <br/>
										                
										            </form>
													<!-- <footer>
														<a href="#" class="button alt">Find out more</a>
													</footer> -->
												</section>
											</div>
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
													<header>
														<h3>Conor McGregor</h3>
													</header>
													<p>Can teach you everything you need to know about weight training for either muscle tone or muscle mass before UFC rolls around</p>
													<img src="images/5stars.png" style="height:75px"/>

													<!-- <footer>
														<a href="#" class="button alt">Find out more</a>
													</footer> -->
												</section>
											</div>
											<div class="4u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
													<header>
														<h3>Sir Charles Barkley</h3>
													</header>
													<p>Former Professional Basketball player here to teach you any topic in this great game: from fundamentals to high level strategy and planning</p>
													<img src="images/5stars.png" style="height:75px"/>
													<!-- <footer>
														<a href="#" class="button alt">Find out more</a>
													</footer> -->
												</section>
											</div>
										</div>

										
										</div>
									</section>

							</div>
						</div>
						
						</div>
					</div>
				</div>

			<!-- Footer -->
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
						
					</section>
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/bootstrap.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
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