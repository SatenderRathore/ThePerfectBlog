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
      <title>Enter</title>
      <link rel="stylesheet" type="text/css" href="../materialize/css/materialize.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../materialize/css/signup.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
      
      <div class="row container">
        <div class="form card-panel hoverable col m6 l6 s10 offset-s1 offset-l3 offset-m3">
          <h4 class="head">Sign Up</h4>
          <form id="signup" class="" method="post" action="../backend/signup/signup.php">
            <div class="row">
              <div class="input-field col m11 l11  s12">
              <i class="material-icons prefix">account_circle</i>
                <input id="username" type="text" name="username" class="validate" onchange="checkUsername()" placeholder="What do you want to be known as ?" required>
                <label for="Username">Username</label>
              </div>
              <!-- will unable if username is already exists -->
              <div class="err" id="username_info"></div>
            </div>
            
            <div class="row">
              <div class="input-field col m11 l11  s12 ">
               <i class="material-icons prefix">email</i>
                <input id="email" type="email" name="email" class="validate" onchange="checkEmail()" placeholder="Enter the email address" required>
                <label for="email" data-error="Enter Proper email address">Email</label>
              </div>              
              <!-- will unable if email is already exists -->
              <div class="err" id="email_info"></div>
            </div>

            <div class="row">
            
              <div class="input-field col m11 l11  s12 ">
                <i class="material-icons prefix">phone</i>
                <input id="contact" type="tel" name="contact" class="validate" onchange="checkContact()" pattern="[789][0-9]{9}" maxlength="10" title="Please enter valid contact number" placeholder="How can we contact you ?"   required>
                <label for="contact" data-error="Enter Proper Contact No">Telephone</label>
              </div>
              <!-- will unable if contact is already registered -->
              <div class="err" id="contact_info"></div>
            </div>
            
            <div class="row">
              <div class="input-field col m11 l11  s12 ">
              <i class="material-icons prefix">security</i>
                <input id="password" type="password" name="password" class="validate" pattern=".{6,}" title="password length should be greater than 6" placeholder="Enter your desired password" required>
                <label for="password" >Password</label>
              </div>
            </div>

            <center><button id="button" class="btn waves-effect waves-light " type="submit" name="submit" style="margin-bottom:20px;">Submit
            <i class="material-icons right">send</i>
            </button></center>
          </form>
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
      function deactivate()
      {
        document.getElementById('search').style.display="block";
        document.getElementById('search_with_details').style.display="none";
      }
      
    </script>
  </html>

  <!-- For signup part -->

  <script type="text/javascript">

    function checkUsername()
      {
        var username = document.getElementById("username").value;
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById("username_info").innerHTML = xmlhttp.responseText;
                //disable button if div of id username_info have some error message
                var isEmptyUsername = document.getElementById("username_info").innerHTML
                var isEmptyEmail = document.getElementById("email_info").innerHTML
                var isEmptyContact = document.getElementById("contact_info").innerHTML
                if((isEmptyUsername === "")&&(isEmptyEmail === "")&&(isEmptyContact === ""))
                {
                  document.getElementById("button").disabled = false;
                }
                else
                {
                  document.getElementById("button").disabled = true;
                }
            }
        };
        xmlhttp.open("GET","../backend/ajax/signup_username_ajax.php?username=" + username, true);
        xmlhttp.send();
      }


    function checkEmail()
      {      
          var email = document.getElementById("email").value;
        
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
              {
                  document.getElementById("email_info").innerHTML = xmlhttp.responseText;
                  //disable button if div of id email_info have some error message
                  var isEmptyUsername = document.getElementById("username_info").innerHTML
                  var isEmptyEmail = document.getElementById("email_info").innerHTML
                  var isEmptyContact = document.getElementById("contact_info").innerHTML
                  if((isEmptyUsername === "")&&(isEmptyEmail === "")&&(isEmptyContact === ""))
                  {
                    document.getElementById("button").disabled = false;
                  }
                  else
                  {
                    document.getElementById("button").disabled = true;
                  }
              }
          };
          xmlhttp.open("GET", "../backend/ajax/signup_email_ajax.php?email=" + email, true);
          xmlhttp.send();
           
      }


    function checkContact()
      {
          var contact = document.getElementById("contact").value;
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
              {
                  document.getElementById("contact_info").innerHTML = xmlhttp.responseText;
                  //disable button if div of id contact_info have some error message
                  var isEmptyUsername = document.getElementById("username_info").innerHTML
                  var isEmptyEmail = document.getElementById("email_info").innerHTML
                  var isEmptyContact = document.getElementById("contact_info").innerHTML
                  if((isEmptyUsername === "")&&(isEmptyEmail === "")&&(isEmptyContact === ""))
                  {
                    document.getElementById("button").disabled = false;
                  }
                  else
                  {
                    document.getElementById("button").disabled = true;
                  }
              }
          };
          xmlhttp.open("GET", "../backend/ajax/signup_contact_ajax.php?contact=" + contact, true);
          xmlhttp.send();

      }

  </script>
