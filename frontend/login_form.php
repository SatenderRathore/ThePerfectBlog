<?php 
session_start();
if(isset($_SESSION['email']))
{
  header("Location:blogger_account.php");
}
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
              <li><a href="signup_form.php">Sign Up</a></li>
              <li><a href="login_form.php">Sign In</a></li>
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
              <li  style="height:100px;"><a href="index.php"><img src="#" alt="TPB icon"></a></li>
              <li></li>
              <li><a href="index.php">Home</a></li>
              <li><a href="signup_form.php">Sign Up</a></li>
              <li><a href="login_form.php">Sign In</a></li>
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




        <div class="row">
            <form class="col s8" id="login_form" method="post" action="../backend/login/login.php">
              <div class="row">
                <div class="input-field col s4">
                <i class="material-icons prefix">email</i>
                  <input id="email" type="email" name="email" class="validate" onchange="checkEmail()" required>
                  <label for="email">Email</label>
                </div>
              </div>
        <!-- will unable if email is already exists -->
        <div id="email_info"></div>

        <div class="row">
          <div class="input-field col s4">
            <i class="material-icons prefix">security</i>
              <input id="password" type="password" name="password" class="validate"  pattern=".{6,}" title="password length should be greater than 6" required>
              <label for="password">Password</label>
          </div>
        </div>
        <!-- will unable if emailId-password combination does not match -->
        <div id="submit_result"></div>
        <button id="button" class="btn waves-effect waves-light" type="button" name="button" onclick="submitForm()">Submit
        <i class="material-icons right">send</i>
        </button>
            </form>
            
      </div>


      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
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


  <script type="text/javascript">
    
    function checkEmail()
    {
      var email = document.getElementById("email").value;
      
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById("email_info").innerHTML = xmlhttp.responseText;
                //disable button if div of id email_info have some error message
                var isEmptyEmail = document.getElementById("email_info").innerHTML
                if((isEmptyEmail === ""))
                {
                  document.getElementById("button").disabled = false;
                }
                else
                {
                  document.getElementById("button").disabled = true;
                }
            }
        };
        xmlhttp.open("GET", "../backend/ajax/login_email_ajax.php?email=" + email, true);
        xmlhttp.send();
         
    }

    function submitForm()
    {      
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      if((email !== "") && (password !== ""))
       {
        // alert("in");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById("submit_result").innerHTML = xmlhttp.responseText;

                var isEmptyResult = document.getElementById("submit_result").innerHTML;
                if(isEmptyResult === "")
                {
                  document.getElementById("login_form").submit();
                }
                
            }
        };
        xmlhttp.open("GET", "../backend/ajax/login_submit_ajax.php?email=" + email + "&password=" + password, true);
        xmlhttp.send();
      }
      // alert(password);
    }

  </script>