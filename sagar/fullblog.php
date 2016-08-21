<html>
<head>
<title>Full Blog</title>
  <link rel="stylesheet" type="text/css" href="../materialize/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../materialize/css/fullblog.css">
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
				<a href="main.php" class="brand-logo" style="padding-left:20px;" >TPB</a>
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
		<div class="card-details hoverable large article" >
			<div class="card-image">
				<img class="responsive-img" src="../images/sample-1.jpg">
				<span class="card-title"><h4>Aliquam lorem ante dapibus in</h4></span>
			</div>
			<div class="card-action" style="padding:10px 20px; height:50px;">
				<div class="left">
					<div class="left" style="height:32; width:32;"><img src="#" alt="img" height="32" width="32"></div>
					<div class="right" style="margin-left:10px">
						<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">Sagar Keshri</a></div>
						<div ><a href="#" style="font-size:0.8em; color: #757575; font-weight:bold">July 10, 2015</a></div>

					</div>
				</div>
			</div>
			<div class="card-content" >
			    <p>
					In auctor lobortis lacus. In auctor lobortis lacus. Cras non dolor. Praesent egestas tristique nibh. Maecenas malesuada.

					Etiam vitae tortor. Etiam feugiat lorem non metus. Proin faucibus arcu quis ante. Fusce ac felis sit amet ligula pharetra condimentum. Donec venenatis vulputate lorem.

					Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Donec orci lectus, aliquam ut, faucibus non, euismod id, nulla. Duis vel nibh at velit scelerisque suscipit. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Maecenas malesuada.

					Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. In ac felis quis tortor malesuada pretium. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Vivamus in erat ut urna cursus vestibulum. Ut a nisl id ante tempus hendrerit.

					Sed fringilla mauris sit amet nibh. Nunc nonummy metus. Integer tincidunt. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis.
			 	</p>
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