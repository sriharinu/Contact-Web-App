<?php
$username='root';
$password='';
$server="localhost";
$db='customer';
$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn)
{
	 die('Could not Connect My Sql:' .mysql_error());
}
?>