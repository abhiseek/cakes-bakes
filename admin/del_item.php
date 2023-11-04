

<?php	
include("dbcon.php");
$bid = $_GET['id'];
$sql = "update item set status=2 where iid=".$bid;

$conn->query($sql);

 header('location:item_view.php');



?>