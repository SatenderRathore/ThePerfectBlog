<?php 
include("db.php");

if(isset($_POST['submit']))
{
	session_start();

	$blog_id = $_SESSION['blog_id'];
	printf("%d",$blog_id);
	$name     = $_POST['name'];
	// print_r($name);
	$email    = $_POST['email'];
	$comment =	$_POST['comment'];

	$query = "INSERT INTO feedback(name, email, comment) VALUES('$name','$email','$comment')";
	$exec = mysqli_query($conn, $query);

echo "successfully submited feedback";



}
?>
