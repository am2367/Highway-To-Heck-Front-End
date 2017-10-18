<?php
include("../../../home/alex/git/it490f17/testRabbitMQClient.php");


if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET";
	echo json_encode($msg);
	exit(0);
}
$request = $_POST;
$response = "unsupported request type";

switch ($request["type"])
{
	case "login":
		$username = $request["uname"];
		$password = $request["pword"];
		$type = $request["type"];
		$hashedPass = sha1($password);
		$response = createClient($type, $username, $hashedPass);
	break;
	case "register":
		$username = $request["uname"];
		$password = $request["pword"];
		$type = $request["type"];
		$hashedPass = sha1($password);
		$response = createClient($type, $username, $hashedPass);
	break;
}
echo json_encode($response);
exit(0);
?>
