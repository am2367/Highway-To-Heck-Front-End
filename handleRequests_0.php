<?php
require_once("/var/www/html/handleRequests.js");
//echo("<script type="text/javascript" src="/var/www/htmlhandleRequests.js"</script>");
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
		rabbitMQLogin("username", "password");	
		$username = $request["uname"];
		$password = $request["pword"];
		$hashedPass = sha1($password);
		$response = "Login";
		//rabbitMQLogin($username, $hashedPassword);
	case "register":	
		$username = $request["uname"];
		$password = $request["pword"];
		$hashedPass = sha1($password);
		echo ("hello");
		$response = "Register";
		//rabbitMQLogin($username, $hashedPassword);
	break;
}
echo json_encode($response);
exit(0);

//scripts
/*echo"<script language='javascript'>
	alert('hello');
	//send login info to rabbit MQ
	function rabbitMQLogin(username,password)
	{
		var request = new XMLHttpRequest();
		request.open('POST','../../../home/alex/git/it490f17/testRabbitMQClient.php',true);
		request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		request.onreadystatechange= function ()
		{
		
			if ((this.readyState == 4)&&(this.status == 200))
			{
				HandleLoginResponse(this.responseText);
			}		
		}
		request.send('type=login&username='+username+'&password='+password);
	}
	function rabbitMQRegister(username,password)
	{
		var request = new XMLHttpRequest();
		request.open('POST','../../../home/alex/git/it490f17/testRabbitMQClient.php',true);
		request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		request.onreadystatechange= function ()
		{
		
			if ((this.readyState == 4)&&(this.status == 200))
			{
				HandleLoginResponse(this.responseText);
			}		
		}
		request.send('type=register&username='+username+'&password='+password);
	}

</script>
";*/S
?>
