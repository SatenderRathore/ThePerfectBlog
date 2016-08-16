<?php
include("db.php");

if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$email    = $_POST['email'];
	$contact  = $_POST['contact'];
	$password = $_POST['password'];
	$password = md5($password);	
}
else
{
	header("Location:../frontend/signup_form.php");
}	

?>