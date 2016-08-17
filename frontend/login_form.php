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
            <form class="col s8" id="login_form" method="post" action="a.php">
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