<?php 
include("db.php");

if($_POST)
{
	session_start();
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = md5($password);
		
	$query = "SELECT password,active_account FROM blogger_details WHERE email = '$email'";
	$fetch = mysqli_query($conn,$query);
	$output = mysqli_fetch_array($fetch);

	if($output['password'] == $password && $output['active_account'] == 0)
	{
		$_SESSION['email'] = $email;
		header("Location:../../frontend/blogger_account.php");
	}

	else
	{
		?>
        <script> alert('Wrong Details'); window.location.href = "../../frontend/login_form.php";</script>';
      <?php
	}	
	
}
else
{

	?>
    <script> alert('Pleasse fill the login form'); window.location.href = "../../frontend/login_form.php";</script>';
    <?php

	// header("Location:../../frontend/login_form.php");
}
?>