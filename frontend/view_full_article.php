<?php
include("db.php");

session_start();
$blog_id = $_GET['blog_id'];
// $_SESSION['blog_id'] = $blog_id;
// print_r($_SESSION['blog_id']);
//print_r($blog_id);

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
  <link rel="stylesheet" type="text/css" href="../materialize/css/view_full_article.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <script>
  	$(document).ready(function(){
      $(".button-collapse").sideNav();    
      $('input#input_text, textarea#textarea1').characterCounter();    
	  });
  </script>
  <style>
    .err{
      font-size: 0.8rem;
      position: relative;
      display: inline-block;
      top: -1rem;
      left: 1rem;
      color: #FF4081;
    }

  </style>
</head>

<body>
	<div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper blue-grey">
        <a href="index.php" class="brand-logo" style="padding-left:20px;">FNW</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="index.php">Home</a></li>
          <li><a href="signup_form.php">Let's Start</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
          <li><a href="#"><i class="material-icons" id="search" onclick="activate()">search</i></a></li>
          <form class="right" id="search_with_details" style="display:none;">
            <div class="input-field">
              <input id="search" type="search" required>
              <label for="search"><i class="material-icons">search</i></label>
              <i class="material-icons" onclick="deactivate()">close</i>
            </div>
          </form>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li  style="height:80px; margin-bottom:50px; padding-top:20px;" class="center"><a href="index.php"><img src="../images/icon.png" class="circle" alt="TPB icon"></a></li>
          <li></li>
          <li><a href="index.php">Home</a></li>
          <li><a href="signup_form.php">Let's Start</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
          <li><a href="#"><i class="material-icons" id="search" onclick="activate()">search</i></a></li>
          <form class="right" id="search_with_details" style="display:none;">
            <div class="input-field">
              <input id="search" type="search" required>
              <label for="search"><i class="material-icons">search</i></label>
              <i class="material-icons" onclick="deactivate()">close</i>
            </div>
          </form>
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
        echo'<div class="left"style="margin-top:-15px;">';
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
  <!-- feedback of the article -->
<?php

$query = "SELECT * FROM feedback WHERE blog_id = '$blog_id'";
$exec = mysqli_query($conn,$query);
// $result = mysqli_fetch_array($exec, MYSQLI_ASSOC);
while($row = mysqli_fetch_row($exec))
{
  $name = $row[2];
  $comment = $row[4];
    echo'<div class="row container" style="margin-top:20px;">';
      echo'<div class=" card col s12" id="">';
        echo'<div class="comment ">';
          echo'<div class="name"><strong>'.$name.' :</strong></div>';
          echo'<br\>';
          echo'<div class="desc" style="font-size: 0.85em;">'.$comment.'</div>';
        echo'</div>';
      echo'</div>';
    echo'</div>';
}
?>
  


  <div class="row container indigo lighten-5" style="margin-top:20px;">
  <div class="row container hoverable indigo lighten-5" style="margin-top:50px;">
    <div class="note col ">
      <h3>Leave a Comment</h3>
    <span>Your email address will not be published.</span>
    </div>

    <form class="col s12 " id="blog" method="post" action="../backend/feedback.php" enctype="multipart/form-data">

      <?php
      $_SESSION['blog_id']=$blog_id;
      ?>
      <div class="row">
        <div class="input-field col m12 l12 s12">
          <input id="name" type="text" name="name" class="validate" required>
          <label for="name" data-error="Enter Proper Name">Name</label>
        </div>
        <!-- will unable if username is already exists -->
        <div class="err" id="name_info"></div>
      </div>

      <div class="row">
        <div class="input-field col col m12 l12 s12">
          <input id="email" type="email" name="email" class="validate" required>
          <label for="email" data-error="Enter Proper email address">Email</label>
        </div>
        <!-- will unable if username is already exists -->
        <div class="err" id="email_info"></div>
      </div>

      <div class="row">
        <div class="input-field col col m12 l12 s12">
          <textarea id="comment" name="comment" class="materialize-textarea" length="120" maxlength="120"></textarea>
          <label for="comment" data-error="Please Write Something!">Comments</label>
        </div>
      </div>

      <button id="buttonsubmit" class="btn waves-effect waves-light " style="margin-bottom:20px;" type="submit" name="submit" >Submit
      <i class="material-icons right">send</i>
      </button>
    </form>
  </div>

  


  </div>
  
</body>

<script src="../materialize/js/materialize.min.js"></script>
<script>
  function activate()
  {
    document.getElementById('search').style.display="none";
    document.getElementById('search_with_details').style.display="block";
  }
  function deactivate()
  {
    document.getElementById('search').style.display="block";
    document.getElementById('search_with_details').style.display="none";
  }

  // to check feedback to the article
  function submitForm() {


  }

  
</script>

</html>