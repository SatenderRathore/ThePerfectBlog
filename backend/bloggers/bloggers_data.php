<?php 
include("db.php");

if(isset($_POST['submit']))
{	session_start();
	$blogger_id    = $_SESSION['blogger_id'];
	$blog_title    = $_POST['blog_title'];
	$blog_desc     = $_POST['blog_desc'];
	$blog_category = $_POST['blog_cat'];
	$blog_author   = $_SESSION['blog_author'];

//----------------------this is for image------------------------

	$imageName = mysqli_real_escape_string($conn,$_FILES['image']['name']);
	$imageData = mysqli_real_escape_string($conn,file_get_contents($_FILES['image']['tmp_name']));
	$imageType = mysqli_real_escape_string($conn,$_FILES['image']['type']);


//----------------------this is for image------------------------ 

	$current_date = date("Y-m-d");
	
	$insert_query = "INSERT INTO blog_master (blogger_id,blog_title,blog_desc,blog_category,blog_author,creation_date,updation_date) VALUES('$blogger_id','$blog_title','$blog_desc','$blog_category','$blog_author','$current_date','$current_date')";
    mysqli_query($conn, $insert_query);

//----------------------this is for image--------------------------

    if(substr($imageType, 0, 5) == "image")
	{
		// --------------------code to get blog_id---------------------------------------------------------------------------
		$query_for_blog_id = "SELECT blog_id FROM blog_master WHERE blogger_id='$blogger_id' and blog_title='$blog_title' and blog_desc='$blog_desc' and blog_category='$blog_category' and blog_author='$blog_author'";
		$exec_for_blog_id = mysqli_query($conn, $query_for_blog_id);
		$output = mysqli_fetch_array($exec_for_blog_id, MYSQLI_ASSOC);

		$blog_id = $output['blog_id'];
		//-----------------------------------------------------------------------------------------------------------------------
		
		$query = "INSERT INTO blog_detail VALUES ('$blog_id','$imageData')";
		$exec = mysqli_query($conn, $query);

	}
	
	else
	{
		?>
		<script>alert("please insert image only");</script>
		<?php
	}

//----------------------this is for image-------------------------- 

    
    print_r("your blog is submitted successfully");

}
?>
