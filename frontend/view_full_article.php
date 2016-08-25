<?php
include("db.php");


$blog_id = $_GET['blog_id'];

$query = "SELECT * FROM blog_master WHERE blog_id='$blog_id'";
$exec = mysqli_query($conn, $query);
$output = mysqli_fetch_array($exec, MYSQLI_ASSOC);
// print_r($blog_id);
/*
$blog_id = $_GET['blog_id'];

$query = "SELECT * FROM blog_master WHERE blog_id='$blog_id'";
$exec = mysqli_query($conn, $query);
$output = mysqli_fetch_array($exec, MYSQLI_ASSOC);
// print_r($blog_id);*/


?>



<html>
<head>
<title>Full Blog</title>
  <link rel="stylesheet" type="text/css" href="../materialize/css/materialize.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
  <link rel="stylesheet" type="text/css" href="../materialize/css/blogger_account_article.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <script>
  	$(document).ready(function(){
    $(".button-collapse").sideNav();        
	});



  </script>
</head>

<body>
	<div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper indigo">
            <a href="index.php" class="brand-logo" style="padding-left:20px;" >TPB</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="index.php">Home</a></li>
              <li><a href="blogger_account.php">My Articles</a></li>
              <li><a href="blogger_account_create.php">Create</a></li>
              <li><a href="../backend/login/logout.php">LogOut</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li  style="height:100px;"><a href="index.php"><img src="#" alt="TPB icon"></a></li>
              <li></li>
              <li><a href="index.php">Home</a></li>
              <li><a href="blogger_account.php">My Articles</a></li>
              <li><a href="blogger_account_create.php">Create</a></li>
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


<?php  


$blog_title = $output['blog_title'];
$blog_desc  = $output['blog_desc'];
$blog_category = $output['blog_category'];

	echo'<div class="container">';
		echo'<div class="card hoverable xlarge article" id="'.$blog_id.'" >';
			echo'<div class="card-image">';
				echo'<img class="responsive-img" src="showimage.php?blog_id='.$blog_id.'">';
				echo'<span class="card-title"><h4>'.$blog_title.'</h4></span>';
			echo'</div>';
			
			echo'<div class="card-content" >';
			   echo'<p>';
          echo $blog_desc;
			 	echo'</p>';
	  	echo'</div>';
      echo'<div class="chip" id="category" style="margin-left:20px;margin-bottom:70px;">'.$blog_category.'</div>';
		
      echo'<div class="card-action">';
        echo'<div class="left">';
          echo'<div class="left" style="height:32; width:32;"><img src="../images/blogicon.jpg" alt="img" height="32" width="32"></div>';
          echo'<div class="right" style="margin-left:10px">';
            echo'<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">Sagar Keshri</a></div>';
            echo'<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">July 10, 2015</a></div>';

          echo'</div>';
        echo'</div>';
        
      echo'</div>';
    echo'</div> ';
	echo'</div>';
  ?>
</body>

<script src="../materialize/js/materialize.min.js"></script>

</html>