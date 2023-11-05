<?php 
require('../config/autoload.php'); ?>
<?php
 include("loginheader.php");	
include("dbcon.php");
?>

<?php
$dao=new DataAccess();
$name=$_SESSION['email'] ;
 if(isset($_POST["payment"]))
{
     echo "hai";
	 echo"<script> location.replace('payment.php'); </script>";
}
   if(isset($_POST["purchase"]))
{
     echo"<script> location.replace('displaycategory.php'); </script>";
}
if(!isset($name))
   {
    echo"<script> location.replace('login.php'); </script>";
	   }
	   else
	   { 
	   $sql = "select sum(total)as t from cart where status=1 and  uemail='$name'";
$result = $conn->query($sql);
	   $row = $result->fetch_assoc();
	   $total=$row["t"];
	   $_SESSION['amount']=$total; 
       }
	    ?>
       
           
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> CART DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                       
                        <th>DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    
    
    'delete'=>array('label'=>'Delete','link'=>'delete.php','params'=>array('id'=>'cart_id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('itid','cart_id')
        
        
    );

   $condition="uemail='".$name."' and status=1";
   
   $join=array(
       
    );  
	$fields=array('cart_id','itid','i_name','qty','offerprice','total');

    $users=$dao->selectAsTable($fields,'cart',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


            <div class="row">
 <div class="col-md-3">
TOTAL AMOUNT:
<input type="text" class="form-control" value="<?php echo $total; ?>" readonly name="total"/>

</div>
<form action="" method="POST" enctype="multipart/form-data">

<button class="btn btn-success" type="submit"  name="purchase" >New Item Purchase</button>
<button class="btn btn-success" type="submit" style="margin-right: 2px;"  name="payment" >Payment</button>

</form>
</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
<!-- 
<form method="POST">
    <button name="pay" class="clicky-button" id="myButton" <?=$msg1?>>PAY 0</button>
    <input type="hidden" id="totalAmountInput" name="totalAmount" value="0">
    <input type="hidden" name="arrayData" id="arrayData">
</form>

<script>
    var mainCheckbox = document.querySelector('.js-check-all');
    var checkboxes = document.querySelectorAll('.js-check-row');

    mainCheckbox.addEventListener('change', function () {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = mainCheckbox.checked;
        });
        calculateTotal();
    });

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            mainCheckbox.checked = [...checkboxes].every(function (checkbox) {
                return checkbox.checked;
            });
            calculateTotal();
        });
    });

    function calculateTotal() {
        var totalAmount = 0;
        var data=[];
        
        
        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                var amount = parseFloat(checkbox.getAttribute('data-amount'));
                totalAmount += amount;
                var pid = parseFloat(checkbox.getAttribute('data-pid'));
                var set1 = [pid,amount];
                data.push(set1);
                console.log(data);
                var arrayJSON = JSON.stringify(data);
                document.getElementById('arrayData').value =arrayJSON;



            }
        });

        // Update the Total Amount on the button
        updateButton(totalAmount);

        // Update the hidden input field with the total amount
        document.getElementById('totalAmountInput').value = totalAmount;
    }

    function updateButton(totalAmount) {
        var displayTotalButton = document.getElementById('myButton');
        if (totalAmount > 0) {
            displayTotalButton.textContent = 'PAY ₹' + totalAmount;
            displayTotalButton.removeAttribute('disabled');
        } else {
            displayTotalButton.textContent = 'PAY ₹0';
            displayTotalButton.setAttribute('disabled', 'disabled');
        }
    }

    // Calculate the initial total when the page loads
    calculateTotal();
</script>

<?php
// if (isset($_POST['pay'])) {
    
    
//     $arrayJSON =$_POST['arrayData'];
//     $arrayToStore = json_decode($arrayJSON, true);
//     $_SESSION['myArray'] = serialize($arrayToStore);
//    echo "<script> location.replace('../pay/pay.php'); </script>";
// }
?>
    -->