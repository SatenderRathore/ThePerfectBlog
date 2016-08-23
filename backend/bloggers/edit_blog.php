<?php 
include("db.php");
	
if(isset($_POST['submit']))
{	
	session_start();
	$blogger_id    = $_SESSION['blogger_id'];
	$blog_title    = $_POST['blog_title'];
	$blog_desc     = $_POST['blog_desc'];
	$blog_category = $_POST['blog_cat'];
	$blog_author   = $_SESSION['blog_author'];
	$blog_id       = $_SESSION['blog_id'];

//----------------------this is for image------------------------

	$imageName = mysqli_real_escape_string($conn,$_FILES['image']['name']);
	$imageData = mysqli_real_escape_string($conn,file_get_contents($_FILES['image']['tmp_name']));
	$imageType = mysqli_real_escape_string($conn,$_FILES['image']['type']);
	

//----------------------this is for image------------------------ 

	$current_date = date("Y-m-d");
	
	// $insert_query = "INSERT INTO blog_master (blogger_id,blog_title,blog_desc,blog_category,blog_author,updation_date) VALUES('$blogger_id','$blog_title','$blog_desc','$blog_category','$blog_author','$current_date')";
    $update_query = "UPDATE blog_master SET blog_title='$blog_title',blog_desc='$blog_desc',blog_category='$blog_category',blog_author='$blog_author',blog_is_active='0',updation_date='$current_date' WHERE blog_id='$blog_id'";
    $exec = mysqli_query($conn, $update_query);
    
//----------------------this is for image--------------------------

    if(substr($imageType, 0, 5) == "image")
	{
		// --------------------code to get blog_id---------------------------------------------------------------------------
		$query_for_blog_id = "SELECT blog_id FROM blog_master WHERE blogger_id='$blogger_id' and blog_title='$blog_title' and blog_desc='$blog_desc' and blog_category='$blog_category' and blog_author='$blog_author'";
		$exec_for_blog_id = mysqli_query($conn, $query_for_blog_id);
		$output = mysqli_fetch_array($exec_for_blog_id, MYSQLI_ASSOC);

		$blog_id = $output['blog_id'];

		//-----------------------------------------------------------------------------------------------------------------------
		
		//-------------------check if image was uploaded earlier------------------------------------------------------------
		$query_to_check = "SELECT * FROM blog_detail WHERE blog_id='$blog_id'";
		$exec_to_check  = mysqli_query($conn, $query_to_check);
		$output = mysqli_fetch_array($exec_to_check, MYSQLI_ASSOC);
		
		// -----------------------------------------------------------------------------------------------------------------
		if($output['blog_id'] == $blog_id)//already image was uploaded earlier
		{
			$query_to_update_image = "UPDATE blog_detail SET blog_detail_image='$imageData' WHERE blog_id='$blog_id'";
			$exec_to_update_image  = mysqli_query($conn, $query_to_update_image);
		}
		else
		{
			$query = "INSERT INTO blog_detail VALUES ('$blog_id','$imageData')";
			$exec = mysqli_query($conn, $query);

		}
	}
	
	else
	{
		?>
		<script>alert("please insert image only");</script>
		<?php
	}

//----------------------this is for image-------------------------- 

    ?>
        <script> alert('your blog is submitted successfully'); window.location.href = "../../frontend/blogger_account.php";</script>';
      <?php
    print_r("your blog is submitted successfully");

}
?>
