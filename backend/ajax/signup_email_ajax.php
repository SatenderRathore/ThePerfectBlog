<?php 
include("db.php");

$email = $_REQUEST['email'];

$query = "SELECT email FROM blogger_details WHERE email='$email'";
$exec = mysqli_query($conn,$query);
$output = mysqli_fetch_array($exec, MYSQLI_ASSOC);

// print_r($output['email']);
if($output['email'] == $email)
{
	print_r("email is already registered, Signup using another email id");
}

?>