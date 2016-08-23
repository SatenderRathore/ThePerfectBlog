<?php
include("db.php");
// echo "hello";
if(isset($_GET['blog_id']))
{
	// echo "hello";
	$blog_id = mysqli_real_escape_string($conn,$_GET['blog_id']);
	$query = "SELECT * FROM blog_detail WHERE blog_id = '$blog_id'";
	$exec = mysqli_query($conn, $query);

	// print_r($exec);
	while($row = mysqli_fetch_assoc($exec))
	{
		$imageData = $row['blog_detail_image'];
		// print_r($imageData);
		header("content-type: image/jpg");

		echo $imageData;
	}		
	// header("content-type: image/jpeg");

	// echo $imageData;




}
