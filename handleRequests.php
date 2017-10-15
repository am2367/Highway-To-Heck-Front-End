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
		$response = "Login";
		createClient($type, $username, $hashedPass);
		//rabbitMQLogin($username, $hashedPassword);
	break;
	case "register":
		echo "hello1!".PHP_EOL;	
		$username = $request["uname"];
		$password = $request["pword"];
		$type = $request["type"];
		$hashedPass = sha1($password);
		$response = "Register";
		createClient($type, $username, $hashedPass);
		//rabbitMQLogin($username, $hashedPassword);
	break;
}
echo json_encode($response);
exit(0);
?>
