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

	// List all data from parties
	$rows = array();
	$sql = "SELECT * FROM Parties";
	$result = mysqli_query($conn,$sql) or die("Error in $sql:" . mysqli_error($conn));	
	
	while($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	
	$myJobj = json_encode(array('Parties'=> $rows));
	echo $myJobj."\n";
	
	
	
	mysqli_close($conn);
	
?>