<?php

	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);

		$password_hash = md5($password);
	
		if(!empty($username) && !empty($password)) {
 
			$query = "SELECT `id` FROM `users` WHERE `username` = '$username' AND `password` = '$password_hash'";
			if($query_run = mysql_query($query)){
				 $query_num_rows = mysql_num_rows($query_run);
				 if($query_num_rows == 0) {
				 	echo 'Invalid username/password combination.';
				 } else if($query_num_rows == 1){
				 		$user_id = mysql_result($query_run,0, 'id');
				 		$_SESSION['user_id'] = $user_id;
				 		echo $user_id;	
				 		header('Location:homeForLogin.php');
				 }
			}

		} else {
			echo 'You must supply a username and password.';
		}
	}

	
?>

<form action = "<?php echo $current_file; ?>" method = "POST" style = "text-align:center;width:200px;margin:auto">
<fieldset>
	
Username: <input type = "text" name = "username"> <br><br>
Password : <input type = "password" name = "password"><br><br>
<input	 type = "submit" value = "Log in">

</fieldset>
</form>