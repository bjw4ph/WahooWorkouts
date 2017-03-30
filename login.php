<?php
	include('header.php')
?>
							
				<div id="main-wrapper">
					<div class="container">
						<article class="box post">
							<header style="text-align:center">
								<h2>Login</h2>
								<!-- <p>Lorem ipsum dolor sit amet feugiat</p> -->
							</header>
						<section>
							<div id="responseText">
							</div>
							<div id="loginForm" style="text-align:center">
								
								<div style="padding-right:330px">Email: <br> </div>
								<input type="text" placeholder="Email" id="email" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px"><br>
								
								<div style="padding-right:310px">Password: <br> </div>
								<input type="password" placeholder="Password" id="password" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px"><br>
								<input type="submit" value="Login" class="button" onclick="login()">
							</div>
						</section>
					</div>
				</div>
				
	<script>
		
	
		function login(){
		
			var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
			

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
			
			if(document.getElementById("password").value == ""){
				// document.getElementById("responseText").innerHTML = "Please Enter a Zip Code";
				alert("Please Enter a Password")
				document.getElementById("password").focus();
				return false;
			}


			// var httpRequest;
	        var email2 = document.getElementById("email").value;
	        var password2 = document.getElementById("password").value;
	        $.post("processLogin.php",
	        	{
	        		email: email2,
	        		password: password2
	        	},
	        	function(data){
	        		var response = $(data).find("value").text();
	        		alert(response);
	        		if(response == "Successful Login"){
	        			window.location.href = 'index.php';
	        			return false;
	        			document.getElementById("email").value = "";
	        			document.getElementById("password").value = "";
	        		}
	        		// document.getElementById("responseText").innerHTML = response;
	        	});
	       

		}
		
		
	</script>
<?php
	include('footer.php')
?>