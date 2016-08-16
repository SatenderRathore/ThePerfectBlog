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
    <form class="col s8" method="post" action="../backend/signup.php">
      <div class="row">
        <div class="input-field col s4">
        <i class="material-icons prefix">account_circle</i>
          <input id="username" type="text" name="username" class="validate" onchange="checkUsername()" required>
          <label for="Username">Username</label>
        </div>
        <!-- will unable if username is already exists -->
      <div id="username_info"></div>
      </div>
      
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
          <i class="material-icons prefix">phone</i>
          <input id="contact" type="tel" name="contact" class="validate" onchange="checkContact()" pattern="[789][0-9]{9}" maxlength="10" title="Please enter valid contact number"   required>
          <label for="icon_telephone">Telephone</label>
        </div>
      </div>

      <!-- will unable if contact is already registered -->
      <div id="contact_info"></div>

      
      <div class="row">
        <div class="input-field col s4">
        <i class="material-icons prefix">security</i>
          <input id="password" type="password" name="password" class="validate" pattern=".{6,}" title="password length should be greater than 6" required>
          <label for="password">Password</label>
        </div>
      </div>
      <button id="button" class="btn waves-effect waves-light" type="submit" name="submit" >Submit
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
        