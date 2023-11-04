<!DOCTYPE html>
<html lang="en">
<?php include('../../config/autoload.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible">
    <title>Document</title>
    <link rel="stylesheet" href="ui.css">
    
    <script>
function showtotal() {
//alert(str);
	  var price=document.getElementById("price").value;  
	   var qty=document.getElementById("qty").value; 
	   var total=price*qty; 
	   //alert(total);
	   document.getElementById("total").value = total;
}
</script>
    
</head>

<body>

<?php //include("loginheader.php");	
include("../../admin/dbcon.php");

?>
<?php    
if(isset($_SESSION['email']))
{ 
	include("loginheader.php");
   $name=$_SESSION['email'];

?>

 <!-- <h7 class="title-w3-agileits title-black-wthree"><?php  echo $name ?></h7> -->

<?php }
else {include("logoutheader.php");}
?>
<?php 


$iid = "";
$iname = "";
$name="";
$dao=new DataAccess();
?>

<?php
if(!isset($name))
{
    echo '<html><div style="text-align: center; font-weight: bold; font-size: 24px;">Kindly log in before adding items to your cart.</div></html>';
}
?>
<?php
if(isset($_POST["btn_insert"]))
{
    if(!isset($_SESSION['email']))
    {
       
        echo"<script> location.replace('login/login.php'); </script>";
   }
   else
   {
$name=$_SESSION['email'];
$iid = $_GET['id'];


$q1="select * from item where iid=".$iid ;

$info1=$dao->query($q1);
$iname=$info1[0]["i_name"];
$itemname = $iname;
$user_id=$_SESSION["user_id"];
$price = $_POST["offerprice"];
$qty = $_POST["qty"];
//echo $qty;
$total = $_POST["total"];
$status=1;
$date1= $_POST["todate"];
$caption=$_POST["caption"];

// $date1=date('Y-m-d',time());
$sql = "INSERT INTO cart(user_id,uemail,itid,i_name,offerprice,qty,total,status,odate,caption) VALUES ('$user_id','$name','$iid' ,'$itemname','$price ','$qty','$total','$status','$date1','$caption')";
}
if($conn->query($sql))
{
 echo"<script>location.replace('viewcart.php');</script>";
}

}
?>


<?php
$dao=new DataAccess();
?>

<?php	$iid=$_GET['id']; 



			 $q="select * from item where iid=".$iid ;

$info=$dao->query($q);
$iname=$info[0]["i_name"];
?>
 
   

<form action="" method="POST" enctype="multipart/form-data">

 <div class="upper">
        <div class="upper-left">
<?php 
if(isset($_SESSION['email']))
{ 
   $name=$_SESSION['email'];
?>

 <h7 class="title-w3-agileits title-black-wthree"><?php  echo $name ?></h7>

<?php }?>
            <h3>Product Details</h3>
            <img style="width:500; height:500" src=<?php echo BASE_URL."uploads/".$info[0]["i_img"]; ?> alt=" " class="img-responsive" />
        </div>
        <div class="content">
            <h3>Details</h3>
            <div style="display: block;">
                <label for="name">Item Name:</label><br>
                
                <label for="name"><?php echo $info[0]["i_name"]; ?></label><br>
                 <label for="price">Price:</label><br>
                <input id="price" name="offerprice" type="text" value="<?php echo $info[0]["i_price"];  ?>" readonly style="margin-top: 8px;"><br>
                <label for="qty">Quantity:</label><br>
                <label >weight is measured in grams below 1kg <br> like 250g as .250</label><br>
                <!-- <input id="qty" name="qty" type="number" onkeyup="showtotal()" style="margin-top: 8px;"><br> -->
                <input id="qty" name="qty" type="number" step="any" list="valid-values" onkeyup="showtotal()" style="margin-top: 8px;" required><br>
<datalist id="valid-values">
    <option value=".100">
    <option value=".150">
    <option value=".200">
    <option value=".250">
    <option value=".500">
    <option value=".750">
</datalist>

                <!-- <input id="qty" name="qty" type="number" onkeyup="showtotal()" step="0.001" min="0.100" value="0.100" style="margin-top: 8px;"><br> -->
                <label for="Total">Total</label><br>
                <input id="total" name="total" type="text" readonly style="margin-top: 8px;"><br>
                <input id="todate" name="todate" type="date" min="<?php echo date('Y-m-d', strtotime('+1 day'));?>" style="margin-top: 8px;" required><br>
                <label for="caption">Note/Message (optional)</label><br>
                     <textarea id="caption" name="caption" placeholder=" max 22 characters" maxlength="22" ></textarea><br><br>
                <!DOCTYPE html>
<!-- <html>
<head>
    <title>Time Selection</title>
</head>
<body>
    <label for="totime">Select a time at least 4 hours from now:</label>
    <input id="totime" name="totime" type="time" style="margin-top: 8px;">
    
    <script>
        // Get the current time
        var currentTime = new DateTime();
        currentTime.setHours(currentTime.getHours() + 4); // Add 4 hours to the current time

        var timeInput = document.getElementById("totime");
        var minTime = currentTime.toISOString().substring(11, 16); // Extract the time part in 'hh:mm' format

        timeInput.setAttribute("min", minTime);
    </script>
</body>
</html> -->
                
        </div>
    </div>
    <div class="lower">
        <div class="btn-grp">
                <button class="buttons" name="btn_insert" type="submit" value="item" id="btn-1">Add Cart</button>
                <!-- <button class="buttons" id="btn-2">test2</button>
                <button class="buttons" id="btn-3">test3</button>        
        </div> -->
    </div>
    </form>
</body>
</html>

<?php include("footer.html");	?>