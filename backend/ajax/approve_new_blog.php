 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
    </body>
  </html>
        



<?Php 
include("db.php");

$blog_id = $_REQUEST['blog_id'];
$query = "UPDATE blog_master SET blog_is_active='1' WHERE blog_id = '$blog_id'";
$exec = mysqli_query($conn, $query);
// print_r("hello");
// print_r($blog_id);
// printf("%d",$exec);
echo '<h1>Request approved successfully</h1>';
// print_r("Request approved successfully");

?>