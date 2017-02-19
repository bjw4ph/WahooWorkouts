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
		

		#Create the tables with the necessary fields
		$result = $db->query("create table siteUser (siteUser__id int primary key not null, Name char(30) not null, Email char(60) not null, Address char(30) not null, City char(30) not null, State char(30) not null, ZipCode char(30) not null)") or die ("Invalid: " . $db->error);
		
		echo "Databases created <br> <br>";
      ?>
      <a href="index.html">Continue to Home Page</a> <br>


	</body>
</html>