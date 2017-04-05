<?php
	include('header.php')
?>
							
				<div id="main-wrapper">
					<div class="container">
						<?php include('messaging.php') ?>
						<article class="box post">
							<header style="text-align:center">
								<h2>Sign Up</h2>
								<!-- <p>Lorem ipsum dolor sit amet feugiat</p> -->
							</header>
						<section>
							<div id="responseText">
							</div>
							<div id="loginForm" style="text-align:center">
								
									<div style="padding-right:300px">
										First Name: <br>
									</div>
									<input type="text" placeholder="First Name" id="firstName" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px"><br>
								
								<div style="padding-right:300px">Last Name: <br> </div> 
								<input type="text" placeholder="Last Name" id="lastName" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px"><br>
								<div style="padding-right:330px">Email: <br> </div>
								<input type="text" placeholder="Email" id="email" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px"><br>
								<div style="padding-right:325px">Address: <br> </div>
								<input type="text" placeholder="Address" id="address" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px"><br>
								<div style="padding-right:350px">City: <br> </div> 
								<input type="text" placeholder="City" id="city" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px"><br>
								<div style="padding-right:350px">State: <br> </div>
								<select type="text" placeholder="State" id="state" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px">
									<option value="AL">Alabama</option>
									<option value="AK">Alaska</option>
									<option value="AZ">Arizona</option>
									<option value="AR">Arkansas</option>
									<option value="CA">California</option>
									<option value="CO">Colorado</option>
									<option value="CT">Connecticut</option>
									<option value="DE">Delaware</option>
									<option value="DC">District Of Columbia</option>
									<option value="FL">Florida</option>
									<option value="GA">Georgia</option>
									<option value="HI">Hawaii</option>
									<option value="ID">Idaho</option>
									<option value="IL">Illinois</option>
									<option value="IN">Indiana</option>
									<option value="IA">Iowa</option>
									<option value="KS">Kansas</option>
									<option value="KY">Kentucky</option>
									<option value="LA">Louisiana</option>
									<option value="ME">Maine</option>
									<option value="MD">Maryland</option>
									<option value="MA">Massachusetts</option>
									<option value="MI">Michigan</option>
									<option value="MN">Minnesota</option>
									<option value="MS">Mississippi</option>
									<option value="MO">Missouri</option>
									<option value="MT">Montana</option>
									<option value="NE">Nebraska</option>
									<option value="NV">Nevada</option>
									<option value="NH">New Hampshire</option>
									<option value="NJ">New Jersey</option>
									<option value="NM">New Mexico</option>
									<option value="NY">New York</option>
									<option value="NC">North Carolina</option>
									<option value="ND">North Dakota</option>
									<option value="OH">Ohio</option>
									<option value="OK">Oklahoma</option>
									<option value="OR">Oregon</option>
									<option value="PA">Pennsylvania</option>
									<option value="RI">Rhode Island</option>
									<option value="SC">South Carolina</option>
									<option value="SD">South Dakota</option>
									<option value="TN">Tennessee</option>
									<option value="TX">Texas</option>
									<option value="UT">Utah</option>
									<option value="VT">Vermont</option>
									<option value="VA">Virginia</option>
									<option value="WA">Washington</option>
									<option value="WV">West Virginia</option>
									<option value="WI">Wisconsin</option>
									<option value="WY">Wyoming</option>
								</select><br>
								<div style="padding-right:310px">Zip Code: <br> </div>
								<input type="text" placeholder="Zip Code" id="zipcode" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px"><br>
								<div style="padding-right:310px">Password: <br> </div>
								<input type="password" placeholder="Password" id="password" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px"><br>
								<select type="text" placeholder="State" id="type" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px">
									<option value="user">User</option>
									<option value="trainer">Trainer</option>
								</select><br>
								<input type="submit" value="Create New User" class="button" onclick="createNewUser()">
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
			if(document.getElementById("password").value == ""){
				// document.getElementById("responseText").innerHTML = "Please Enter a Zip Code";
				alert("Please Enter a Password")
				document.getElementById("password").focus();
				return false;
			}

			// var httpRequest;
	        var name2 = document.getElementById("firstName").value + " " + document.getElementById("lastName").value;
	        var email2 = document.getElementById("email").value;
	        var address2 = document.getElementById("address").value;
	        var city2 = document.getElementById("city").value;
	        var state2 = document.getElementById("state").value;
	        var zipcode2 = document.getElementById("zipcode").value;
	        var password2 = document.getElementById("password").value;
	        var type2 = document.getElementById("type").value;
	        $.post("processSignUp.php",
	        	{
	        		name: name2,
	        		email: email2,
	        		address: address2,
	        		city: city2,
	        		state: state2,
	        		zipcode: zipcode2,
	        		password: password2,
	        		type: type2
	        	},
	        	function(data){
	        		var response = $(data).find("value").text();
	        		alert(response);
	        		if(response == "Successfully added"){
	        			window.location.href = 'login.php';
	        			return false;
	        			document.getElementById("firstName").value = "";
	        			document.getElementById("lastName").value = "";
	        			document.getElementById("email").value = "";
	        			document.getElementById("address").value = "";
	  					document.getElementById("city").value = "";
	        			document.getElementById("state").value = "";
	        			document.getElementById("zipcode").value = "";
	        			document.getElementById("password").value = "";
	        		}
	        		// document.getElementById("responseText").innerHTML = response;
	        	});
	       

		}
		
		
	</script>
<?php
	include('footer.php')
?>