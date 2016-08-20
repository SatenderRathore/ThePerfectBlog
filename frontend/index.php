<?php 

include("db.php");
$query = "SELECT * FROM blog_master ORDER BY updation_date DESC";
$exec = mysqli_query($conn, $query);

while($row = mysqli_fetch_row($exec))
{
	print_r($row[0] . ", ");
	print_r($row[1] . ", ");
	print_r($row[2] . ", ");
	print_r($row[3] . ", ");
	print_r($row[4] . ", ");
	print_r($row[5] . ", ");
	print_r($row[6] . ", ");
	print_r($row[7] . ", ");
	print_r($row[8] . ", ");
	// 
	

}


?>