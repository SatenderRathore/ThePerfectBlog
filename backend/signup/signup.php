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
	$current_date = date("Y-m-d");
	$insert_query = "INSERT INTO blogger_details (username,email,contact,password,creation_date,updation_date) VALUES('$username','$email','$contact','$password','$current_date','$current_date')";
    mysqli_query($conn, $insert_query);

?>
        <script> alert('congratulations you are successfully registered'); window.location.href = "../../frontend/";</script>';
<?php
    
}
else
{
	header("Location:../../frontend/signup_form.php");
}	

?>