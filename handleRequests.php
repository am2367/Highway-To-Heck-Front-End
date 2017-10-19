<?php
include("../../../home/alex/git/it490f17/testRabbitMQClient.php");


if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET";
	echo json_encode($msg);
	exit(0);
}
$postRequest = $_POST;
//$getRequest = $_GET;
$response = "unsupported request type";

switch ($postRequest["type"])
{
	case "login":
		$username = $postRequest["uname"];
		$password = $postRequest["pword"];
		$type = $postRequest["type"];
		$hashedPass = sha1($password);
		$response = createClient($type, $username, $hashedPass);
	break;
	case "register":
		$username = $postRequest["uname"];
		$password = $postRequest["pword"];
		$type = $postRequest["type"];
		$hashedPass = sha1($password);
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
/*switch ($getRequest["type"]){
	case "listings":
		$zip = $getRequest["zip"];
		$radius = $getRequest["radius"];
		$minPrice = $getRequest["minPrice"];
		$maxPrice = $getRequest["maxPrice"];
		$make = $getRequest["make"];
		$model = $getRequest["model"];
		$year = $getRequest["year"];
		$response = createClientDMZ($type, $username, $hashedPass);
	break; 
}*/
echo json_encode($response);
exit(0);
?>
