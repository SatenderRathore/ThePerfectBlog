<?php
include("../backend/db.php");
//--------checking for session---------------
session_start();
if(!isset($_SESSION['email']))
{
	header("Location:login_form.php");
}

$blogger_id = $_SESSION['blogger_id'];

$query = "SELECT * FROM blog_master WHERE blogger_id = '$blogger_id' ORDER BY updation_date DESC";
$exec  = mysqli_query($conn, $query);
// printf("%d",$exec); 


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
<!--  -->
<?php

while($row = mysqli_fetch_row($exec))
{

      $blog_id = $row[0];
      $_SESSION['blog_id'] = $blog_id;
      echo'<div class="container">';
        echo'<div class="card hoverable large article" id="'.$blog_id.'" style="margin-top:40px; margin-bottom:40px;">';
          echo'<div class="card-image">';
            echo'<img class="responsive-img" src="showimage.php?blog_id='.$blog_id.'">';
            echo'<span class="card-title">'.$row[2].'</span>';
          echo'</div>';
          echo'<div class="card-content " style="max-height: 85px;">';
            echo'<p>';
            echo $row[3]; 
          echo'</p>';
            echo'</div>';
          echo'<a href="#" class="waves-effect waves-light btn " style="margin:15px">Read More</a>';

          echo'<div class="card-action" style="padding:5px 20px; height:50px;">';
            echo'<div class="left">';
              echo'<div class="left" style="height:32; width:32;"><img src="#" alt="img" height="32" width="32"></div>';
              echo'<div class="right" style="margin-left:10px">';
                echo'<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">'.$row[5].'</a></div>';
                echo'<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">'.$row[8].'</a></div>';

              echo'</div>';
            echo'</div>';
            echo'<div class="right">';
              echo'<a href="edit_blog.php?blog_id='.$blog_id.'" class="btn-floating btn-medium waves-effect waves-light green"><i class="material-icons">mode_edit</i></a>';
              echo'<a class="btn-floating btn-medium waves-effect waves-light red" style="margin-left:10px;" onclick="deleteBlog('.$blog_id.')" href="javascript:void(0);"><i class="material-icons">delete</i></a>';

            echo'</div>';
          echo'</div>';
        echo'</div>';
      echo'</div>';
}
?>
<!--  -->

 
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

      function deleteBlog(blogId)
      {
        // alert(blogId);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById(blogId).innerHTML = xmlhttp.responseText;
            setTimeout(function(){ document.getElementById(blogId).style.display = "none"; }, 3000);
            //stop time 
            //then display none in div in id
            // document.getElementById(blogId).innerHTML = "";
            
        }
        };
      xmlhttp.open("GET","../backend/ajax/delete_blog_by_blogger.php?blog_id=" + blogId, true);
      xmlhttp.send();
      }



    </script>
  </html>