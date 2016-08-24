<?php 
include("db.php");

session_start();
if(!isset($_SESSION['email']))
{
  header("Location:signup_form.php");
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



<?php 

$query = "SELECT * FROM blogger_details WHERE active_account = '0'";
$exec = mysqli_query($conn,$query);
// session_start();
while($row = mysqli_fetch_row(($exec)))
{
  
    // print_r($row);
  $id = $row[0];
  echo '<div id=' . $id . ' >';
  echo '<h1>hello </h1>';
  print_r($row[0] . ", ");
  print_r($row[1] . ", ");
  print_r($row[2] . ", ");
  print_r($row[3] . ", ");
  print_r($row[6] . ", ");

  // $_SESSION['blogger_id'] = $id;
  //echo '<a href = "../backend/bloggers/approve_new_blogger.php">approve request</a>';
      echo '<a onclick="approveRequest('.$id.')" href="javascript:void(0);">approve </a>';  

echo '</div>';
echo '<div id="a"></div>';  
}


?>
<?php

$query = "SELECT * FROM blogger_details WHERE active_account = '0'";
$exec = mysqli_query($conn,$query);
// session_start();



      echo'<div class="container">';
        echo'<table class="responsive-table highlight" style="margin-top:30px;">';
          echo'<thead>';
            echo'<tr>';
                echo'<th data-field="id">Blogger Id</th>';
                echo'<th data-field="name">User Name</th>';
                echo'<th data-field="email">E-mail</th>';
                echo'<th data-field="contact">Contact</th>';
                echo'<th data-field="date">Date</th>';
                echo'<th data-field="access"><center>Access</center></th>';

            echo'</tr>';
          echo'</thead>';
          echo'<tbody>';

while($row = mysqli_fetch_row(($exec)))
{
  $blogger_id = $row[0];
  $username = $row[1];
  $email = $row[2];
  $contact = $row[3];
  $creation_date = $row[6];
  $updation_date = $row[7];
  
          
            echo'<tr>';
              echo'<td>'.$blogger_id.'</td>';
              echo'<td>'.$username.'</td>';
              echo'<td>'.$email.'</td>';
              echo'<td>'.$contact.'</td>';
              echo'<td>'.$updation_date.'</td>';
              echo'<td><a href="#" class="btn-floating btn-medium waves-effect waves-light green"><i class="material-icons">done</i></a></td>';
              echo'<td><a href="#" class="btn-floating btn-medium waves-effect waves-light red"><i class="material-icons">delete</i></a></td>';
                          
            echo'</tr>';
 }              
          echo'</tbody>';
        echo'</table>';

      echo'</div>';

      ?>
      
    </body>
    <script src="../materialize/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){
        $(".button-collapse").sideNav();        
      });

      
    </script>
  </html>
        



<script type="text/javascript">
	function approveRequest(id)
	{
		// var username = document.getElementById("username").value;
    
    	var xmlhttp = new XMLHttpRequest();
   		xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById(id).innerHTML = xmlhttp.responseText;
            //stop time 
            //then display none in div in id
            // document.getElementById(id).innerHTML = "";
            
        }
    };
    xmlhttp.open("GET","../backend/ajax/approve_new_blogger.php?blogger_id=" + id, true);
    xmlhttp.send();
	}
</script>