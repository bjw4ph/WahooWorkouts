<!DOCTYPE html>
<html>
	<head>
		<title>Students Script 1</title>
	</head>
	<body>
		<?php
		$db = new mysqli('localhost', 'root', '' , 'WahooWorkouts');
		if ($db->connect_error):
			die ("Could not connect to db: " . $db->connect_error);
		endif;

		#Delete all the old tables in order to make sure we always start from consistent state
		$db->query("drop table siteUser");
		$db->query("drop table trainerInfo");
		$db->query("drop table trainerTimes");
		

		#Create the tables with the necessary fields
		$result = $db->query("create table siteUser (siteUser__id int primary key not null, Name char(30) not null, Email char(60) not null, Address char(30) not null, City char(30) not null, State char(30) not null, ZipCode char(30) not null)") or die ("Invalid: " . $db->error);
		$result = $db->query("create table trainerInfo (Email char(60) primary key not null, Info text(300) not null, Pricing int not null)") or die ("Invalid: " . $db->error);
		$result = $db->query("create table trainerTimes (trainerTimes__id int primary key not null, Email char(100) not null, Date char(100) not null, Start char(30) not null, Finish char(30) not null, Block char(30) not null)") or die ("Invalid: " . $db->error);

		$trainers = file("trainer.txt");
		$counter = 0;
		#Read in the file Ticket Setup to add in all ofthe beginning tickets
		foreach($trainers as $trainerstring){
			$trainerstring = rtrim($trainerstring);
			$trainer = explode("$", $trainerstring);
			#Upate a counter for the id for the Ticket
			$counter++;
			$query1 = "insert into siteUser values ('$counter', '$trainer[0]', '$trainer[1]', '$trainer[2]', '$trainer[3]', '$trainer[4]', '$trainer[5]')";
			$query2 = "insert into trainerInfo values ('$trainer[1]', '$trainer[6]', '$trainer[7]')";
			$db->query($query1) or die("Invalid Insert " .$db->error); 
			$db->query($query2) or die("Invalid Insert " .$db->error); 
		}

		$times =  file("trainerTimes.txt");
		$counter = 0;
		foreach($times as $timestring){
			$timestring = rtrim($timestring);
			$time = explode("$", $timestring);
			$counter++;
			$start = intval($time[2]);
			$finish = intval($time[3]);
			// echo($time[0] ."<br>");
			// echo($time[1]."<br>");
			// echo($start."<br>");
			// echo($finish."<br>");
			#Save a hash of the password in the text file for security
			$query3 = "insert into trainerTimes values ('$counter', '$time[0]', '$time[1]', '$time[2]', '$time[3]', '1')";
			$db->query($query3) or die("Invalid Insert " .$db->error); 
		}

		

		echo "Databases created <br> <br>";
      ?>
      <a href="index.html">Continue to Home Page</a> <br>


	</body>
</html>