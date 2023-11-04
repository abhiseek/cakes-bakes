<?php require('../../config/autoload.php'); ?>
<?php include("loginheader.php");	

include("dbcon.php");
?>

<?php
$dao=new DataAccess();
   $name=$_SESSION['email'] ;

   if(isset($_POST["purchase"]))
{
     header('location:home.php');
}
if(!isset($_SESSION['email']))
   {
	   header('location:login.php');
	   }
	   else
	   { 
	 
	   
	    ?>
       
       
       
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> ORDER DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Total</th>
                     
                       
                       
                     
                      
                    </tr>
<?php
     $action=array(
    
    
        
        
        );
   

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('itid','cart_id')
        
        
    );

   $condition="uemail='".$name."' and status=2 ";
   
   $join=array(
       
    );  
	$fields=array('cart_id','itid','i_name','qty','total');

    $users=$dao->selectAsTable($fields,'cart',$condition,$join,$action,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


        
<form action="" method="POST" enctype="multipart/form-data">

<button class="btn btn-success" type="submit"  name="purchase" >Home</button>

<a href='displaycategory.php'>GO </a>
</form>
</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

<?php } ?>