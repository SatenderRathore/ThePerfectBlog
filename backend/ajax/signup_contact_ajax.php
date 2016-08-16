<?php 
include("db.php");

$contact = $_REQUEST['contact'];

$query = "SELECT contact FROM blogger_details WHERE contact='$contact'";
$exec = mysqli_query($conn,$query);
$output = mysqli_fetch_array($exec, MYSQLI_ASSOC);

// print_r($output['email']);
if($output['contact'] == $contact)
{
	print_r("contact is already registered, Signup using another contact number");
}

?>