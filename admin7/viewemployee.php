
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
                        
                        <th>Id</th>
                        <th>employee name</th>
                        <th>Age</th>
                        <th>PHONE</th>
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editspecilization.php','params'=>array('id'=>'eid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'editspecilization.php','params'=>array('id'=>'eid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('eid'),
        
        
    );

   
   $join=array(
        
    );
     $fields=array('eid','ename','eage','ephone');

    $users=$dao->selectAsTable($fields,'employee',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
