<?phprequire('../config/autoload.php');?>
<?php
include("dbcon.php");

$dao = new DataAccess();
$cart_id = $_SESSION['cart_id'];
echo $cart_id;

// Static bill number
$currentBillNo = $cart_id;

?>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table border="1" id="printTable" style="width:100%">
                <thead>
                    <center> Cakes&Bakes </center>
                    <center> N.PARAVUR </center>
                    <tr>
                        <th style="text-align:left">BillNo.<?php echo $currentBillNo; ?></th>
                        <th colspan="2" style="text-align:left"></th>
                        <th style="text-align:left">Date:<?php echo date("Y/m/d"); ?></th>
                    </tr>
                    <tr>
                        <th>Item name</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $name = $_SESSION['email'];

                    $sql = "SELECT * FROM cart WHERE status=1 and uemail='$name'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr> <td> "  . $row["i_name"] . "</td> <td>"  . $row["qty"] . "</td> <td>" . $row["offerprice"] . "</td>  <td>" . $row["total"] . "</td>  </tr>";
                        }
                    }
                    ?>
                    <?php
                    $sql123 = "select sum(total) as t from cart where status=1 and  uemail='$name'";
                    $result123 = $conn->query($sql123);
                    $row = $result123->fetch_assoc();
                    $total = $row["t"];
                    echo "<tr> <td colspan='3'  style='text-align:right'>Total:</td><td> ", $total, "</td></tr>";
                    ?>
                </tbody>
            </table>

            <?php
            // $sql11 = "UPDATE cart SET status=2 WHERE status=1 and uemail='$name'";
            // if ($conn->query($sql11) === TRUE) {
            //     echo "<script> alert('Payment Successfully');</script> ";
            // }

            // Unset the cart_id session variable
            unset($_SESSION['cart_id']);
            ?>
            <br /><br />
            <input type="button" onclick="printData();" value="PRINT" />
            <a href="displaycategory.php">HOME</a>
        </div>
    </div>
</div>
</form>
