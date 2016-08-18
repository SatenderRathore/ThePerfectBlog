<?php 
include("db.php");

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$password = md5($password);

$query = "SELECT password,active_account FROM blogger_details WHERE email='$email'";
$exec = mysqli_query($conn,$query);
$output = mysqli_fetch_array($exec, MYSQLI_ASSOC);


if($output['password'] != $password)
{
	print_r("emailId-password combination does not match");
}
else
{
	if($output['active_account'] == 0)
	{
		print_r("your account is not yet activated, please contact admin");
	}
}

?>