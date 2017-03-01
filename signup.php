<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
<!-- 		<link rel="stylesheet" type="text/css" href="userOptions.css"/>
 -->		<script src="http://code.jquery.com/jquery-latest.js"></script>

	</head>
	<body>
		<h1> Login </h1>
		<div id="responseText">
		</div>
		<div id="loginForm">
			<input type="text" placeholder="First Name" id="firstName"><br><input type="text" placeholder="Last Name" id="lastName"><br><input type="text" placeholder="Email" id="email"><br><input type="text" placeholder="Address" id="address"><br><input type="text" placeholder="City" id="city"><br><input type="text" placeholder="State" id="state"><br><input type="text" placeholder="Zip Code" id="zipcode"><br><input type="submit" value="Create New User" class="button" onclick="createNewUser()">
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