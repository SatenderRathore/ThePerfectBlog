<?php 
include("db.php");

if(isset($_POST['submit']))
{
	$name     = $_POST['name'];
	$email    = $_POST['email'];
	$comment =	$_POST['comment'];

	$query = "INSERT INTO contact(name, email, comment) VALUES('$name','$email','$comment')";
	$exec = mysqli_query($conn, $query);
	
	?>
    <script>alert("Your query is submitted successfully"); window.location.href = "../frontend/contactus.php";</script>'
    <?php


}
?>
