<?php 
include("db.php");

if(isset($_POST))
{
	session_start();
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = md5($password);
		
	$query = "SELECT password,active_account FROM blogger_details WHERE email = '$email'";
	$fetch = mysqli_query($conn,$query);
	$output = mysqli_fetch_array($fetch);

	if($output['password'] == $password && $output['active_account'] == 1)
	{
		print_r("equal");
	}	
	else
	{
		header("Location:../../frontend/login_form.php");
	}
}
?>