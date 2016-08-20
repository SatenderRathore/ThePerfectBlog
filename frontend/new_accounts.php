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
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
    </body>
  </html>
        


<?php 
include("db.php");

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