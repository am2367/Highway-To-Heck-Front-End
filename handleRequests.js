<script language='javascript'>
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
