<?php
	$conn_error = "Couldn't connect!";

	$mysql_host = "localhost";
	$mysql_user = 'root';		//add the username 
	$mysql_pass = '';		//add the password accordingly

	$mysql_db = 'a_demo';

	if(!mysql_connect($mysql_host,$mysql_user,$mysql_pass) ||  !mysql_select_db($mysql_db)) {
				die($conn_error);	
	} else {
		//echo 'Connected!<br>';
	}

?>



