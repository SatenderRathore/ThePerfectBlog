<?php 
include("db.php");

session_start();
if(!isset($_SESSION['email']))
{
  header("Location:signup_form.php");
}


$query = "SELECT * FROM blog_master WHERE blog_is_active = '0'";
$exec = mysqli_query($conn,$query);

?>

<html>
  <head>
  <title>Admin</title>
    
    <link rel="stylesheet" type="text/css" href="../materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="../materialize/css/main.css">
  </head>

<body>
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper blue-grey">
        <a href="index.php" class="brand-logo" style="padding-left:20px;">FNW</a>
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

<?php
  $i=0;
  while($row = mysqli_fetch_row($exec))
  {

        $blog_id[$i] = $row[0];
        $blog_title[$i] = $row[2];
        $blog_desc[$i] = $row[3];
        $blog_category[$i] = $row[4];
        $blog_author[$i] = $row[5];
        $creation_date[$i] = $row[8];
        $_SESSION['blog_id'] = $blog_id;
        echo'<div class="container">';
          echo'<div class="card hoverable large article" id="'.$blog_id[$i].'" style="margin-top:40px; margin-bottom:40px;">';
            echo'<div class="card-image">';
              echo'<img class="responsive-img" src="showimage.php?blog_id='.$blog_id[$i].'">';
              echo'<span class="card-title">'.$blog_title[$i].'</span>';
            echo'</div>';
            echo'<div class="card-content " style="max-height: 85px;">';
              echo'<p>';
                echo $blog_desc[$i]; 
              echo'</p>';
            echo'</div>';
              
            echo'<div class="chip" id="category" style="margin-left:20px;margin-top:20px;">'.$blog_category[$i].'</div>';
          
            echo'<div class="card-action" style="padding:5px 20px; height:50px;">';
              echo'<div class="left">';
                echo'<div class="left" style="height:32; width:32;"><img src="../images/blogicon.jpg" alt="img" height="32" width="32"></div>';
                echo'<div class="right" style="margin-left:10px">';
                  echo'<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">'.$blog_author[$i].'</a></div>';
                  echo'<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">'.$creation_date[$i].'</a></div>';

                echo'</div>';
              echo'</div>';
              
              echo'<div class="right">';
                echo'<div class="fixed-action-btn horizontal " style="position: inherit">';
                    echo'<a class="btn-floating btn-medium red">';
                        echo'<i class="large material-icons">menu</i>';
                    echo'</a>';
                    echo'<ul>';
                      echo'<li style="margin: 5px 15px 0 0;"><a class="btn-floating left green modal-trigger" href="#modal'.$i.'"><i class="material-icons">aspect_ratio</i></a></li>';
                      echo'<li style="margin: 5px 15px 0 0;"><a class="btn-floating left blue" href="blogger_account_article.php?blog_id='.$blog_id[$i].'"><i class="material-icons">comment</i></a></li>';
                      echo'<li style="margin: 5px 15px 0 0;"><a class="btn-floating btn-medium waves-effect waves-light left green " onclick="approveBlog('.$blog_id[$i].')" href="javascript:void(0);"><i class="material-icons">done</i>/a></li>';
                      echo'<li style="margin: 5px 15px 0 0;"><a class="btn-floating btn-medium waves-effect waves-light left red" onclick="deleteBlog('.$blog_id[$i].')" href="javascript:void(0);"><i class="material-icons">delete</i></a></li>';
                      
                    echo'</ul>';
                echo'</div>';
              echo'</div>';
            echo'</div>';
          echo'</div>';
        echo'</div>';

    echo'<div id="modal'.$i.'" class="modal modal-fixed-footer" style="width:70%; margin-top:50px;">';
      echo '<div class="modal-content" style="padding:0">';
        echo'<div class="card xlarge" style="margin-top:-5px; margin-bottom:-5px; box-shadow: none;">';
          echo'<div class="card-image">';
            echo'<img class="responsive-img" src="showimage.php?blog_id='.$blog_id[$i].'" >';
            echo'<span class="card-title">'.$blog_title[$i].'</span>';
          echo'</div>';

          echo'<div class="card-content" style="padding-bottom:20px;">';
              echo'<p>';
              echo $blog_desc[$i]; 
            echo'</p>';
          echo '</div>';
          echo'<div class="chip" id="category" style="margin-left:20px;margin-bottom:20px;">'.$blog_category[$i].'</div>';
          echo'</div>';
      echo '</div>';
        echo'<div class="modal-footer">';
        echo'<div class="left">';
          echo'<div class="left" style="height:32; width:32;"><img src="../images/blogicon.jpg" alt="img" height="32" width="32"></div>';
          echo'<div class="right" style="margin-left:10px">';
            echo'<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">'.$blog_author[$i].'</a></div>';
            echo'<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">'.$creation_date[$i].'</a></div>';

          echo'</div>';
        echo'</div>';
        echo'<div class="right">';
          echo'<div class="fixed-action-btn horizontal" style="position: inherit">';
              echo'<a class="btn-floating btn-medium red">';
                  echo'<i class="large material-icons">menu</i>';
              echo'</a>';
              echo'<ul>';
                echo'<li style="margin: 5px 15px 0 0;"><a class="btn-floating blue" href="view_full_article.php?blog_id='.$blog_id[$i].'"><i class="material-icons">comment</i></a></li>';
              echo'</ul>';
          echo'</div>';
        echo'</div>';
      echo'</div>';
    echo'</div>';


        $i++;
  }
?>

</body>

<script src="../materialize/js/materialize.min.js"></script>
<script>
  $(document).ready(function(){
    $(".button-collapse").sideNav();        
    $('.modal-trigger').leanModal();        
  });

</script>

</html>




<script type="text/javascript">
  function approveBlog(blogId)
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
      xmlhttp.open("GET","../backend/ajax/approve_new_blog.php?blog_id=" + blogId, true);
      xmlhttp.send();
  }

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
      xmlhttp.open("GET","../backend/ajax/delete_blog_by_admin.php?blog_id=" + blogId, true);
      xmlhttp.send();
      }

</script>
