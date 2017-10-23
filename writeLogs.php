<?php
	function writeLogs($log){
		date_default_timezone_get();
		$date = date('Y-m-d H:i:s');
		$file = "logs.txt";
		$fh = fopen($file, 'a') or die("Can't open file");
		fwrite($fh, "\n" . $date . "\t" . $log);
		fclose($fh);
	}
?>
