<?php 
include("db.php");

if(isset($_POST['submit']))
{
	$name     = $_POST['name'];
	$email    = $_POST['email'];
	$comment =	$_POST['comment'];

	$query = "INSERT INTO feedback(name, email, comment) VALUES('$name','$email','$comment')";
	$exec = mysqli_query($conn, $query);

echo "successfully submited feedback";



}
?>
