<?php

$price = $_POST["price"];
$to = "alex.markenzon@yahoo.com";
$subject = "Test Message";
$txt = "You have added a listing with price " . $price . " to your watchlist!";

if(mail($to,$subject,$txt))
	$response = "Message Sent!";
else
	$response = "There was an error sending the message!";
echo $response;
?>
