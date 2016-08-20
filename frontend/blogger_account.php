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
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>


 <div class="row">
  <form class="col s12" id="blog" method="post" action="../backend/bloggers/bloggers_data.php">
   <div class="row">
	 <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="blog_title" type="text" class="validate" name="blog_title">
          <label for="icon_prefix">Blog title</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="blog_cat" type="tel" class="validate" name="blog_cat">
          <label for="icon_telephone">Blog category</label>
        </div>
      </div>
    </div>

    	<div class="row">
 			<div class="row">
        			<div class="input-field col s6">
          				<i class="material-icons prefix">mode_edit</i>
          				<textarea id="textarea" class="materialize-textarea" name="blog_desc"></textarea>
          				<label for="icon_prefix2">Blog description</label>
        			</div>
      			</div>
    	</div>
     
  <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
    <i class="material-icons right">send</i>
  </button>

  </form>
 </div>
        












      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>

      <a href="../backend/login/logout.php">LogOut</a>
    </body>
  </html>