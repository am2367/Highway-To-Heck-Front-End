<?php

$table = $_POST["data"];
$to = "alex.markenzon@yahoo.com";
$subject = "Test Message";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '. 'am2367@njitedu'."\r\n".

    'Reply-To: '.'am2367@njitedu'."\r\n" .

    'X-Mailer: PHP/' . phpversion();
if(mail($to,$subject,$table,$headers))
	$response = "Message Sent!";
else
	$response = "There was an error sending the message!";
echo $response;
?>
