<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_POST['cust_order']) && isset($_POST['trash'])) {
	foreach($_POST['cust_order'] as $id) {
		$sql = "UPDATE `".PREFIX."customers` SET `status`=3 WHERE id=".$id.";";
		$conn->query($sql);
	}
	$_SESSION['msg'] = 'Record moved in trash!';
	header('Location: customers_unconfirm.php');
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
	header('Location: customers_unconfirm.php');
	exit;
}

if(isset($_GET['id']) && ($_GET['act']=='trash')) {
	$sql = "UPDATE `".PREFIX."customers` SET `status`=3 WHERE id=".$_GET['id'].";";
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been moved in Trash.';
		header('Location: customers_unconfirm.php');
		exit;
	}
}

if(isset($_GET['id']) && ($_GET['act']=='update')) {
	
	$status = $_GET['st'] ? 1 : 0;
	$sql = "UPDATE `".PREFIX."customers` SET status=".$status." WHERE id=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been updated!';
		header('Location: customers_unconfirm.php');
		exit;
	}
}

$user = array();
if(isset($_GET['Id'])) {
	$sql = "SELECT * FROM `".PREFIX."users` WHERE ID=".$_GET['Id'];
	$result = $conn->query($sql);
	$user = $result->fetch_object();
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
                <form action="" method="post">
                
                <table id="table"  class="table">
                  <thead>
                  	<tr>
                    	<th colspan="7" style="background:#fff" onClick="return confirm('Are you sure?')"><button type="submit" class="btn btn-success" name="trash"><i class="fa fa-check"></i> Mark as Paid</button></th>
                    </tr>
                    <tr>
                      <th width="20"><input type="checkbox" class="select-all" style="width:18px; height:18px" /></th>
                      <th>#OrderID </th>
                      <th>Customer Name</th>
                      <th>Tour Name</th>
                      <th>Tour Date</th>
                      <th>Tour Status</th>
                      <th>Tour Total</th>
                      <th>Balance</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
									$condition = "c.id=cd.user_id AND cd.tour_complete=0 AND c.agent_id=".$_GET['Id'];
									$sql = "SELECT c.id, c.status, c.order_id, c.agent_id, c.created_date, c.url_string, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition ORDER BY c.created_date DESC";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_object()) {
											$tour = tour_detail($conn, $row->tour_id);
											$discount = ($row->total*$user->discount)/100;
									?>
                    <tr bgcolor="#d4e8d4">
                    	<td width="20"><input type="checkbox" class="checkbox" name="cust_order[]" style="width:18px; height:18px" value="<?php echo $row->id; ?>" /></td>
                      <td width="60">
												<?php echo $row->order_id; ?>
                      	<input type="hidden" value="<?php echo $row->id; ?>" name="cust[]" />
                      </td>
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
                      <td>$<?php echo $row->total; ?></td>
                      <td>$<?php echo number_format($discount,2); ?></td>
                      <td><?php echo check_if_paid($conn, $row->id, $row->tour_id, $row->agent_id ); ?></td>
                    </tr>
                  <?php  
										}
									} else {
										echo "<tr><td colspan='8'>No records found.</td></tr>";
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