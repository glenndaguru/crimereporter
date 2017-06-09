<?php
	// Data From App
	$userIDNo = $_POST["userIDNo"];
	$userSex = $_POST["userSex"];
	$userStatus = 0;
	$userName = $_POST["userName"];
	$userSur = $_POST["userSur"];
	$userAdd = $_POST["userAdd"];
	$userEmail = $_POST["userEmail"];
	$userPass = $_POST["userPass"];

	// Connection
	$servername = "127.4.48.2";
	$username = "adminD35M7Lk";
	$password = "M1iBd32D8Hdt";
	$dbname = "evoting";
		
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	
	// Insert Into User Table
	$sql = 'INSERT INTO Users'.'(userIDNo,userSex,userStatus,userName,userSur,userAdd,userEmail,userPass)'.'VALUES ("'.md5($userIDNo).'","'.$userSex.'","'.$userStatus.'","'.$userName.'","'.$userSur.'","'.$userAdd.'", "'.$userEmail.'","'.md5($userPass).'")';
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