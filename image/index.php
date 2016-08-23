
<?php 
include("db.php");

if(isset($_POST['submit']))
{
	$imageName = mysqli_real_escape_string($conn,$_FILES['image']['name']);
	$imageData = mysqli_real_escape_string($conn,file_get_contents($_FILES['image']['tmp_name']));
	$imageType = mysqli_real_escape_string($conn,$_FILES['image']['type']);

	if(substr($imageType, 0, 5) == "image")
	{
		$query = "INSERT INTO blog_detail VALUES ('22','$imageData')";
		$exec = mysqli_query($conn, $query);

		printf("%d",$exec);
	}
	else
	{
		echo "not a image";
	}


	// print_r($imageType);
	// print_r(substr($imageType, 0,5));
	// echo $imageData;
	// print_r($imageData);
	// print_r($imageName);
	// print_r($_FILES['image']);
}




?>






<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="index.php" method="POST" enctype="multipart/form-data" >
	<input type="file" name="image">
	<input type="submit" name="submit" >
	
</form>
<img src="sample.jpg">
<img src="showimage.php?blog_id=22">

</body>
</html>
