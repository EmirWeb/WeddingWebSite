<?php

	setcookie('user', '', time()-60*60*24*365);
	if (isset($_POST["replyCode"]))
		$replyCode =  mysql_real_escape_string($_POST["replyCode"]);
	else 
		die("Invalid registration code.");
	
	$hd = mysql_connect("localhost", "root", "password") or die ("Unable to connect");
	mysql_select_db ("wedding", $hd) or die ("Unable to select database");
	$res = mysql_query("SELECT * FROM code where data='". $replyCode . "'" , $hd) or die ("Unable to run query");
	$nrows = mysql_num_rows($res);
	echo "The query returned $nrows row(s):\n\n";
	while ($row = mysql_fetch_assoc($res))
	{
		// Assigning variables from cell values
		$data1 = $row["data"];
		// Outputting data to browser
		echo "ROW# $nr : $data1 \n";
	}
	 
	mysql_close($hd);
?>