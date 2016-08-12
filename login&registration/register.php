<?php
	require 'core.inc.php';
	require 'connection.php';

	if(!loggedin()) {

		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['firstname']) && isset($_POST['surname']) ){
			$username = mysql_real_escape_string($_POST['username']);

			$password = mysql_real_escape_string($_POST['password']);
			$password_again = mysql_real_escape_string($_POST['password_again']);
			$password_hash = md5($password);

			$firstname = mysql_real_escape_string($_POST['firstname']);
			$surname = mysql_real_escape_string($_POST['surname']);

			if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($surname)) {
				if($password != $password_again) {
					echo 'Passwords do not match';
				} else {
					$query = "SELECT `username` FROM `users` WHERE `username`='$username'";
					$query_run = mysql_query($query);
					if(mysql_num_rows($query_run) == 1) {
						echo 'The username '.$username.' already exists';
					} else {
						$query = "INSERT INTO `users` VALUES ('','".$username."','".$password_hash."','".$firstname."','".$surname."')";
						$query_run = mysql_query($query);
						if($query_run) {
							header('Location: register_success.php');
						} else {
							echo mysql_error();
							echo "Sorry, we couldn't register you at this time.Try again later.";
						}
						
					}
				}
			} else {
				echo "All fields are required<br>";
			}
		}
?>

<form action = "register.php" method="POST" style = "text-align:center;width:200px;margin:auto">
<fieldset>
	
Username:<br><input type = "text" name = "username" maxlength = "30" value="<?php if(isset($username)) {echo $username;}?>"><br><br>
Password:<br><input type = "password" name = "password"><br><br>
Password again:<br><input type = "password" name = "password_again"><br><br>
Firstname:<br><input type = "text" name = "firstname" maxlength = "30" value="<?php if(isset($firstname)) {echo $firstname;}?>"><br><br>
Surname:<br><input type = "text" name = "surname"  maxlength = "30" value="<?php if(isset($surname)) {echo $surname;}?>"><br><br>
<input type = "submit" value = "Register"> 

</fieldset>
</form>

<?php

	} else if(loggedin()) {
		echo 'You\'re already registered and logged in.';
	}

?>