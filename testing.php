<?php
	// Data From App
	$userIDNo = "9310155874088";
	$userPass = "874484874";
	$userCandi = 1;
	$usersStatus = 1;
	
	//User Data
	global $userStatus;
	
	//Party Data
	global $partyVotes;
	global $theDate;
	global $conn;

	// Connection
	$servername = "127.6.180.130";
	$username = "admintbjr2MK";
	$password = "n8C785aaSHi7";
	$dbname = "evoting";
		
	// Create connection
	$GLOBALS['conn'] = new mysqli($servername, $username, $password, $dbname);
	
	if ($GLOBALS['conn']->connect_error) 
	{
		die("Connection failed: " . $GLOBALS['conn']->connect_error);
	} 
	
	//Check if user has voted. (Check status on user table)
	//If yes then don't allow to vote else allow to vote. (Update status on user Table,  Get the current value of the votes and add the value)
	$sql = "SELECT userStatus FROM Users WHERE userIDNo='".md5($userIDNo)."' AND userPass='".md5($userPass)."'";
	$result = mysqli_query($GLOBALS['conn'],$sql) or die("Error in $sql:" . mysqli_error($GLOBALS['conn']));	
	while($row = mysqli_fetch_object($result))
	{
		$GLOBALS['userStatus'] = $row->userStatus;
	} 
	
	$sql = "SELECT partyVotes FROM User_Vote WHERE partyID='".$userCandi."'";
	$result = mysqli_query($GLOBALS['conn'],$sql) or die("Error in $sql:" . mysqli_error($GLOBALS['conn']));	
	while($row = mysqli_fetch_object($result))
	{
		$GLOBALS['partyVotes'] = $row->partyVotes;
	} 
	
	if($GLOBALS['userStatus'] == 0)
	{
		//calculate value 
		$GLOBALS['partyVotes'] = $GLOBALS['partyVotes'] + 1;
		
		//set the date
		$GLOBALS['theDate'] = date("Y-m-d");
		
		$GLOBALS['userStatus'] = 1;
		
		//Update User Table
		$sql_user = "UPDATE Users SET userStatus='".$GLOBALS['userStatus']."' WHERE userIDNo='".md5($userIDNo)."' AND userPass='".md5($userPass)."'";
		if (!mysqli_query($GLOBALS['conn'], $sql_user)) 
		{
			echo "Error: " . $sql_user . "<br>" . mysqli_error($GLOBALS['conn']);
		}	
		
		// Update Vote Table
		$sql_vote = "UPDATE User_Vote SET partyVotes='".$GLOBALS['partyVotes']."', voteDate='".$GLOBALS['partyVotes']."' WHERE partyID='".$userCandi."'";
		if (!mysqli_query($GLOBALS['conn'], $sql_vote)) 
		{
			echo "Error: " .$sql_vote. "<br>" . mysqli_error($GLOBALS['conn']);
		}
		else
		{
			$myObj->result = "Vote has been successfully cast";
		}
	}
	else
	{
		$myObj->result = "User can only vote once";
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj."\n";
	
	mysqli_close($GLOBALS['conn']);

?>