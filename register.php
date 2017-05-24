<?php
	// Data From App
	$userName = $_POST["userName"];
	$userEmail = $_POST["userEmail"];
	$userPass = $_POST["userPass"];
	$userNo = $_POST["userNo"];

	// Connection
	$servername = "127.4.48.2";
	$username = "adminD35M7Lk";
	$password = "M1iBd32D8Hdt";
	$dbname = "crimereporter";
		
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	
	// Insert Into User Table
	$sql = 'INSERT INTO User'.'(userName, userEmail, userPass, userNo)'.'VALUES ("'.$userName.'", "'.$userEmail.'","'.$userPass.'","'.$userNo.'")';
	if (!mysqli_query($conn, $sql)) 
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	else
	{
		$myObj->result = "User succesfully registered";
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj."\n";
	
	mysqli_close($conn);
?>