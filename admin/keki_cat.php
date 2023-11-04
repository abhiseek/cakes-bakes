<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "cat_name"=>"","cat_img"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('cat_name'=>"category name",'cat_img'=>"category image");

$rules=array(
    "cat_name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "cat_img"=>array("filerequired"=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
    if($filename=$file->doUploadRandom($_FILES['cat_img'],array('.jpg','.png','.jpeg ','.gif'),100000,1,'../uploads'))	
    {

$data=array(

       
        'cat_name'=>$_POST['cat_name'],
        'cat_img'=>$filename
        
         
    );

    print_r($data);
  
    if($dao->insert($data,"index_cat"))
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

}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">

<div class="row">
                    <div class="col-md-6">
category name:

<?= $form->textBox('cat_name',array('class'=>'form-control')); ?>
<?= $validator->error('cat_name'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
category image:

<?= $form->fileField('cat_img',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('cat_img'); ?></span>

</div>
</div>

<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>


