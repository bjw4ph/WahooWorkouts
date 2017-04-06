<?php
	session_start(); 
    
    if(!isset($_SESSION["email"])){
        header("Location: login.php?error=needLogin&next=createTime.php");
    }

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
								
								<div style="padding-right:350px">Month: <br> </div>
								<select type="text" placeholder="State" id="month" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select><br>
								<div style="padding-right:350px">Day: <br> </div>
								<select type="text" placeholder="day" id="day" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px">
									<?php
										for($i = 1; $i <= 31; $i++){
											echo "<option value='".$i."'>".$i."</option>";
										}
									?>
								</select><br>
								<div style="padding-right:350px">Year: <br> </div>
								<select type="text" placeholder="Year" id="year" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px">
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
								</select><br>
								<div style="padding-right:350px">Start: <br> </div>
								<select type="text" placeholder="Start" id="start" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px">
									<?php
										for($i = 1; $i <= 24; $i++){
											echo "<option value='".$i."'>".$i."</option>";
										}
									?>
								</select><br>
								<div style="padding-right:350px">Finish: <br> </div>
								<select type="text" placeholder="Finish" id="finish" style="border-radius:5px; width: 400px; height: 50px; padding-left:10px; margin-bottom:15px">
									<?php
										for($i = 1; $i <= 24; $i++){
											echo "<option value='".$i."'>".$i."</option>";
										}
									?>
								</select><br>
								
								<input type="submit" value="Create New Appointment Time" class="button" onclick="createNewTime()">
							</div>
						</section>
					</div>
				</div>
				
	<script>
		
	
		function createNewTime(){
			

			// var httpRequest;
	        var date2 = document.getElementById("month").value + "/" + document.getElementById("day").value + "/" + document.getElementById("year").value;
	        var start2 = document.getElementById("start").value;
	        var finish2 = document.getElementById("finish").value;
	        
	        $.post("processNewTime.php",
	        	{
	        		date: date2,
	        		start: start2,
	        		finish: finish2
	        	},
	        	function(data){
	        		// var response = $(data).find("value").text();
	        		// alert(response);
	        		// if(response == "Successfully added"){
	        		window.location.href = 'memberHome.php?success=addTime';
	        		// 	return false;
	        		// }
	        		// document.getElementById("responseText").innerHTML = response;
	        	});
	       

		}
		
		
	</script>
<?php
	include('footer.php')
?>