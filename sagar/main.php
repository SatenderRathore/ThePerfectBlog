<html>
<head>
<title>Main Page</title>
  <link rel="stylesheet" type="text/css" href="../materialize/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../materialize/css/main.css">
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
				<a href="#!" class="brand-logo" style="padding-left:20px;" >TPB</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="main.php">Home</a></li>
					<li><a href="../frontend/signup_form.php">Sign Up</a></li>
					<li><a href="../frontend/login_form.php">Sign In</a></li>
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
					<li  style="height:100px;"><a href="main.php"><img src="#" alt="TPB icon"></a></li>
					<li></li>
					<li><a href="main.php">Home</a></li>
					<li><a href="../frontend/signup_form.php">Sign Up</a></li>
					<li><a href="../frontend/login_form.php">Sign In</a></li>
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
				<img src="../images/sample-1.jpg">
				<span class="card-title">Card Title</span>
			</div>
			<div class="card-content" style="max-height: 85px;">
		    <p>
				I 
		 	</p>
	  		</div>
		 	<a href="#" class="waves-effect waves-light btn " style="margin:15px">Read More</a>

			<div class="card-action" style="padding:10px 20px; height:50px;">
				<div class="left">
				<div class="left"><img src="#" alt="img"></div>
				<div class="right" style="margin-left:10px">
					<div ><a href="#" style="font-size:0.75em; color: #757575">Sagar Keshri</a></div>
					<div ><a href="#" style="font-size:0.75em; color: #757575">Date</a></div>

				</div>
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
	
</script>

</html>