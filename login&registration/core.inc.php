<?php 
	ob_start();	//for the header function to redirect to a particular page
	session_start();
	$current_file = $_SERVER['SCRIPT_NAME'];

	if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
		$http_referer = $_SERVER['HTTP_REFERER'];
	}
		

	function loggedin() {
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
			return true;
		} else {
			return false;
		}
	}

	function getfield($field) {
		$query = "SELECT `$field` FROM `users` WHERE `id` = '".$_SESSION['user_id']."'";
		if($query_run = mysql_query($query)) {
			if($query_result = mysql_result($query_run,0, $field)) {
				return $query_result;
			}
		} else {
			echo mysql_error();
		}
	}

?>