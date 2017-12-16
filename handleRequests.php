<?php

/*
handles and routes requests from the front end to the client and creates new client for each request

@author  Alex Markenzon
@since   September
@version 5
*/

include("../../../home/alex/git/it490f17/rabbitMQClient.php");
include("writeLogs.php");
//if post message is not set
if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET";
	writeLogs($msg);//write to log file
	echo json_encode($msg);
	exit(0);
}
$postRequest = $_POST;
$response = "unsupported request type"; //default response
switch ($postRequest["data"])
{
	case "login":
		$password = $postRequest["password"];
		$hashedPass = sha1($password);//hash the pass
		$postRequest["password"] = $hashedPass;
		$response = createClient($postRequest);
	break;
	case "register":
		$password = $postRequest["password"];
		$email = $postRequest["email"];
		$hashedPass = sha1($password);//hash the pass
		$postRequest["password"] = $hashedPass;
		$response = createClient($postRequest);
	break;
	case "getUserEmail":
		$response = createClient($postRequest);
	break;
	case "listings":
		$response = createClientDMZ($postRequest);
	break; 
	case "addToWatchlist":
		$response = createClient($postRequest);
	break; 
	case "removeFromWatchlist":
		$response = createClient($postRequest);
	break;
	case "clearWatchlist":
		$response = createClient($postRequest);
	break;
	case "getListingsFromWatchlist":
		$response = createClient($postRequest);
	break;
	case "watchlist":
		$response = createClient($postRequest);
	break;
	case "recommendedListings":
		$response = createClient($postRequest);
	break;
	case "graphData":
		$response = createClientDMZ($postRequest);
	break;
	case "getTodaysListings":
		$response = createClientDMZ($postRequest);
	break;
	case "addSkill":
		$response = createClient($postRequest);
	break;
	case "removeSkill":
		$response = createClient($postRequest);
	break;
	case "getSkills":
		$response = createClient($postRequest);
	break;
}
//write to log file
writeLogs(json_encode($response));

//turn the response into a JSON object
echo json_encode($response);
exit(0);
?>
