<?php
include("db.php");

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
          <li><a href="signup_form.php">Enter</a></li>
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
          <li><a href="signup_form.php">Enter</a></li>
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

  <div class="row container hoverable indigo lighten-5" style="margin-top:50px;">
    <div class="note col ">
      <h3>Leave a Comment</h3>
      <span>Admin will reply to your e-mail id.</span>
    </div>

    <form class="col s12 " id="blog" method="post" action="../backend/contact.php" enctype="multipart/form-data">
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
          <textarea id="comment" name="comment" class="materialize-textarea"></textarea>
          <label for="comment" data-error="Please Write Something!">Comments</label>
        </div>
      </div>

      <button id="buttonsubmit" class="btn waves-effect waves-light " style="margin-bottom:20px;" type="submit" name="submit" >Submit
      <i class="material-icons right">send</i>
      </button>
    </form>
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
</script>

</html>