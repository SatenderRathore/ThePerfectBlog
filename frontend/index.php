<?php 

include("db.php");
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

  <link rel="stylesheet" type="text/css" href="../materialize/css/main.css">
</head>

<body>
	<div class="navbar-fixed">
		<nav>
		    <div class="nav-wrapper indigo">
				<a href="#!" class="brand-logo" style="padding-left:20px;" >TPB</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="main.php">Home</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">Sign In</a></li>
					<li><a href="#"><i class="material-icons" id="search" onclick="activate()">search</i></a></li>
					<form class="right" id="search_with_details" style="display:none;">
				        <div class="input-field">
				          <input id="search" type="search" required>
				          <label for="search"><i class="material-icons">search</i></label>
				          <i class="material-icons">close</i>
				        </div>
				    </form>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="main.php">Home</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">Sign In</a></li>
					<li><a href="#"><i class="material-icons" id="search">search</i></a></li>
					
				</ul>
		    </div>
	  	</nav>
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
	


	echo'<div class="container">';
		echo'<div class="card hoverable large article">';
			echo'<div class="card-image">';
				echo'<img src="../images/sample-1.jpg">';
				echo'<span class="card-title">' . $row[2] . '</span>';
			echo'</div>';
			echo'<div class="card-content">';
		    echo'<p>';
		    echo $row[3];
				
		 	echo'</p>';
	  		echo'</div>';
			echo'<div class="card-action" style="padding:10px 20px;">';
				echo'<a href="#">Read More</a>';
			echo'</div>';
		echo'</div>';

	echo'</div>';
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
	$(document).ready(function(){
    $(".button-collapse").sideNav();        
	});

</script>

</html>
