<!DOCTYPE html>
<html>
<head>
	<title>COUNTER</title>
</head>
<body>

<h1>MY PAGE</h1>
<p>The counter in the database will increment when a user with different ip will be logged in.</p>
<?php
	require 'connection.php';	//see for the 'hits_ip' and 'hits_count' tables in the database 'a_demo'
								//add the username & password in 'connection.php' acoording to your server

	$user_ip = $_SERVER['REMOTE_ADDR'];

	function ip_exists($ip) {
		global $user_ip;
		$query = "SELECT `ip` FROM `hits_ip` WHERE `ip` = '$user_ip'";
		$query_run = mysql_query($query);
		if(mysql_num_rows($query_run) == 0) {
			return false;
		} else if(mysql_num_rows($query_run) >= 1) {
			return true;
		}
	}

	function ip_add($ip) {
		$query = "INSERT INTO `hits_ip` VALUES ('$ip')";
		if($query_run = mysql_query($query)) {
			echo 'updated<br>';
		} else {
			echo mysql_error();
		}
	}

	function update_count() {
		$query = "SELECT `count` FROM `hits_count`";
		$query_run = mysql_query($query);
		if($query_run) {
			$count = mysql_result($query_run, 0, 'count');
			$count = $count +1;

			$query_update = "UPDATE `hits_count` SET `count` = '$count'";
			$query_update_run = mysql_query($query_update);
		}
	}


	if(!ip_exists($user_ip)){
		update_count();
		ip_add($user_ip);
	} else {
		echo 'Ip exists<br>';
	}
 ?>


</body>
</html>