<!DOCTYPE html>
<html>
<head>
<title>COMPLETE FORM</title>
</head>

<body>
<h1>PLEASE FILL THE GIVEN FORM</h1>
<p style="color:red">* are necessary</p>
<?php
$name=$email=$website=$comment=$gender="";
$name_err=$email_err=$gender_err="";

function inp_text($data)
{
$text=trim($data);
$text=stripslashes($data);
$text=htmlspecialchars($data);
return $text;
}

if($_SERVER["REQUEST_METHOD"]=="post")
{
	if($name='')
	{
		$name_err="Please enter the name";
	}
	else
	{
	$name=inp_text($_POST["name"]);
	}
	if($email="")
	{
		$email_err="Please enter the email";
	}
	else
	{
	$email=inp_text($_POST["email"]);
	}
	$website=inp_text($_POST["website"]);
	$comment=inp_text($_POST["comment"]);
	if($gender="")
	{
		$gender_err="Please select anyone one";
	}
	else{
	$gender=inp_text($_POST["gender"]);
	}
}


?>
<form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> method="post">
NAME:	<input type="text" name="name"  ><span style="color:red">*<?php echo $name_err; ?></span><br><br>
EMAIL:	<input type="text" name=email ><span style="color:red">*<?php echo $email_err; ?></span><br><br>
WEBSITE:<input type="text" name="website"><br><br>
COMMENT:<textarea name="comment" cols="50" rows="4"></textarea><br><br>
Male:<input type="radio" name="gender">
Female:<input type="radio" name="gender"><span style="color:red">*<?php echo $gender_err; ?></span></br><br>
<input type="submit" name="submit" value="SUBMIT"><br>
</form>

<h2>INPUT</h2>
<?PHP
	echo $name;
	echo "<br>";
	echo $email;
	echo "<br>";
	echo $website;
	echo "<br>";
	echo $comment;
	echo "<br>";
	echo $gender;
?>


</body>
</html>