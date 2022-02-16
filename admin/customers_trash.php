<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_POST['cust_order']) && isset($_POST['restore'])) {
	foreach($_POST['cust_order'] as $id) {
		$sql = "UPDATE `".PREFIX."customers` SET `status`=1 WHERE id=".$id.";";
		$conn->query($sql);
	}
	$_SESSION['msg'] = 'Record restored.';
	header('Location: customers_trash.php');
	exit;
}

if(isset($_POST['cust_order']) && isset($_POST['delete'])) {
	foreach($_POST['cust_order'] as $id) {
		$sql = "DELETE FROM `".PREFIX."customers` WHERE id=$id;";
		$conn->query($sql);
		$sql = "DELETE FROM `".PREFIX."customer_detail` WHERE user_id=$id";
		$conn->query($sql);
	}
	$_SESSION['msg'] = 'Record deleted.';
	header('Location: customers_trash.php');
	exit;
}

if(isset($_POST['order'])) {
	foreach($_POST['order'] as $id) {
		$order = "order_$id";
		$order = addslashes($_POST[$order]);
		$sql = "UPDATE `".PREFIX."customers` SET `order`='".$order."' WHERE id=".$id.";";
		$conn->query($sql);
	}
	$_SESSION['msg'] = 'Order updated!';
	header('Location: customers_trash.php');
	exit;
}

if(isset($_GET['id']) && ($_GET['act']=='restore')) {
	$sql = "UPDATE `".PREFIX."customers` SET `status`=1 WHERE id=".$_GET['id'].";";
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been restored!';
		header('Location: customers_trash.php');
		exit;
	}
}

if(isset($_GET['id']) && ($_GET['act']=='remove')) {
	$sql = "DELETE FROM `".PREFIX."customers` WHERE id=".$_GET['id'];
	$conn->query($sql);
	$sql = "DELETE FROM `".PREFIX."customer_detail` WHERE user_id=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been deleted!';
		header('Location: customers_trash.php');
		exit;
	}
}

if(isset($_GET['id']) && ($_GET['act']=='update')) {
	
	$status = $_GET['st'] ? 1 : 0;
	$sql = "UPDATE `".PREFIX."customers` SET status=".$status." WHERE id=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been updated!';
		header('Location: customers_trash.php');
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Trashed Booking :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<style>
.dropbtn { border: none; }
.dropdown { position: relative; display: inline-block; }
.dropdown-content {
    display: none;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
		padding:10px;
		background:#fff;
}
.dropdown-content a {
    text-decoration: none;
    display: block;
		padding:8px;
		margin-bottom:5px;
}
.dropdown:hover .dropdown-content {display: block;}
</style>
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
        
          <!-- breadcrumbs -->
          <div class="w3l_agileits_breadcrumbs">
            <div class="w3l_agileits_breadcrumbs_inner">
              <ul>
                <li><a href="index.php">Dashboard</a><span>«</span></li>
                <li><a href="customers_unconfirm.php">New Booking</a><span>«</span></li>
                <li>List</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Trash Booking</h2>
            <!-- tables -->
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
						?>
            <div class="agile-tables">
              <div class="w3l-table-info agile_info_shadow">
                <form action="" method="post">
                <table id="table"  class="table">
                  <thead>
                  	<tr>
                    	<th colspan="9" style="background:#fff">
                      	<button type="submit" class="btn btn-success" name="restore"  onClick="return confirm('Do you want to RESTORE?')"><i class="fa fa-undo"></i> Restore All</button>
                      	<button type="submit" class="btn btn-danger" name="delete"  onClick="return confirm('Do you want to DELETE?')"><i class="fa fa-trash"></i> Delete All</button>
                        </th>
                    </tr>
                    <tr>
                      <th width="20"><input type="checkbox" class="select-all" style="width:18px; height:18px" /></th>
                      <th>#Order ID</th>
                      <th>Created Date</th>
                      <th>Customer Name</th>
                      <th>Customer Email</th>
                      <th>Coupon</th>
                      <th>Source</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
									$condition = "c.id=cd.user_id AND c.status=3";
									if(!empty($_GET['q'])) {
										$condition = " AND (c.order_id like '%".$_GET['q']."%' OR cd.name like '%".$_GET['q']."%' OR cd.phone like '%".$_GET['q']."%' OR cd.email like '%".$_GET['q']."%')";
									}
									if(!empty($_GET['date'])) {
										$explode = explode(" - ",$_GET['date']);
										$condition = " AND tour_date>'".$explode[0]."' AND  tour_date<='".$explode[1]."'";
									}
									
									$sql = "SELECT c.id, c.status, c.order_id, c.created_date, c.agent_id, c.url_string, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY c.created_date DESC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
											while($row = $result->fetch_object()) {
									?>
                    <tr bgcolor="#d4e8d4">
                    	<td width="20"><input type="checkbox" class="checkbox" name="cust_order[]" style="width:18px; height:18px" value="<?php echo $row->id; ?>" /></td>
                      <td>
												<?php echo $row->order_id; ?>
                      	<input type="hidden" value="<?php echo $row->id; ?>" name="cust[]" />
                      </td>
                      <td><?php echo $row->created_date; ?></td>
                      <td><?php echo $row->name; ?> [<a href="tel:<?php echo $row->phone; ?>"><?php echo $row->phone; ?></a>]</td>
                      <td><a href="<?php echo $row->email; ?>"><?php echo $row->email; ?></a></td>
                      <td><?php echo $row->coupon; ?></td>
                      <td>
                      	<?php //echo $row->url_string; 
												if($row->url_string) { 
													$url_string = json_decode($row->url_string);
													if($url_string->utm_source=='cj')
													echo 'CJ';
													else 
													echo '<a target="_blank" class="badge badge-success" href="agent_detail.php?Id='.$row->agent_id.'">'.$url_string->utm_source.'</a>';
												}
												?>
                      </td>
                      <td><?php echo $row->status==2?'<a class="badge badge-success">Paid</a>':'<a class="badge badge-primary">Balance</a>'; ?></td>
                      <td>
                      	<a href="?id=<?php echo $row->id; ?>&act=restore" class="badge badge-success" onClick="return confirm('Do you want to RESTORE?')"><i class="fa fa-undo"></i> Restore</a>
                        <a href="?id=<?php echo $row->id; ?>&act=remove" class="badge badge-danger" onClick="return confirm('Do you want to DELETE?')"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    
                    <tr><td colspan="9" style="padding: 0px 10px 0px 0px">
                    <table class="table" style="margin:5px 5px 15px;">
                    <thead>
                      <tr>
                      <th width="210" style="background:#c16a6a">Tour Date</th>
                      <th width="210" style="background:#c16a6a">Tour Title</th>
                      <th width="210" style="background:#c16a6a;">Pickup Location</th>
                      <th width="280" style="background:#c16a6a;text-align:right">Tour Detail</th>
                      <th width="280" style="background:#c16a6a;text-align:right">Tour Add Ons</th>
                      <th width="100" style="background:#c16a6a;text-align:right">Sub Total</th>
                      <th width="100" style="text-align:right;background:#c16a6a">Discount</th>
                      <th width="100" style="background:#c16a6a;text-align:right">Tax</th>
                      <th width="100" style="background:#c16a6a;text-align:right">Gratuity</th>
                      <th width="180" style="background:#c16a6a;text-align:right">Convenience fee</th>
                      <th width="100" style="background:#096;text-align:right"><strong>Total</strong></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql3 = "SELECT c.id, c.status, c.order_id, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.price_type FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd, ".PREFIX."tours t WHERE c.id=".$row->id." AND  c.id=cd.user_id AND cd.tour_id=t.ID AND c.status=3 ORDER BY cd.tour_date DESC";
										$result3 = $conn->query($sql3);
											$sum = 0;
											while($row3 = $result3->fetch_object()) {
												$tour_detail = tour_detail($conn, $row3->tour_id);
												$sum+= $row3->total;
										?>
                    <tr>
                      <td><?php echo $row3->tour_date; ?></td>
                      <td><?php echo $tour_detail->title; ?></td>
                      <td><?php echo $row3->pickup_location; ?></td>
                      <td style="text-align:right">
											<?php if($row3->adults && $row3->price_type=='person') { ?>
											<?=$row3->adults; ?> adults X $<?=$row3->adults_price; ?> = $<?=($row3->adults*$row3->adults_price); ?>,<br /> 
                      <?php } else if($row3->adults && $row3->price_type=='group') { ?>
											<?=$row3->adults; ?> adults = $<?=($row3->adults_price); ?>,<br /> 
                      <?php } if($row3->children) { ?>
											<?=$row3->children; ?> children X $<?=$row3->children_price; ?> = $<?=($row3->children*$row3->children_price); ?>, <br /> 
                      <?php } if($row3->seniors) { ?>
											<?=$row3->seniors; ?> seniors X $<?=$row3->seniors_price; ?> = $<?=($row3->seniors*$row3->seniors_price); ?>, <br />
                      <?php } if($row3->infants) { ?>
											<?=$row3->infants; ?> infants X $<?=$row3->infants_price; ?> = $<?=($row3->infants*$row3->infants_price); ?>
                      <?php } ?>
                      </td>
                      <td style="text-align:right">
                      <?php 
											if(!empty($row->add_ons)) {
												$sql2 = "SELECT * FROM `tour_add_ons` WHERE addons_id IN (".$row3->add_ons.")";
												$result2 = $conn->query($sql2);
												if ($result2->num_rows > 0) {
													$k = 0;
													$add_ons_nom = explode(",",$row3->add_ons_nom);
													while($row2 = $result2->fetch_object()) {
														echo $row2->addons_title . " (".$add_ons_nom[$k].") " ." = $". $add_ons_nom[$k++]*$row2->addons_price.',<br>';
													}
												}
											}
											?>
                      </td>
                      <td style="text-align:right">$<?php echo number_format($row3->subtotal,2); ?></td>
                      <td style="text-align:right; color:#f00">$<?php echo number_format($row3->discount,2); ?></td>
                      <td style="text-align:right">$<?php echo number_format($row3->tax,2); ?></td>
                      <td style="text-align:right">$<?php echo number_format($row3->gratuity_amt,2); ?></td>
                      <td style="text-align:right">$<?php echo number_format($row3->convenience_fee,2); ?></td>
                      <th style="background:#096;text-align:right;"><strong>$<?php echo number_format($row3->total,2); ?></strong></th>
                    </tr>
                  <?php
									//$sum+=$row3->total;
									}
									?>
                  	<?php /*?><tr>
                      <td colspan="8" style="text-align:right"><strong>Grand Total</strong></td>
                      <td style="text-align:right"><strong>$<?php echo number_format($sum,2); ?></strong></td>
                    </tr><?php */?>
                  	</tbody>
                		</table>
                    </td>
                    </tr>
                  <?php  
									}
									} else {
											echo "<tr><td colspan='9'>No records found.</td></tr>";
									}
									?>
                  </tbody>
                </table>
                </form>
          		</div>
            </div>
            <!-- //tables -->
				  </div>  
        <!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->

<?php require_once('includes/footer.php'); ?>
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	//$('#table').basictable();
	
	$(".select-all").click(function () {
     $('.checkbox').not(this).prop('checked', this.checked);
	});
});
</script>
</body>
</html>