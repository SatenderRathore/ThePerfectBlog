<?php 
include("db.php");

$username = $_REQUEST['username'];

$query = "SELECT username FROM blogger_details WHERE username='$username'";
$exec = mysqli_query($conn,$query);
$output = mysqli_fetch_array($exec, MYSQLI_ASSOC);

// print_r($output['email']);
if($output['username'] == $username && $username != "")
{
	print_r("username already exists!");
}

?>