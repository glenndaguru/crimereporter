<?php

	// Connection
	$servername = "127.6.180.130";
	$username = "admintbjr2MK";
	$password = "n8C785aaSHi7";
	$dbname = "evoting";
	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
		
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	else
	{
		echo "Finally connected"."\n";
	}

	// Selecting User ID, check if user exists
	$sql = "SELECT * FROM Parties";
	$result = mysqli_query($conn,$sql) or die("Error in $sql:" . mysqli_error($conn));	
	while($row = mysqli_fetch_object($result)) {
	      $myJobj->id = $row->partyID;
	      $myJobj->name = $row->partyName;
	      $myJobj->abv = $row->partyABV;
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj."\n";
	
	mysqli_close($conn);
	
?>