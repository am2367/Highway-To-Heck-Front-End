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

switch ($postRequest["type"])
{
	case "login":
		$username = $postRequest["uname"];
		$password = $postRequest["pword"];
		$type = $postRequest["type"];
		$hashedPass = sha1($password);//hash the pass
		$response = createClient($type, $username, $hashedPass);
	break;
	case "register":
		$username = $postRequest["uname"];
		$password = $postRequest["pword"];
		$type = $postRequest["type"];
		$hashedPass = sha1($password);//hash the pass
		$response = createClient($type, $username, $hashedPass);
	break;
	case "listings":
		$type = $postRequest["type"];
		$zip = $postRequest["zip"];
		$radius = $postRequest["radius"];
		$minPrice = $postRequest["minPrice"];
		$maxPrice = $postRequest["maxPrice"];
		$make = $postRequest["make"];
		$model = $postRequest["model"];
		$year = $postRequest["year"];
		$response = createClientDMZ($type, $zip, $radius, $minPrice, $maxPrice, $make, $model, $year);
	break; 
}
//write to log file
writeLogs($response["message"]);
//turn the response into a JSON object
echo json_encode($response);
exit(0);
?>
