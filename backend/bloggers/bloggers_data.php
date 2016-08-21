<?php 
include("db.php");

if(isset($_POST['submit']))
{	session_start();
	$blogger_id    = $_SESSION['blogger_id'];
	$blog_title    = $_POST['blog_title'];
	$blog_desc     = $_POST['blog_desc'];
	$blog_category = $_POST['blog_cat'];
	$blog_author   = $_SESSION['blog_author'];
	print_r($_POST['blog_title']);

	print_r($_POST['blog_cat']);
	$current_date = date("Y-m-d");
	
	$insert_query = "INSERT INTO blog_master (blogger_id,blog_title,blog_desc,blog_category,blog_author,creation_date,updation_date) VALUES('$blogger_id','$blog_title','$blog_desc','$blog_category','$blog_author','$current_date','$current_date')";
    $a = mysqli_query($conn, $insert_query);
    
    print_r("your blog is submitted successfully");

}
?>
