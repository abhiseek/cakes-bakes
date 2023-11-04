<?php 
require('../config/autoload.php'); ?>
<?php
 include("loginheader.php");	
include("dbcon.php");
?>

<?php
$dao=new DataAccess();
$name=$_SESSION['email'] ;
 if(isset($_POST["payment"]))
{
     echo "hai";
	 echo"<script> location.replace('payment.php'); </script>";
    //  echo"<script> location.replace('invoice.php'); </script>";
}
   if(isset($_POST["purchase"]))
{
     echo"<script> location.replace('displaycategory.php'); </script>";
}
if(!isset($name))
   {
    echo"<script> location.replace('login.php'); </script>";
	   }
	   else
	   { 
	   $sql = "select sum(total)as t from cart where status=1 and  uemail='$name'";
$result = $conn->query($sql);
	   $row = $result->fetch_assoc();
	   $total=$row["t"];
	   $_SESSION['amount']=$total; 
       }
	    ?>
       
           
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> CART DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                       
                        <th>DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    
    
    'delete'=>array('label'=>'Delete','link'=>'delete.php','params'=>array('id'=>'cart_id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('itid','cart_id')
        
        
    );

   $condition="uemail='".$name."' and status=1";
   
   $join=array(
       
    );  
	$fields=array('cart_id','itid','i_name','qty','offerprice','total');

    $users=$dao->selectAsTable($fields,'cart',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


            <div class="row">
 <div class="col-md-3">
TOTAL AMOUNT:
<input type="text" class="form-control" value="<?php echo $total; ?>" readonly name="total"/>

</div>
<form action="" method="POST" enctype="multipart/form-data">

<button class="btn btn-success" type="submit"  name="purchase" >New Item Purchase</button>
<button class="btn btn-success" type="submit" style="margin-right: 2px;"  name="payment" >Payment</button>

</form>
</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
