<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','index_cat','cat_id='.$_GET['id']);

$elements=array(
        "cat_id"=>$info[0]['cat_id'],"cat_name"=>$info[0]['cat_name'],"cat_img"=>$info[0]['cat_img']);

	$form = new FormAssist($elements,$_POST);

$labels=array('cat_id'=>"category id","cat_name"=>"category name","cat_img"=>"category image");

$rules=array(
    "cat_id"=>array("required"=>true),
    "cat_name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "cat_img"=>array("required"=>true,"minlength"=>2,"maxlength"=>100,"integeronly"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
$data=array(

        'cat_id'=>$_POST['cat_id'],
        'cat_name'=>$_POST['cat_name'],
          'cat_img'=>$_POST['cat_img']
          ,//'simage'=>$_POST['simage'],
    );
  $condition='cat_id='.$_GET['id'];

    if($dao->update($data,'index_cat',$condition))
    {
        $msg="Successfullly Updated";
header('location:cat_view.php');
    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}


}


	
	
	
	
?>

<html>
<head>
	<style>
		.form{
		border:3px solid blue;
		}
	</style>
</head>
<body>


	<form action="" method="POST" >
 
<div class="row">
                    <div class="col-md-6">
category id:

<?= $form->textBox('cat_id',array('class'=>'form-control')); ?>
<?= $validator->error('cat_id'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
category name:

<?= $form->textBox('cat_name',array('class'=>'form-control')); ?>
<?= $validator->error('cat_name'); ?>

</div>
</div>


<div class="row"> <div class="col-md-6">
category image:

<?= $form->textBox('cat_img',array('class'=>'form-control')); ?>
<?= $validator->error('cat_img'); ?>

</div>
</div>






<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>