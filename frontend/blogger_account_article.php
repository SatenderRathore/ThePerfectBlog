<?php
include("db.php");

session_start();
if(!isset($_SESSION['email']))
{
  header("Location:signup_form.php");
}

$blogger_id = $_SESSION['blogger_id'];
//echo "$blogger_id";
$blog_id = $_GET['blog_id'];

$query = "SELECT * FROM blog_master WHERE blog_id='$blog_id'";
$exec = mysqli_query($conn, $query);
$output = mysqli_fetch_array($exec, MYSQLI_ASSOC);
$current_blogger_id= $output['blogger_id'];
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
      $('input#input_text, textarea#textarea1').characterCounter();      
    });



  </script>
</head>

<body>
  <div id="blogger_login">
    <div class="navbar-fixed" >
      <nav>
        <div class="nav-wrapper blue-grey">
          <a href="index.php" class="brand-logo" style="padding-left:20px;" >TPB</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="index.php">Home</a></li>
            <li><a href="blogger_account.php">My Articles</a></li>
            <li><a href="blogger_account_create.php">Create</a></li>
            <li><a href="../backend/login/logout.php">LogOut</a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li  style="height:80px; margin-bottom:50px; padding-top:20px;" class="center"><a href="index.php"><img src="../images/icon.png" class="circle" alt="TPB icon"></a></li>
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
  </div>
  <div id="admin_login" style="display:none">
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
        echo'<div class="right" id="change_article">';
          echo'<a href="edit_blog.php?blog_id='.$blog_id.'" class="btn-floating btn-medium waves-effect waves-light green"><i class="material-icons">mode_edit</i></a>';
          echo'<a class="btn-floating btn-medium waves-effect waves-light red" style="margin-left:10px;" onclick="deleteBlog('.$blog_id.')" href="javascript:void(0);"><i class="material-icons">delete</i></a>';

        echo'</div>';
      echo'</div>';
    echo'</div> ';
  echo'</div>';
  ?>
  <!-- feedback of the article -->

  <div class="row container hoverable indigo lighten-5" style="margin-top:50px;">
    <div class="note col ">
      <h3>Leave a Comment</h3>
    <span>Your email address will not be published.</span>
    </div>

    <form class="col s12 " id="blog" method="post" action="../backend/feedback.php" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col m12 l12 s12">
          <input id="name" type="text" name="name" class="validate" aria-required="true">
          <label for="name" data-error="Enter Proper Name">Name</label>
        </div>
        <!-- will unable if username is already exists -->
        <div class="err" id="name_info"></div>
      </div>

      <div class="row">
        <div class="input-field col col m12 l12 s12">
          <input id="email" type="email" class="validate" name="email" required >
          <label for="email" data-error="Enter Proper email address">Email</label>
        </div>
        <!-- will unable if username is already exists -->
        <div class="err" id="email_info"></div>
      </div>

      <div class="row">
        <div class="input-field col col m12 l12 s12">
          <textarea id="comment" name="comment" class="materialize-textarea" length="10" maxlength="120"></textarea>
          <label for="comment" data-error="Please Write Something!">Comments</label>
        </div>
      </div>

      <button id="buttonsubmit" class="btn waves-effect waves-light " style="margin-bottom:20px;" type="submit" name="submit">Submit
      <i class="material-icons right">send</i>
      </button>
    </form>
  </div>
        

  </div>
</body>

<script src="../materialize/js/materialize.min.js"></script>
<script>
    function deleteBlog(blogId)
      {
        // alert(blogId);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
              document.getElementById(blogId).innerHTML = xmlhttp.responseText;
              console.log(xmlhttp.responseText);
              setTimeout(function(){ document.getElementById(blogId).style.display = "none"; }, 3000);
              //stop time 
              //then display none in div in id
              // document.getElementById(blogId).innerHTML = "";
              
          }
        };
      xmlhttp.open("GET","../backend/ajax/delete_blog_by_blogger.php?blog_id=" + blogId, true);
      xmlhttp.send();
      }

    // give edit options to allowed users only !!!! 

    var current_blogger_id = "<?php echo $current_blogger_id ?>";
    var blogger_id = "<?php echo $blogger_id ?>";
    if(blogger_id === current_blogger_id)
    {
      document.getElementById("change_article").style.display="block";
    }
    else
    {
      document.getElementById("change_article").style.display="none";

      //....... change menu bar according to admin/bloggers
      var check = "<?php echo isset($_SESSION['blogger_id']); ?>";
      console.log(check);
      if(check == 1)
      {
        document.getElementById('blogger_login').style.display="none";
        document.getElementById('admin_login').style.display="block";
        console.log("admin");
      }
      else
      {
        document.getElementById('admin_login').style.display="none";
        document.getElementById('blogger_login').style.display="block";
        console.log("blogger");
      }
    }

    //................................
    // to check feedback to the article
    function submitForm() {


    }


</script>


</html>