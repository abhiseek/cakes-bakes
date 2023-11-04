



<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php /*?><?php

    $q="select * from category";

$info=$dao->query($q);

print_r($info);

 echo "<br/>";

$arrlength = count($info);
echo $arrlength;
 echo "<br/>";


$i=0;

while($i<count($info))
{
echo $info[$i]["sid"];
echo"   ";
echo $info[$i]["sname"];

echo "<br/>";
$i++;
}

foreach($info as $key=>$value)
{
    foreach($value as $key1=>$in)
    {
        echo $key1." --> ".$in;
    }
    echo "<br/>";
}

<a href="<?= BASE_URL ?>student/course.php?id=<?= $val['c_id'] ?>" class="button_outline">Details</a>

?>

<?php */?>

	<div class="container">
	

	
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
				 <h3 class="title-w3-agileits title-black-wthree" data-aos="fade-up">CATEGORY</h3>
						<div class="priceing-table-main">
            <?php
			
			 $q="select * from index_cat";

$info=$dao->query($q);
//print_r($info);

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i]["cat_img"];
	
		?>		 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img style="width:300; height:300" src=<?php echo BASE_URL."uploads/".$info[$i]["cat_img"]; ?> alt=" " class="img-responsive" />
							<?php /*?> <h4>Deluxe Room</h4><?php */?>
                              <h4><?php echo $info[$i]["cat_name"]?></h4> 
							
                             
						</div>
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
                            
			<a href="displayitems.php?id=<?= $info[$i]["cat_id"]?>" >VIEW</a>
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
	