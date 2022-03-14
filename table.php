<?php
include_once 'DB.php';
error_reporting(0);
session_start();
$var_value11=$_SESSION['email'];
$cid1=$_SESSION['email'];
$query="SELECT * FROM contacts WHERE email_id='$cid1'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0){ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Automobile sales</title>
<link rel="stylesheet" href="table.css" type="text/css">
	</head>
<body>
	<button type="button" onClick="location.href='info.php'" id="b2">Back</button>
	<br>
	<br>
	<h1>Contacts Infomation</h1>
	<table>
	<tr>
		<th>Contact Name</th>
		<th>Contact number</th>
		<th>Contact Email</th>
		</tr>
		<?php 
	while($row = mysqli_fetch_array($result)){
		?>
		<tr>
		<td>&nbsp;&nbsp;&nbsp;<?php echo $row['contact_name']?></td>
		<td>&nbsp;&nbsp;&nbsp;<?php echo $row['contact_number']?></td>
		<td>&nbsp;&nbsp;&nbsp;<?php echo $row['contact_email']?></td>
		</tr>
		<?php
	}
	}
else{
	echo "Not Found";
}
?>
	</table>
	</body>
</html>