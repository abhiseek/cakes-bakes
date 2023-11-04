

<?php	
include("dbcon.php");
$bid = $_GET['id'];
$sql = "update index_cat set status=2 where cat_id=".$bid;

$conn->query($sql);

 header('location:cat_view.php');



?>

