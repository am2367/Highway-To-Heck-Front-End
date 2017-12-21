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
	case "setToSent": echo(setSent());
	break;
	case "get": echo(getSession());
	break;
	case "stop": stopSessions();
	break;

}
//start new session for user
function startSession($user, $email){
	session_start();	
	$_SESSION['user'] = $user;
	$_SESSION['email'] = $email;
	$_SESSION['sent'] = False;
	return true;
}

//
function setSent(){
	session_start();
	$_SESSION['sent'] = True;
}

//get user session
function getSession(){
	session_start();
	if(isset($_SESSION["user"]))
		return json_encode(array($_SESSION["user"],$_SESSION["email"], $_SESSION["sent"]));
	else
		return json_encode("");
}
//stop all sessions
function stopSessions(){
	session_start();
	session_unset();
	session_destroy();
}
?>
