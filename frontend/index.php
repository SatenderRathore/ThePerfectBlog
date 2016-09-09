<?php 

include("db.php");

session_start();

$query = "SELECT * FROM blog_master ORDER BY updation_date DESC";
$exec = mysqli_query($conn, $query);

// while($row = mysqli_fetch_row($exec))
// {
// 	print_r($row[0] . ", ");
// 	print_r($row[1] . ", ");
// 	print_r($row[2] . ", ");
// 	print_r($row[3] . ", ");
// 	print_r($row[4] . ", ");
// 	print_r($row[5] . ", ");
// 	print_r($row[6] . ", ");
// 	print_r($row[7] . ", ");
// 	print_r($row[8] . ", ");
// 	// 
	

// }


?>

<html>
<head>
<title>Main Page</title>
  <link rel="stylesheet" type="text/css" href="../materialize/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../materialize/css/main.css">
</head>

<body>
	<div id="not_login">
	  <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper indigo">
            <a href="index.php" class="brand-logo" style="padding-left:20px;" >TPB</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="index.php">Home</a></li>
              <li><a href="signup_form.php">Sign Up</a></li>
              <li><a href="login_form.php">Login</a></li>
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
              <li  style="height:100px;"><a href="index.php"><img src="#" alt="TPB icon"></a></li>
              <li></li>
              <li><a href="index.php">Home</a></li>
              <li><a href="signup_form.php">Sign Up</a></li>
              <li><a href="login_form.php">Login</a></li>
              <li><a href="contactus.php">Contact Us</a></li>
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
    <div id="blogger_login" style="display:none;">
      <div class="navbar-fixed" >
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
    </div>
    <div id="admin_login" style="display:none">
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
    </div>

<?php 

	
while($row = mysqli_fetch_row($exec))
{
	// print_r($row[0] . ", ");
	// print_r($row[1] . ", ");
	// print_r($row[2] . ", ");
	// print_r($row[3] . ", ");
	// print_r($row[4] . ", ");
	// print_r($row[5] . ", ");
	// print_r($row[6] . ", ");
	// print_r($row[7] . ", ");
	// print_r($row[8] . ", ");
	// 

	if($row[6]=='1')	
	{
		$blog_id =$row[0];
		echo'<div class="container">';
			echo'<div class="card hoverable large article">';
				echo'<div class="card-image">';
					echo'<img class="responsive-img" src="showimage.php?blog_id='.$blog_id.'" >';
					echo'<span class="card-title">'.$row[2].'</span>';
				echo'</div>';
				echo'<div class="card-content" style="max-height: 85px;">';
			    echo'<p>';
				echo $row[3]; 
			 	echo'</p>';
		  		echo'</div>';
		  		//echo $_SESSION['blogger_id'];
		  		if(isset($_SESSION['blogger_id']))
		  		{
			 		echo'<a href="blogger_account_article.php?blog_id='.$blog_id.'" class="waves-effect waves-light btn " style="margin:15px">Read More</a>';
			 	}
			 	else
			 	{
			 			echo'<a href="view_full_article.php?blog_id='.$blog_id.'" class="waves-effect waves-light btn " style="margin:15px">Read More</a>';
			 	}
				echo'<div class="card-action" style="padding:5px 20px; height:50px;">';
					echo'<div class="left">';
					echo'<div class="left" style="height:32; width:32;"><img src="../images/blogicon.jpg" alt="img" height="32" width="32"></div>';
					echo'<div class="right" style="margin-left:10px">';
						echo'<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">'.$row[5].'</a></div>';
						echo'<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">'.$row[8].'</a></div>';

					echo'</div>';
					echo'</div>';
				echo'</div>';
			echo'</div>';
		echo'</div>';
	}

	
	
	// echo'<div class="container">';
	// 	echo'<div class="card hoverable large article">';
	// 		echo'<div class="card-image">';
	// 			echo'<img src="../images/sample-1.jpg">';
	// 			echo'<span class="card-title">' . $row[2] . '</span>';
	// 		echo'</div>';
	// 		echo'<div class="card-content">';
	// 	    echo'<p>';
	// 	    echo $row[3];
				
	// 	 	echo'</p>';
	//   		echo'</div>';
	// 		echo'<div class="card-action" style="padding:10px 20px;">';
	// 			echo'<a href="#">Read More</a>';
	// 		echo'</div>';
	// 	echo'</div>';

	// echo'</div>';
}
?>	
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

	$(document).ready(function(){
    $(".button-collapse").sideNav();        
	});

	//....... change menu bar if session is logged in
	var check = "<?php echo ($_SESSION['blogger_id']); ?>";
	// console.log(check);
	if(check)
	{
		document.getElementById('not_login').style.display="none";
		if(check == "admin")
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
		//console.log("hello");
	}
	else
	{
		document.getElementById('admin_login').style.display="none";
		document.getElementById('blogger_login').style.display="none";
		document.getElementById('not_login').style.display="block";
		//console.log("bye");
	}



</script>

</html>
