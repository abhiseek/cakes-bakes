<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','item','iid='.$_GET['id']);

$elements=array(
        "iid"=>$info[0]['iid'],"i_name"=>$info[0]['i_name'],"i_price"=>$info[0]['i_price'],"cat_id"=>$info[0]['cat_id']);

	$form = new FormAssist($elements,$_POST);

$labels=array('iid'=>"item id","i_name"=>"name","i_price"=>"price","cat_id"=>"category id");

$rules=array(
    "iid"=>array("required"=>true),
    "i_name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "i_price"=>array("required"=>true,"minlength"=>2,"maxlength"=>10,"integeronly"=>true),
 "cat_id"=>array("required"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
$data=array(

        'iid'=>$_POST['iid'],
        'i_name'=>$_POST['i_name'],
          'i_price'=>$_POST['i_price'],
	'cat_id'=>$_POST['cat_id'],
         // 'simage'=>$_POST['simage'],
    );
  $condition='iid='.$_GET['id'];

    if($dao->update($data,'item',$condition))
    {
        $msg="Successfullly Updated";
header('location:view.php');
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
item id:

<?= $form->textBox('iid',array('class'=>'form-control')); ?>
<?= $validator->error('iid'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
item name:

<?= $form->textBox('i_name',array('class'=>'form-control')); ?>
<?= $validator->error('i_name'); ?>

</div>
</div>


<div class="row"> <div class="col-md-6">
item price:

<?= $form->textBox('i_price',array('class'=>'form-control')); ?>
<?= $validator->error('i_price'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
category id:

<?= $form->textBox('cat_id',array('class'=>'form-control')); ?>
<?= $validator->error('cat_id'); ?>

</div>
</div>
<div class="col-md-6">
item image:

<?= $form->fileField('i_img',array('class'=>'form-control')); ?>

</div>
</div>


<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>