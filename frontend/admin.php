<?php
include("../backend/db.php");
//--------checking for session---------------
session_start();
if(!isset($_SESSION['email']))
{
	header("Location:signup_form.php");
}

?>


<html>
  <head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../materialize/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
	<body>
	  <div class="navbar-fixed">
	    <nav>
	      <div class="nav-wrapper blue-grey">
	        <a href="index.php" class="brand-logo" style="padding-left:20px;" >TPB</a>
	        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	        <ul class="right hide-on-med-and-down">
	          <li><a href="index.php">Home</a></li>
	          <li><a href="new_blogs.php">New Blogs</a></li>
	          <li><a href="new_accounts.php">New Accounts</a></li>
	          <li><a href="../backend/login/logout.php">LogOut</a></li>
	        </ul>
	        <ul class="side-nav" id="mobile-demo">
	          <li  style="height:80px; margin-bottom:50px; padding-top:20px;" class="center"><a href="index.php"><img src="../images/icon.png" class="circle" alt="TPB icon"></a></li>
	          <li></li>
	          <li><a href="index.php">Home</a></li>
	          <li><a href="new_blogs.php">New Blogs</a></li>
	          <li><a href="new_accounts.php">New Accounts</a></li>
	          <li><a href="../backend/login/logout.php">LogOut</a></li>
	              <!--<li class="search ">
	                <div class="search-wrapper card">
	                    <input id="search"><i class="material-icons">search</i>
	                    <div class="search-results" style="display:none"></div>
	                </div>
	              </li>-->          
	        </ul>
	      </div>
	    </nav>
	  </div>
	</body>
  <script src="../materialize/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $(".button-collapse").sideNav();        
    });
  </script>
</html>