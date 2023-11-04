<?php	
include("dbcon.php");
$bid = $_GET['id'];
echo $bid;
$sql = "delete from cart where cart_id=".$bid;

$conn->query($sql);

  header('location:viewcart.php');

?>
