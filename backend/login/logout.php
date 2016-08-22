<?php
print_r("logout");

session_start();
unset($_SESSION['email']);
if(session_destroy())
{
	?>
    <script> alert('logOut Successfully'); window.location.href = "../../frontend/signup_form.php";</script>';
	<?php
}

?>