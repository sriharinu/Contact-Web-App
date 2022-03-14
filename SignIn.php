<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Automobile Sales</title>
	<link rel="stylesheet" href="Signin.css">
	</head>
<body>
	<form class="box" action="Signin.php" method="post" name="Myform" onSubmit="return validateform();">
		<h1>Sign In</h1>
		<h2>Do not have a account?<a href="Signup.php">Sign up</a></h2>
		<input type="email" name="email" placeholder="Email_id" id="e_id" required>
		<input type="password" name="pwd" placeholder="password" id="Ploc" required>
		<input type="submit" value="submit" name="submit">
	</form>
</body>
</html>
<?php
include_once 'DB.php';
error_reporting(0);
$submit=$_POST;
$pwd=$_POST['pwd'];
$lid=$_POST['email'];
$query="SELECT * FROM signup";
mysqli_select_db($conn,$db);
$result=mysqli_query($conn,$query);
if($submit){
		session_start();
	$var_value11=$_POST['email'];
	$_SESSION['email']=$var_value11;
if(empty($_POST["email"]) && empty($_POST["pwd"]))
{
	echo '<script>alert("Missing Email_id and Password");window.location.href="Signin.php";</script>';
}
else if(empty($_POST["pwd"]))
{
	echo '<script>alert("Missing Password");window.location.href="Signin.php";</script>';
}
else if(empty($_POST["email"]))
{
	echo '<script>alert("Missing email_id");window.location.href="Signin.php";</script>';	
}
 if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_array($result))
	{
		
		if($row['email_id']==$lid && $row['password']==$pwd)
		{
			echo '<script>alert("login successfull");window.location.href="info.php";</script>';
		}
	}
 }
		else {
		echo '<script>alert("unsuccessful login check id/password");window.location.href="Signin.php";</script>';
	}
}
mysqli_close($conn);
?>
