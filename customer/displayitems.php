
<?php require('../config/autoload.php'); ?>
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
$dao=new DataAccess();
?>
	
	<div class="plans-section" id="rooms">
				 <div class="container">
<?php				 
if(isset($_SESSION['email']))
{ 
   $name=$_SESSION['email'];
?>

 <!-- <h7 class="title-w3-agileits title-black-wthree"><?php  echo $name ?></h7> -->

<?php } ?>
<h3 class="title-w3-agileits title-black-wthree" data-aos="fade-up">ITEMS</h3>
						<div class="priceing-table-main">
            <?php
			$cat_id=$_GET['id']; 
			 $q="select * from item where cat_id=".$cat_id ;

$info=$dao->query($q);

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i]["i_img"];
		?>		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img style="width:300; height:300" src=<?php echo BASE_URL."uploads/".$info[$i]["i_img"]; ?> alt=" " class="img-responsive" />
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><?php echo $info[$i]["i_name"]?></h4> 
                              
                             
						</div>
                        <h4>OFFER PRICE</h4>
                              <h4> <?php echo $info[$i]["i_price"]?></h4>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>

								     </ul>
							</div>
							<div class="price-selet">
                            
			<a href="singleitem.php?id=<?= $info[$i]["iid"]?>" >BOOK NOW</a>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$i++;
				} ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	
		<?php include("footer.html");	?>
	