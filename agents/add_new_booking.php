<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add New Booking :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
</head>
<body>

<!-- banner -->
<div class="wthree_agile_admin_info">
		<!-- /w3_agileits_top_nav-->
		<!-- /nav-->
		<div class="w3_agileits_top_nav">
			<?php require_once('includes/leftbar.php'); ?>
		</div>
		<!-- //nav -->
			
		<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->
					<div class="inner_content_w3_agile_info">
							<!-- /agile_top_w3_grids-->
					   	<div class="agile_top_w3_grids">
					      <ul class="ca-menu" style="overflow:auto">
									<?php
									$condition = "status=1";
									$sql = "SELECT * FROM `".PREFIX."tours` WHERE $condition ORDER BY tour_count DESC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										$k=0;
											while( $row = $result->fetch_object() ) {
												if($k++%5==0) echo '</ul><ul class="ca-menu" style="overflow:auto">';
									?>
                  <li style="width:19%">
										<a href="add_new_booking_cart.php?id=<?=$row->ID; ?>">
										  <img src="<?=tour_thumb($row->tour_thumb); ?>" alt="<?=$row->tour_thumb; ?>" class="img-res" />
											<div class="ca-content">
												<h4 class="ca-main three" style="text-shadow: 2px 2px 2px #fff;">
                        CA$<?=$row->adults_price; ?>
                        </h4>
												<h3 class="ca-sub three" style="font-size:15px; line-height:1.4em; height:75px;"><?=$row->title."".$row->sub_title; ?></h3>
											</div>
										</a>
									</li>
                  <?php
											}
									}
									?>
                  
                </ul>  
					   	</div>
					 		<!-- //agile_top_w3_grids-->
              
						<!-- //social_media-->
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->

<?php require_once('includes/footer.php'); ?>

</body>
</html>