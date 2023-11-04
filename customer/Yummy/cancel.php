

<?php	
include("dbcon.php");
$cart_id = $_GET['id'];
echo $cart_id;
$sql = "update cart set status=3 where cart_id=".$cart_id;
$conn->query($sql);
$sql1="DELETE b FROM booking b INNER JOIN cart c ON c.cart_id = b.cart_id WHERE c.status = 3";
$conn->query($sql1);

echo "<script> location.replace('viewcancel.php'); </script>";

?>