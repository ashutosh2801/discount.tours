<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_POST['cust_order'])) {
	foreach($_POST['cust_order'] as $cid) {
		
		$sql3 = "SELECT * FROM `".PREFIX."customer_detail` WHERE cid=$cid";
		$result3 = $conn->query($sql3);
		if ($result3->num_rows > 0) {
			$row3 = $result3->fetch_object();
		}
		
		$sql = "SELECT * FROM `".PREFIX."user_paid` WHERE agent_id='".$_GET['Id']."' AND customer_id='".$row3->user_id."' AND tour_id='".$row3->tour_id."' AND is_paid=1;";
		$query = $conn->query($sql);
		if($query->num_rows == 0 ) {
			$sql4 = "INSERT INTO `".PREFIX."user_paid` (`agent_id`, `customer_id`, `tour_id`, `is_paid`) VALUES ('".$_GET['Id']."', '".$row3->user_id."', '".$row3->tour_id."', '1');";
			$conn->query($sql4);
		}
	}
	$_SESSION['msg'] = 'Record updated!';
	header('Location: agent_balance.php?Id='.$_GET['Id']);
	exit;
}

$user = array();
if(isset($_GET['Id'])) {
	$sql = "SELECT * FROM `".PREFIX."users` WHERE ID=".$_GET['Id'];
	$result = $conn->query($sql);
	$user = $result->fetch_object();
}

$condition = "c.id=cd.user_id AND c.status=2 AND c.agent_id=".$_GET['Id'];
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
<title>Payment history of <?php echo $user->name; ?> Agent :: <?php echo SITENAME; ?></title>
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
                <li><a href="agents.php">Payment history of <u><?php echo $user->name; ?></u> Agent</a><span>«</span></li>
                <li>Balance</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Payment history of <u><?php echo $user->name; ?></u> Agent</h2>
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
                  <input type="hidden" name="Id" value="<?php echo $_GET['Id']; ?>" />
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
                    	<th colspan="4" style="background:#fff"><button onClick="return confirm('Are you sure?')" type="submit" class="btn btn-success" name="trash"><i class="fa fa-check"></i> Mark as Paid</button></th>
                      <td colspan="6" style="background:#fff"><div class="text-right">
                <span>Paid Tours: <strong><?php echo $paid_t; ?></strong></span> &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Unpaid Tours: <strong><?php echo $unpaid_t; ?></strong></span> &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Total Sales: <strong>$<?php echo number_format($total_salse,2); ?></strong></span> &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Commission Paid: <strong>$<?php echo number_format($paid,2); ?></strong></span> &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Unpaid Commission: <strong>$<?php echo number_format($unpaid,2); ?></strong></span>
                </div></td>
                    </tr>
                    <tr>
                      <th width="20"><input type="checkbox" class="select-all" style="width:18px; height:18px" /></th>
                      <th>#OrderID </th>
                      <th>Booking Date</th>
                      <th>Customer Name</th>
                      <th>Tour Name</th>
                      <th>Tour Date</th>
                      <th>Tour Status</th>
                      <th>Tour Total</th>
                      <th>Commission</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
									$condition = "c.id=cd.user_id AND c.status=2 AND c.agent_id=".$_GET['Id'];
									if(!empty($_GET['q'])) {
										$condition.= " AND (c.order_id like '%".$_GET['q']."%' OR cd.name like '%".$_GET['q']."%' OR cd.phone like '%".$_GET['q']."%' OR cd.email like '%".$_GET['q']."%')";
									}
									if(!empty($_GET['date'])) {
										$explode = explode(" - ",$_GET['date']);
										$condition.= " AND c.created_date>'".trim($explode[0])."' AND c.created_date<='".trim($explode[1])."'";
									}
									$sql = "SELECT c.id, c.status, c.order_id, c.agent_id, c.created_date, c.url_string, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition ORDER BY c.created_date DESC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_object()) {
											$tour = tour_detail($conn, $row->tour_id);
											$discount = ($row->total*$user->discount)/100;
									?>
                    <tr bgcolor="#d4e8d4">
                    	<td width="20"><input type="checkbox" class="checkbox" name="cust_order[]" style="width:18px; height:18px" value="<?php echo $row->cid; ?>" /></td>
                      <td width="60">
												<?php echo $row->order_id; ?>
                      	<input type="hidden" value="<?php echo $row->id; ?>" name="cust[]" />
                      </td>
                      <td><?php echo $row->created_date; ?></td>
                      <td>
												<?php echo $row->name; ?> [<a href="tel:<?php echo $row->phone; ?>"><?php echo $row->phone; ?></a>]<br />
                        <a href="<?php echo $row->email; ?>"><?php echo $row->email; ?></a>
                        </td>
                      <td><a href="/tours/<?php echo $tour->slug; ?>"><?php echo $tour->title." ".$tour->sub_title; ?></a></td>
                      <td><?php echo $row->tour_date; ?></td>
                      <td>
												<?php 
												if($row->status==0) echo '<a class="badge badge-warning">Abandone</a>';
												else if($row->status==1) echo '<a class="badge badge-success">Confirmed</a>'; 
												else if($row->status==2) echo '<a class="badge badge-success">Completed</a>'; 
												else if($row->status==3) echo '<a class="badge badge-danger">Trash</a>'; 
												?>
											</td>
                      <td>$<?php echo number_format($row->total,2); ?></td>
                      <td>$<?php echo number_format($discount,2); ?></td>
                      <td><?php echo check_if_paid($conn, $row->id, $row->tour_id, $row->agent_id ); ?></td>
                    </tr>
                  <?php  
										}
									} else {
										echo "<tr><td colspan='10'>No records found.</td></tr>";
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