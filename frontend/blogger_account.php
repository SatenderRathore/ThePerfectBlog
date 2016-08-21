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
      <link rel="stylesheet" type="text/css" href="../materialize/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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

      <div class="container">
        <div class="card hoverable large article">
          <div class="card-image">
            <img class="responsive-img" src="../images/sample-1.jpg">
            <span class="card-title">Card Title</span>
          </div>
          <div class="card-content" style="max-height: 85px;">
            <p>
            I 
          </p>
            </div>
          <a href="#" class="waves-effect waves-light btn " style="margin:15px">Read More</a>

          <div class="card-action" style="padding:5px 20px; height:50px;">
            <div class="left">
              <div class="left" style="height:32; width:32;"><img src="#" alt="img" height="32" width="32"></div>
              <div class="right" style="margin-left:10px">
                <div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">Sagar Keshri</a></div>
                <div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">July 10, 2015</a></div>

              </div>
            </div>
            <div class="right">
              <a href="#" class="btn-floating btn-medium waves-effect waves-light green"><i class="material-icons">mode_edit</i></a>
              <a href="#" class="btn-floating btn-medium waves-effect waves-light red" style="margin-left:10px;"><i class="material-icons">delete</i></a>

            </div>
          </div>
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
      $(document).ready(function(){
        $(".button-collapse").sideNav();        
      });


    </script>
  </html>