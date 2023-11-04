<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "cus_name"=>"","cus_num"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('cus_name'=>"name",'cus_num'=>"phone number");

$rules=array(
    "cus_name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "cus_num"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

       
        'cus_name'=>$_POST['cus_name'],
        'cus_num'=>$_POST['cus_num']

        
         
    );

    print_r($data);
  
    if($dao->insert($data,"cus_reg"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
    else
        {$msg="Registration failed";} ?>



<?php
    
}
else
echo $file->errors();
}




?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">

<div class="row">
                    <div class="col-md-6">
name:

<?= $form->textBox('cus_name',array('class'=>'form-control')); ?>
<?= $validator->error('cus_name'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
phone number:

<?= $form->textBox('cus_num',array('class'=>'form-control')); ?>
<?= $validator->error('cus_num'); ?>

</div>
</div>

<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>


