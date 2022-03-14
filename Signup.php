<?php
error_reporting(0);
include('DB.php');
$secretkey=rand(4000,50000);
$query3="SELECT secret_key FROM signup";
    $result1=mysqli_query($conn,$query3);
	if(mysqli_num_rows($result1) > 0)
	{
		while($row1 = mysqli_fetch_array($result1))
		{
			if($row1['secret_key']==$secretkey)
			{
				$secretkey=rand($row1['secret_key']+1,50000);
			}
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Automobile Sales</title>
	<link rel="stylesheet" href="Signup.css">
	</head>
<body>
	<form class="box" action="Signup.php" method="post" name="Myform" onSubmit="return validateform();">
		<h1>Sign up</h1>
		<h2>alredy have a account?<a href="Signin.php">Sign in</a></h2>
		<input type="email" name="email" placeholder="Email_id" id="e_id" required>
		<input type="password" name="pwd" placeholder="password" id="pwd" required>
		<input type="text" name="secretkey" placeholder="secretkey" id="sk" value="<?php echo $secretkey?>"required>
		<input type="submit" value="submit" name="submit">
	</form>
</body>
</html>
<?php
$submit=$_POST;
$pwd=$_POST['pwd'];
$lid=$_POST['email'];
$epwd=$_POST['pwd'];
$query="INSERT INTO signup (email_id,password,secret_key) VALUES ('$lid','$epwd','$secretkey')";
mysqli_select_db($conn,$db);
$query4="SELECT * FROM signup";
$result=mysqli_query($conn,$query4);
if($submit){
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			if($row['email_id']==$lid)
			{
				echo '<script>alert("already registered");window.location.href="Signup.php";</script>';
			}
		}
	}
	
if(empty($_POST["email"]) && empty($_POST["pwd"]))
{
	echo '<script>alert("Missing Email_id and Password");window.location.href="Signup.php";</script>';
}
else if(empty($_POST["pwd"]))
{
	echo '<script>alert("Missing Password");window.location.href="Signup.php";</script>';
}
else if(empty($_POST["email"]))
{
	echo '<script>alert("Missing email_id");window.location.href="Signup.php";</script>';	
}
		if(mysqli_query($conn,$query))
			{
			echo '<script>alert("signup successfull");window.location.href="info.php";</script>';
		    }
	else {
		echo '<script>alert("unsuccessful check email_id/password");window.location.href="Signup.php";</script>';
	}
}
			   
mysqli_close($conn);
?>