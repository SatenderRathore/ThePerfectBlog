<?Php 
include("db.php");

$blog_id = $_REQUEST['blog_id'];
$query = "UPDATE blog_master SET blog_is_active='1' WHERE blog_id = '$blog_id'";
$exec = mysqli_query($conn, $query);
// print_r("hello");
// print_r($blog_id);
printf("%d",$exec);
print_r("Request approved successfully");

?>