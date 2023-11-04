
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="2" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>item id</th>
                        <th>item name</th>
                        <th>item price</th>
                        <th>item image</th>
                        <th>category id</th>
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'edit_item.php','params'=>array('id'=>'iid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'del_item.php','params'=>array('id'=>'iid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('iid'),
        'images'=>array(array('field'=>'i_img','path'=>'../uploads/','attributes'=>array('height'=>'100')))
        
    );

   
   $join=array(
        
    );
     $fields=array('iid','i_name','i_price','cat_id','i_img');

    $users=$dao->selectAsTable($fields,'item',"status=1",$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
