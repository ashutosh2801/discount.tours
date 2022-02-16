<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_POST['order'])) {
	foreach($_POST['order'] as $id) {
		$order = "order_$id";
		$order = addslashes($_POST[$order]);
		$sql = "UPDATE `".PREFIX."customers` SET `order`='".$order."' WHERE id=".$id.";";
		$conn->query($sql);
	}
	$_SESSION['msg'] = 'Order updated!';
	header('Location: customers_confirm.php');
	exit;
}

if(isset($_GET['id']) && ($_GET['act']=='remove')) {
	$sql = "DELETE FROM `".PREFIX."customers` WHERE id=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been deleted!';
		header('Location: customers_confirm.php');
		exit;
	}
}

if(isset($_GET['id']) && ($_GET['act']=='update')) {
	
	$status = $_GET['st'] ? 1 : 0;
	$sql = "UPDATE `".PREFIX."customers` SET status=".$status." WHERE id=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been updated!';
		header('Location: customers_confirm.php');
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Tours :: <?php echo SITENAME; ?></title>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                <li><a href="customers_confirm.php">Confirmed Bookings</a><span>«</span></li>
                <li>List</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Confirmed Bookings</h2>
            <!-- tables -->
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
						?>
            <div class="agile-tables">
              <div class="w3l-table-info agile_info_shadow">
                <form action="" method="get" autocomplete="off">
                <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                  <input type="text" name="q" placeholder="e.g. Name, phone, email, order id etc" autocomplete="off" value="<?php echo isset($_GET['q'])?$_GET['q']:''?>" />
                  </div>
                  <div class="col-md-3">
                  <input type="text" name="date" id="dates" placeholder="Date range" autocomplete="off" value="<?php echo isset($_GET['date'])?$_GET['date']:''?>" />
                  </div>
                  <div class="col-md-3">
                  		<div style="margin-top:8px;">
                  			<button type="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-search" aria-hidden="true"></i> Search </button>
                  		</div>
                  </div>
                </div>
                </div>
                </form>
                <table id="table">
                  <thead>
                    <tr>
                    <th style="text-align:center">#</th>
                    <th>Tour Date</th>
                    <th>Tour Title</th>
                    <th>Customer Name & Email</th>
                    <th width="210">Tour Detail</th>
                    <th width="210">Tour Add Ons</th>
                    <th width="100">Sub Total</th>
                    <th>Tax</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
									$condition = "c.id=cd.user_id AND c.status=2";
									if(!empty($_GET['q'])) {
										$condition = " AND (c.order_id like '%".$_GET['q']."%' OR cd.name like '%".$_GET['q']."%' OR cd.phone like '%".$_GET['q']."%' OR cd.email like '%".$_GET['q']."%')";
									}
									if(!empty($_GET['date'])) {
										$explode = explode(" - ",$_GET['date']);
										$condition = " AND tour_date>'".$explode[0]."' AND  tour_date<='".$explode[1]."'";
									}
									
									$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `tour_customers` c, `tour_customer_detail` cd WHERE $condition ORDER BY cd.tour_date DESC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
											while($row = $result->fetch_object()) {
												$tour_detail = tour_detail($conn, $row->tour_id);
									?>
                    <tr>
                      <td>
												<?php echo $row->id; ?>
                      	<input type="hidden" value="<?php echo $row->id; ?>" name="cust[]" />
                      </td>
                      <td><?php echo $row->tour_date; ?></td>
                      <td><?php echo $tour_detail->title; ?></td>
                      <td><?php echo $row->name; ?> [<a href="tel:<?php echo $row->phone; ?>"><?php echo $row->phone; ?></a>] <br><a href="<?php echo $row->email; ?>"><?php echo $row->email; ?></a></td>
                      <td>
											<?php if($row->adults) { ?>
											<?=$row->adults; ?> adults X $<?=$row->adults_price; ?> = $<?=($row->adults*$row->adults_price); ?>,<br /> 
                      <?php } if($row->children) { ?>
											<?=$row->children; ?> children X $<?=$row->children_price; ?> = $<?=($row->children*$row->children_price); ?>, <br /> 
                      <?php } if($row->seniors) { ?>
											<?=$row->seniors; ?> seniors X $<?=$row->seniors_price; ?> = $<?=($row->seniors*$row->seniors_price); ?>, <br />
                      <?php } if($row->infants) { ?>
											<?=$row->infants; ?> infants X $<?=$row->infants_price; ?> = $<?=($row->infants*$row->infants_price); ?>
                      <?php } ?>
                      </td>
                      <td>
                      <?php 
											if(!empty($row->add_ons)) {
												$sql2 = "SELECT * FROM `tour_add_ons` WHERE addons_id IN (".$row->add_ons.")";
												$result2 = $conn->query($sql2);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_object()) {
														echo $row2->addons_title ." = ". $row2->addons_price.',<br>';
													}
												}
											}
											?>
                      </td>
                      <td>$<?php echo $row->subtotal; ?></td>
                      <td>$<?php echo $row->tax; ?></td>
                      <td>$<?php echo $row->total; ?></td>
                      <td><?php echo $row->status?'<a class="badge badge-success">$ Paid</a>':'<a class="badge badge-warning">$ Balance</a>'; ?></td>
                      <td>
                      	<a href="decline.php?orderId=<?php echo $row->order_id; ?>" class="badge badge-danger" onClick="return confirm('Do you want to REFUND payment?')"><i class="fa fa-close"></i> Refund</a>
                        <?php /*?><a href="customers_confirm_view.php?id=<?php echo $row->id; ?>" class="badge badge-primary"><i class="fa fa-eye"></i> View</a>
												<a href="customers_confirm.php?id=<?php echo $row->id; ?>&act=remove" class="badge badge-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i> Delete</a><?php */?>
                      </td>
                    </tr>
                  <?php
                  		}
									} else {
											echo "<tr><td colspan='10'>No records found.</td></tr>";
									}
									?>
                  </tbody>
                </table>
                
                <?php /*?><br>
                <div class="form-group">
                  <button type="submit" name="update" class="btn btn-success btn-flat btn-pri"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update </button>
                </div><?php */?>
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
	$('#table').basictable();
	$('#dates').daterangepicker({
		locale: {
      format: 'YYYY-MM-DD'
    },
		ranges: {
			 'Today': [moment(), moment()],
			 'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			 'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			 'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			 'This Month': [moment().startOf('month'), moment().endOf('month')],
			 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		}
	});
});
</script>
</body>
</html>