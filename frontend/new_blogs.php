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

$query = "SELECT * FROM blog_master WHERE blog_is_active = '0'";
$exec = mysqli_query($conn,$query);

while($row = mysqli_fetch_row(($exec)))
{

	$blog_id = $row[0];
	echo '<div id=' . $blog_id . '>';
	echo '<h1>hello</h1>';
	// print_r($row);
	print_r($row[0] . ", ");
	print_r($row[1] . ", ");
	print_r($row[2] . ", ");
	print_r($row[3] . ", ");
	print_r($row[4] . ", ");
	print_r($row[5] . ", ");
	print_r($row[6] . ", ");
	print_r($row[7] . ", ");
	print_r($row[8] . ", ");

	
	echo '<a onclick="approveBlog('.$blog_id.')" href="javascript:void(0);">approve blog </a>';
	echo '</div>';

	echo '<div id="a"></div>';
}


?>

<script type="text/javascript">
	function approveBlog(blogId)
	{
		// alert(blogId);
		var xmlhttp = new XMLHttpRequest();
   		xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById(blogId).innerHTML = xmlhttp.responseText;
            //stop time 
            //then display none in div in id
            // document.getElementById(blogId).innerHTML = "";
            
        }
    };
    	xmlhttp.open("GET","../backend/ajax/approve_new_blog.php?blog_id=" + blogId, true);
    	xmlhttp.send();
	}
</script>