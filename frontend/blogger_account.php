<?php
include("../backend/db.php");
//--------checking for session---------------
session_start();
if(!isset($_SESSION['email']))
{
	header("Location:login_form.php");
}
//--------------------------------------------
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="blogger_old_blogs.php">your old blogs</a>
<br>
<a href="blogger_account_create.php">write a new blog</a>
</body>
</html>
