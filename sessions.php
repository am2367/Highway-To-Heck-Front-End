<?php
/*
handles session creation and deletion

@author  Alex Markenzon
@since   November
@version 3
*/

include("writeLogs.php");

//route session request
switch($_POST["request"]){
	
	case "set": echo(startSession($_POST["user"],$_POST["email"]));
	break;
	case "get": echo(getSession());
	break;
	case "stop": stopSessions();
	break;

}
//start new session for user
function startSession($user, $email){
	//writeLogs($user);
	session_start();	
	$_SESSION['user'] = $user;
	$_SESSION['email'] = $email;
	return true;
}

//get user session
function getSession(){
	session_start();
	//writeLogs($_SESSION["user"]);
	return json_encode(array($_SESSION["user"],$_SESSION["email"]));
}
//stop all sessions
function stopSessions(){
	session_start();
	session_unset();
	session_destroy();
}
?>
