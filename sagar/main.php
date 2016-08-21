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

	<div class="container">
		<div class="card hoverable large article">
			<div class="card-image">
				<img src="../images/sample-1.jpg">
				<span class="card-title">Card Title</span>
			</div>
			<div class="card-content">
		    <p>
				I am a very simple card. I am good at containing small bits of information.
				I am convenient because I require little markup to use effectively.
		 	</p>
	  		</div>
			<div class="card-action" style="padding:10px 20px;">
				<a href="#">Read More</a>
			</div>
		</div>

		<div class="card hoverable medium article">
			<div class="card-image">
				<img src="../images/sample-1.jpg">
				<span class="card-title">Card Title</span>
			</div>
			<div class="card-content">
		    <p>
				I am a very simple card. I am good at containing small bits of information.
				I am convenient because I require little markup to use effectively.
		 	</p>
	  		</div>
			<div class="card-action" style="padding:10px 20px;">
				<a href="#">Read More</a>
			</div>
		</div>

		<div class="card hoverable medium article">
			<div class="card-image">
				<img src="../images/sample-1.jpg">
				<span class="card-title">Card Title</span>
			</div>
			<div class="card-content">
		    <p>
				I am a very simple card. I am good at containing small bits of information.
				I am convenient because I require little markup to use effectively.
		 	</p>
	  		</div>
			<div class="card-action" style="padding:10px 20px;">
				<a href="#">Read More</a>
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