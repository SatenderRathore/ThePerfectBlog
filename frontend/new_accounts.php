<?php 
include("db.php");

$query = "SELECT * FROM blogger_details WHERE active_account = 0";
$exec = mysqli_query($conn,$query);
$output = mysqli_fetch_array($exec);

?>