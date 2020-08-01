<?php
// Start the session
session_start();
?>
<html><?php

$username= $_POST["username"];
$password =$_POST["password"];


$conn= mysqli_connect("localhost","root","","perfectlearn");
$query="select username,password from register where username='$username'";
$result= mysqli_query($conn,$query);
if(mysqli_fetch_row($result))
{ $_SESSION['username']=$username;


	header('Location: userhome.php');
}
else
{
	echo "hello";
	$_SESSION['errormsg'] = 'invalid organisationid or password ';
	header('location: login.php');

}
?></html>