<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>

<?php
	require 'core.inc.php';
	require 'connection.php';

	if (loggedin() ) {

		$firstname = getfield('firstname');
		$surname = getfield('surname');
		echo "You're logged in, ".$firstname." ".$surname.".<br><br><a href = 'logout.php'>LOG OUT!</a><br>";

	} else {

		require 'loginform.inc.php';
	}





?>

</body>
</html>

