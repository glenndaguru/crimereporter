<?php
	//Values
	global $count_voters;
	global $total_votes;
	global $partyID;
	
	// Connection
	$servername = "127.6.180.130";
	$username = "admintbjr2MK";
	$password = "n8C785aaSHi7";
	$dbname = "evoting";
		
	//Functions
	function resultToArray($result) 
	{
		$rows = array();
		while($row = $result->fetch_assoc()) 
		{
			$rows[] = $row;
		}
		return $rows;
	}
	
		
	// Create connection
	$GLOBALS['conn'] = new mysqli($servername, $username, $password, $dbname);
	
	if ($GLOBALS['conn']->connect_error) 
	{
		die("Connection failed: " . $GLOBALS['conn']->connect_error);
	} 
	
	//Calculate the number of registered voters
	$sql = "SELECT count(user_id) AS Voters FROM Users WHERE userStatus = 1";
	$result = mysqli_query($GLOBALS['conn'],$sql) or die("Error in $sql:" . mysqli_error($GLOBALS['conn']));	
	$data= mysqli_fetch_assoc($result);
	$GLOBALS['count_voters'] = $data['Voters'];
	
	//Calculate votes
	$sql1 = "SELECT partyID, ROUND(partyVotes/'".$GLOBALS['count_voters']."' *100,0) AS total_votes FROM  `User_Vote` ORDER BY total_votes DESC";
	$result1 = mysqli_query($GLOBALS['conn'],$sql1) or die("Error in $sql:" . mysqli_error($GLOBALS['conn']));	
	$rows = resultToArray($result1);
	
	$myJobj = json_encode(array('results' =>$rows));
	echo $myJobj."\n";
	
	mysqli_close($GLOBALS['conn']);


?>