<?php
include("../backend/db.php");
//--------checking for session---------------
session_start();
if(!isset($_SESSION['email']))
{
	header("Location:login_form.php");
}
//--------------------------------------------


print_r("blogger's account");


?>
<a href="../backend/login/logout.php">LogOut</a>

