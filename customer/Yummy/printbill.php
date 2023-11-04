
<?php  
 //session_start();
include("dbcon.php");
require('../../config/autoload.php');
$dao=new DataAccess();
?>
<?php
$name=$_SESSION['email'] ;

$q1="select * from cart where status=1 and uemail='".$name."'";
$result1 = $conn->query($q1);

if ($result1->num_rows > 0) {

    while($row = $result1->fetch_assoc()) {
		
      $cart_id=$row['cart_id'];
      $amount=$row['total'];
      $a=$row["qty"];
      $b=$row["itid"];
     // $sql12 =" UPDATE item40 SET qty=qty- $a WHERE itid=$b" ;
      //$conn->query($sql12);
}
}
$datenow=new DateTime();
$datenow=$datenow->format('Y-m-d H:i:s');
echo $datenow;
$date=explode(' ',$datenow);
$sql11 =" UPDATE cart SET status=2 WHERE status=1 and uemail='$name'" ;
$sql12="INSERT INTO booking (amount,cart_id,btime) VALUES ('$amount' ,'$cart_id','$datenow');";
if ($conn->query($sql11) === TRUE && $conn->query($sql12) === TRUE) {
	echo "<script> alert('Payment Sucessfully');</script> ";
   
	$sql13 = "SELECT oid FROM booking WHERE cart_id=".$cart_id." ;";
   $result2 = $conn->query($sql13);
   //print_r($result2);
   while($row = $result2->fetch_assoc()) {
      $oid=$row['oid'];
   }
}

    
	 ?>
<div class="row">
 <div class="col-md-12">
 <div class="table-responsive">
                                <table border="1"  id="printTable" style="width:100%" >
                                    <thead>
                          <center> Cakes&Bakes. </center>
                           <center> N.PARAVUR </center>
                            <tr>
                             <th style="text-align:left">BillNo:<?=$oid?></th>
                             
                               <th colspan="2" style="text-align:left"></th>
                              <th style="text-align:left" >Date:<?php echo  date("Y/m/d"); ?></th>
                            </tr>
                           <tr>
                        <th>Item name</th>
                        <th>Quantity</th>
                        
			<th>Rate</th>
<th>Total</th>
</tr>
                      
                                    </thead>
                                    <tbody>
                                   
 <?php


$sql = "SELECT * FROM cart WHERE status=2 and cart_id='$cart_id' and uemail='$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {


 // output data of each row
    while($row = $result->fetch_assoc()) {
		
      echo "<tr> <td> "  . $row["i_name"]. "</td> <td>"  . $row["qty"]. "</td> <td>" . $row["offerprice"]. "</td>  <td>" . $row["total"]. "</td>  </tr>";
	  
	    
}
}


 ?>

 <?php
 $sql123 = "select sum(total) as t from cart where status=2 and cart_id='$cart_id' and  uemail='$name'";
$result123 = $conn->query($sql123);
	   $row = $result123->fetch_assoc();
	   $total=$row["t"];
	    echo "<tr> <td colspan='3'  style='text-align:right'>Total:</td><td> ", $total, "</td></tr>";
	   ?>
       




</table>




     <br /><br />

<input type="button" onclick="printData();" value="PRINT"  />

<a href="home.php">HOME</a>
</div>
</div>
</div>

</form>



<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("oid");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>
