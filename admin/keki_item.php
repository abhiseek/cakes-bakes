<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
    "i_name"=>"","i_price"=>"","cat_id"=>"","i_img"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('i_name'=>"product name",'i_price'=>"price ",'i_img'=>"item image");

$rules=array(
    "i_name"=>array("required"=>true,"minlength"=>1,"maxlength"=>30,"alphaspaceonly"=>true),
    "i_price"=>array("required"=>true,"minlength"=>1,"maxlength"=>10,"integeronly"=>true),
    "cat_id"=>array("required"=>true),
    "i_img"=>array("filerequired"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
    if($filename=$file->doUploadRandom($_FILES['i_img'],array('.jpg','.png','.jpeg ','.gif'),10000000,1,'../uploads'))	
    {

$data=array(

       
        'i_name'=>$_POST['i_name'],
        'i_price'=>$_POST['i_price'],
        'cat_id'=>$_POST['cat_id'],
        'i_img'=>$filename

        

    );

    //print_r($data);
  
    if($dao->insert($data,"item"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
    else
        {$msg="Registration failed";} ?>

<!-- <span style="color:red;"><?php echo $msg; ?></span> -->

<?php
    
}
else
echo $file->errors();
}
}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">

<div class="row">
                    <div class="col-md-6">
item name:

<?= $form->textBox('i_name',array('class'=>'form-control')); ?>
<?= $validator->error('i_name'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
item price:

<?= $form->textBox('i_price',array('class'=>'form-control')); ?>
<?= $validator->error('i_price'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Category:

<?php
     $options = $dao->createOptions('cat_name','cat_id',"index_cat");
     echo $form->dropDownList('cat_id',array('class'=>'form-control'),$options); ?>
<?= $validator->error('cat_id'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
item image:

<?= $form->fileField('i_img',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('i_img'); ?></span>

</div>
</div>

<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>


