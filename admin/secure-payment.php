<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_POST['cust_order']) && isset($_POST['trash'])) {
	foreach($_POST['cust_order'] as $id) {
		$sql = "UPDATE `".PREFIX."secure_payment` SET `status`=3 WHERE id=".$id.";";
		$conn->query($sql);
	}
	$_SESSION['msg'] = 'Record moved in trash!';
	header('Location: secure-payment.php');
	exit;
}

if(isset($_POST['order'])) {
	foreach($_POST['order'] as $id) {
		$order = "order_$id";
		$order = addslashes($_POST[$order]);
		$sql = "UPDATE `".PREFIX."secure_payment` SET `order`='".$order."' WHERE id=".$id.";";
		$conn->query($sql);
	}
	$_SESSION['msg'] = 'Order updated!';
	header('Location: secure-payment.php');
	exit;
}

if(isset($_GET['id']) && ($_GET['act']=='trash')) {
	$sql = "UPDATE `".PREFIX."secure_payment` SET `status`=3 WHERE id=".$_GET['id'].";";
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been moved in Trash.';
		header('Location: secure-payment.php');
		exit;
	}
}

if(isset($_GET['id']) && ($_GET['act']=='update')) {
	
	$status = $_GET['st'] ? 1 : 0;
	$sql = "UPDATE `".PREFIX."secure_payment` SET status=".$status." WHERE id=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been updated!';
		header('Location: secure-payment.php');
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Secure Payment :: <?php echo SITENAME; ?></title>
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
                <li><a href="secure-payment.php">Secure Payments</a><span>«</span></li>
                <li>List</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Secure Payments</h2>
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
                <form action="" method="post">
                
                <table id="table"  class="table">
                  <thead>
                  	<tr>
                    	<th colspan="8" style="background:#fff"><button onClick="return confirm('Do you want to send to TRASH?')" type="submit" class="btn btn-danger" name="trash"><i class="fa fa-trash"></i> Trash All</button></th>
                    </tr>
                    <tr>
                      <th width="20"><input type="checkbox" class="select-all" style="width:18px; height:18px" /></th>
                      <th>#Order ID </th>
                      <th>Created Date</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
									$condition = "order_id<>''";
									if(!empty($_GET['q'])) {
										$condition.= " AND (order_id like '%".$_GET['q']."%' OR name like '%".$_GET['q']."%' OR phone like '%".$_GET['q']."%' OR email like '%".$_GET['q']."%')";
									}
									if(!empty($_GET['date'])) {
										$explode = explode(" - ",$_GET['date']);
										$condition.= " AND created_date>'".trim($explode[0])."' AND created_date<='".trim($explode[1])."'";
									}
									
									$sql = "SELECT * FROM `".PREFIX."secure_payment` WHERE $condition ORDER BY created_date DESC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
											while($row = $result->fetch_object()) {
									?>
                    <tr bgcolor="#d4e8d4">
                    	<td width="20"><input type="checkbox" class="checkbox" name="cust_order[]" style="width:18px; height:18px" value="<?php echo $row->id; ?>" /></td>
                      <td width="60">
												<?php echo $row->order_id; ?>
                      	<input type="hidden" value="<?php echo $row->id; ?>" name="cust[]" />
                      </td>
                      <td><?php echo $row->created_date; ?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><a href="mailto:<?php echo $row->email; ?>"><?php echo $row->email; ?></a></td>
                      <td><a href="tel:<?php echo $row->phone; ?>"><?php echo $row->phone; ?></a></td>
                      <td>CA$<?php echo $row->amount; ?></td>
                      <td><?php 
											if($row->status==0) echo '<a class="badge badge-danger">Unpaid</a>';
											else if($row->status==1) echo '<a class="badge badge-warning">Authorized</a>';
											else if($row->status==2) echo '<a class="badge badge-success">Accepted</a>';
											else if($row->status==3) echo '<a class="badge badge-danger">Canceled</a>'; ?>
                      </td>
                      <td>
                      	<?php if($row->status==1) { ?>
                      	<a href="accept-secure-payment.php?orderId=<?php echo $row->order_id; ?>&act=card" class="badge badge-success" onClick="return confirm('Do you want to ACCEPT payment?')"><i class="fa fa-check"></i> Accept</a>
                        <a href="decline-secure-payment.php?orderId=<?php echo $row->order_id; ?>" class="badge badge-info" onClick="return confirm('Do you want to DECLINE payment?')"><i class="fa fa-close"></i> Declined</a>
                        <?php } /*else if($row->status==2) { ?>
                        <a href="decline.php?orderId=<?php echo $row->order_id; ?>" class="badge badge-warning" onClick="return confirm('Do you want to REFUND payment?')"><i class="fa fa-close"></i> Refund</a>
                        <?php } else if($row->status==3) { ?>
                        <a class="badge badge-danger"><i class="fa fa-close"></i> Canceled</a>
												<?php }*/ ?>
                      </td>
                    </tr>
                    <tr bgcolor="#d4e8d4">
                    	<td colspan='9'><strong>Note:</strong> <?php echo $row->note; ?></td>
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