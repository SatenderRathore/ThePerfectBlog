<?php 
include("db.php");

session_start();
if(!isset($_SESSION['email']))
{
  header("Location:signup_form.php");
}


$query = "SELECT * FROM blog_master WHERE blog_is_active = '0'";
$exec = mysqli_query($conn,$query);

// while($row = mysqli_fetch_row(($exec)))
// {

// 	$blog_id = $row[0];
// 	echo '<div id=' . $blog_id . '>';
// 	echo '<h1>hello</h1>';
// 	// print_r($row);
// 	print_r($row[0] . ", ");
// 	print_r($row[1] . ", ");
// 	print_r($row[2] . ", ");
// 	print_r($row[3] . ", ");
// 	print_r($row[4] . ", ");
// 	print_r($row[5] . ", ");
// 	print_r($row[6] . ", ");
// 	print_r($row[7] . ", ");
// 	print_r($row[8] . ", ");

	
// 	echo '<a onclick="approveBlog('.$blog_id.')" href="javascript:void(0);">approve blog </a>';
// 	echo '</div>';

// 	echo '<div id="a"></div>';
// }


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
      <div class="nav-wrapper indigo">
        <a href="index.php" class="brand-logo" style="padding-left:20px;" >TPB</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="index.php">Home</a></li>
          <li><a href="new_blogs.php">New Blogs</a></li>
          <li><a href="new_accounts.php">New Accounts</a></li>
          <li><a href="../backend/login/logout.php">LogOut</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li  style="height:100px;"><a href="index.php"><img src="#" alt="TPB icon"></a></li>
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


  while($row = mysqli_fetch_row($exec))
  {
    $blog_id = $row[0];

    echo'<div class="container" >';
      echo'<div class="card hoverable large article" id="'.$blog_id.'">';
        echo'<div class="card-image">';
          echo'<img src="showimage.php?blog_id='.$blog_id.'>';
          echo'<span class="card-title">'.$row[2].'</span>';
        echo'</div>';
        echo'<div class="card-content" style="max-height: 85px;">';
          echo'<p>';
        echo $row[3]; 
        echo'</p>';
          echo'</div>';
       echo'<a class="btn-floating btn-medium waves-effect waves-light left green " style="margin-left:15px; margin-top:15px;" onclick="approveBlog('.$blog_id.')" href="javascript:void(0);"><i class="material-icons">mode_edit</i>/a>';
        echo'<a class="btn-floating btn-medium waves-effect waves-light left red" style="margin-left:15px; margin-top:15px;" onclick="deleteBlog('.$blog_id.')" href="javascript:void(0);"><i class="material-icons">delete</i></a>';

        echo'<div class="card-action" style="padding:10px 20px; height:50px;">';
          echo'<div class="left">';
          echo'<div class="left"><img src="#" alt="img"></div>';
          echo'<div class="right" style="margin-left:10px">';
            echo'<div ><a href="#" style="font-size:0.75em; color: #757575">'.$row[5].'</a></div>';
            echo'<div ><a href="#" style="font-size:0.75em; color: #757575">'.$row[8].'</a></div>';

          echo'</div>';
          echo'</div>';
        echo'</div>';
      echo'</div>';
    echo'</div>';


    // echo'<div class="container">';
    //  echo'<div class="card hoverable large article">';
    //    echo'<div class="card-image">';
    //      echo'<img src="../images/sample-1.jpg">';
    //      echo'<span class="card-title">' . $row[2] . '</span>';
    //    echo'</div>';
    //    echo'<div class="card-content">';
    //      echo'<p>';
    //      echo $row[3];
          
    //    echo'</p>';
    //      echo'</div>';
    //    echo'<div class="card-action" style="padding:10px 20px;">';
    //      echo'<a href="#">Read More</a>';
    //    echo'</div>';
    //  echo'</div>';

    // echo'</div>';
  }
  ?>  
</body>

<script src="../materialize/js/materialize.min.js"></script>
<script>
  $(document).ready(function(){
    $(".button-collapse").sideNav();        
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
