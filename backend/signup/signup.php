<?php
include("db.php");

if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$email    = $_POST['email'];
	$email = strtolower($email);
	$contact  = $_POST['contact'];
	$password = $_POST['password'];
	$password = md5($password);	

	$insert_query = "INSERT INTO blogger_details (username,email,contact,password) VALUES('$username','$email','$contact','$password')";
    mysqli_query($conn, $insert_query);

    
    print_r("congratulations you are successfully registered");
}
else
{
	header("Location:../../frontend/signup_form.php");
}	

?>