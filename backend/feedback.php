<?php 
include("db.php");

if(isset($_POST['submit']))
{
	session_start();

	$blog_id = $_SESSION['blog_id'];
	$name     = $_POST['name'];
	$email    = $_POST['email'];
	$comment =	$_POST['comment'];

	$query = "INSERT INTO feedback(blog_id,name, email, comment) VALUES('$blog_id','$name','$email','$comment')";
	$exec = mysqli_query($conn, $query);

// echo "successfully submited feedback";
?>
    <script>alert("successfully submited feedback"); window.location.href = "../frontend/index.php";</script>'
    <?php




}
?>
