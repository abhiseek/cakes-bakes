
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
//$name=$_SESSION['email'] ;

?>
<!-- <?php include('header.php'); ?> -->

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        <h1><center> BOOKING VIEW</center></h1>
                        
                        <th>serial no</th>
                        <th>cart id</th>
                        <th>order id</th>
                        <th>user email</th>
                        <th>item id</th>
                        <th>item name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>totalprice</th>
                        <th>caption</th>
                        <th>bookingdate</th>
                        <th>orderdate</th>
                        <!-- <th>order confirm</th> -->
                        
                        
                      
                        

                    </tr>
<?php
    
    $actions=array(
       // 'edit'=>array('label'=>'booking','link'=>'booking.php','params'=>array('id'=>'cart_id'),'attributes'=>array('class'=>'btn btn-success')),
    );

    $config=array(
        'srno'=>true,
        //'hiddenfields'=>array('cart_id'),

    );

    //$condition="uemail='".$name."' and status=2 ";
    $condition=" status=2 ";
    $join=array(
        'booking as b'=>array('b.cart_id=c.cart_id','join'),
    ); 
     $fields=array('c.cart_id','b.oid','c.uemail','c.itid','c.i_name','c.offerprice','c.qty','c.total','c.caption','b.btime','c.odate');

    $users=$dao->selectAsTable($fields,'cart as c',$condition,$join,$actions,$config);
    echo $users;
                    
                    

    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
