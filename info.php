<?php
include_once 'DB.php';
error_reporting(0);
session_start();
$var_value11=$_SESSION['email'];
$cid1=$_SESSION['email'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update contact info</title>
	<link rel="stylesheet" href="info.css">
</head>
<body>
	<form method="post" name="myform" action="info.php" class="box">
		<br>
	<h3>Contact Name:</h3><input type="text" name="contact_name" placeholder="Enter contact name" id="c_name" required>
		<br>
	<h3>Contact Number:</h3><input type="tel" name="contact_number" placeholder="Enter contact number" id="c_number" required>
		<br>
	<h3>Contact Email:</h3><input type="email" name="contact_mail" placeholder="Enter contact Email" id="c_email"required>
		<input type="submit" value="Save" name="submit">
	</form>
</body>
</html>
<?php
	$submit=$_POST;
			$cn=$_POST['contact_name'];
			$cno=$_POST['contact_number'];
			$cmail=$_POST['contact_mail'];
			$query2="INSERT INTO contacts (contact_name,contact_number,contact_email,email_id) VALUES 
			('$cn','$cno','$cmail','$cid1')";
			if($submit)
			{
				if(mysqli_query($conn,$query2))
				{
					echo '<script>alert("Your Contacts are");window.location.href="table.php";</script>';
				}
				mysqli_close();
			}
		?>
