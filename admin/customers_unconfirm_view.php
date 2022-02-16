<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
$model = array();
$sql = "SELECT * FROM `".PREFIX."customers` WHERE id=".$_GET['id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$model = $result->fetch_object();
} else {
	$msg = 'Invalid ID!';
	header('Location: error.php?msg='.$msg);
	exit;
}

$tour_detail = tour_detail($conn, $model->tour_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>View <?php echo $model->name; ?> Detail :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
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
                <li><a href="customers_unconfirm.php">New Bookings</a><span>/</span></li>
                <li><a href="customers_confirm.php">Confirmed Bookings</a><span>«</span></li>
                <li><?php echo $tour_detail->title; ?></li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">View  [ <?php echo $model->name; ?> ]</h2>
            <div class="agile-tables">
              <div class="w3l-table-info agile_info_shadow">
                <table id="table" style="vertical-align:top">
                            <tr>
                              <td width="15%">Tour Date</td>
                              <td><?php echo $model->tour_date; ?></td>
                            </tr>
                            <tr>
                              <td width="15%">Tour Title</td>
                              <td><?php echo $tour_detail->title; ?></td>
                            </tr>
                            <tr>
                              <td>Customer Name</td>
                              <td><?php echo $model->name; ?> </td>
                            </tr>
                            <tr>
                              <td>Customer Email</td>
                              <td><?php echo $model->email; ?> </td>
                            </tr>

                            <tr>
                              <td>Customer Phone</td>
                              <td><?php echo $model->phone; ?></td>
                            </tr>

                            <tr>
                              <td>Number of Adults</td> 
                              <td><?php echo $model->adults; ?></td> 
                            </tr>
                             
                            <tr> 
                              <td>Number of Seniors</td>
                              <td><?php echo $model->seniors; ?></td> 
                            </tr>
                            
                            <tr> 
                              <td>Number of Children</td>
                              <td><?php echo $model->children; ?></td> 
                            </tr>
                            
                            <tr> 
                              <td>Number of Infants</td>
                              <td><?php echo $model->infants; ?></td> 
                            </tr>
                            
                            <tr>
                              <td>Booking Status</td>
                            	<td><?php echo $row->status?'<a class="badge badge-success">Paid</a>':'<a class="badge badge-warning">Balance</a>'; ?></td>
                            </tr>  

                            <tr>
                              <td>Created date</td>
                              <td><?php echo $model->created_date; ?></td>
                            </tr>
                            
                          </table>
              </div>
        		</div>
          </div>  
        <!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->

<?php require_once('includes/footer.php'); ?>
</body>
</html>