<?php
include("../../../home/alex/git/it490f17/testRabbitMQClient.php");
include("writeLogs.php");

if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET";
	writeLogs($msg);//write to log file
	echo json_encode($msg);
	exit(0);
}
$postRequest = $_POST;
$response = "unsupported request type";
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
		$hashedPass = sha1($password);//hash the pass
		$postRequest["password"] = $hashedPass;
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
}
//write to log file
writeLogs(json_encode($response));
//turn the response into a JSON object
echo json_encode($response);
exit(0);
?>
