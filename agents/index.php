<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
$agent_id = $_SESSION['user_id'];


$condition = "c.id=cd.user_id AND c.status=2 AND c.agent_id=".$agent_id;
$sql = "SELECT c.id, c.status, c.order_id, c.agent_id, c.created_date, c.url_string, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition ORDER BY c.created_date DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	//$total_salse = $result->num_rows;
	$total_salse = $paid = $unpaid = $paid_t = $unpaid_t = 0;
	while($row = $result->fetch_object()) {
		$get_value = check_if_paid($conn, $row->id, $row->tour_id, $row->agent_id );
		$discount = ($row->total*$user->discount)/100;
		if($get_value=='<a class="badge badge-success">Paid<a>') {
			$paid+= $discount;
			$paid_t++;
		}
		else {
			$unpaid+= $discount;
			$unpaid_t++;
		}
		$total_salse+= $discount;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard :: <?php echo SITENAME; ?></title>
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
              
              	<table id="table"  class="table">
                  <thead>
                  	<tr>
                    	<th style="background:#fff"><a href="add_new_booking.php" class="btn btn-success">Create Bookings</a></th>
                      <th style="background:#fff"><div class="text-right">
                <span>Paid Tours: <strong><?php echo $paid_t; ?></strong></span> &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Unpaid Tours: <strong><?php echo $unpaid_t; ?></strong></span> &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Total Sales: <strong>$<?php echo number_format($total_salse,2); ?></strong></span> &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Commission Paid: <strong>$<?php echo number_format($paid,2); ?></strong></span> &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Unpaid Commission: <strong>$<?php echo number_format($unpaid,2); ?></strong></span>
                </div></th>
                    </tr>
                 </thead>
                 </table>   
              
              
					      <ul class="ca-menu" style="overflow:auto">
									<li>
										<a href="customers_abandone.php">
										  <i class="fa fa-cog" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main one">
                        <?php
												$condition = "c.id=cd.user_id AND c.status=0 AND c.agent_id=$agent_id";
												$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY cd.tour_date ASC";
												$result = $conn->query($sql);
												echo $result->num_rows;
												?>
                        </h4>
												<h3 class="ca-sub five">Abandon Bookings</h3>
											</div>
										</a>
									</li>
                  
                  <li>
										<a href="customers_unconfirm.php">
										  <i class="fa fa-users" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main one">
                        <?php
												$condition = "c.id=cd.user_id AND c.status=1 AND c.agent_id=$agent_id";
												$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY cd.tour_date ASC";
												$result = $conn->query($sql);
												echo $result->num_rows;
												?>
                        </h4>
												<h3 class="ca-sub one">New Bookings</h3>
											</div>
										</a>
									</li>
                  
									<li>
										<a href="customers_confirm.php">
										  <i class="fa fa-check" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main two">
                        <?php
												$condition = "c.id=cd.user_id AND c.status=2 AND cd.tour_date>='".date('Y-m-d')."' AND c.agent_id=$agent_id";
												$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY cd.tour_date ASC";
												$result = $conn->query($sql);
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub two">Confirmed Bookings</h3>
											</div>
										</a>
									</li>
                  
                  <li>
										<a href="customers_completed.php">
										  <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main three">
                        <?php
												$condition = "c.id=cd.user_id AND c.status=4 AND c.agent_id=$agent_id";
												$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY cd.tour_date ASC";
												$result = $conn->query($sql);
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub three">Completed Bookings</h3>
											</div>
										</a>
									</li>

                  <li>
										<a href="customers_trash.php">
											<i class="fa fa-trash" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main two">
                        <?php
												$condition = "c.id=cd.user_id AND c.status=3 AND c.agent_id=".$_SESSION['user_id'];
												$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY cd.tour_date ASC";
												$result = $conn->query($sql);
												//$result = tour_list($conn, "customers", "status=3");
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub four">Trash Bookings</h3>
											</div>
										</a>
									</li>
                  
                </ul>  
                
                <?php /*?><br>
                <div>
              	<a href="add_new_booking.php">
                  <div class="ca-content">
                    <h3 class="ca-sub three">Create Bookings</h3>
                  </div>
                </a>
                </div><?php */?>
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