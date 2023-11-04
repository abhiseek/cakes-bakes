
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
                        
                        <th>category id</th>
                        <th>category name</th>
                        <th>category image</th>
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'edit_cat.php','params'=>array('id'=>'cat_id'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'del_cat.php','params'=>array('id'=>'cat_id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('cat_id'),
        'images'=>array(array('field'=>'cat_img','path'=>'../uploads/','attributes'=>array('height'=>'80')))
        
    );

   
   $join=array(
        
    );
     $fields=array('cat_id','cat_name','cat_img');

    $users=$dao->selectAsTable($fields,'index_cat',"status=1",$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
