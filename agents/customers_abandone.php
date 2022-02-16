<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
$agent_id = $_SESSION['user_id'];

if(isset($_GET['id']) && ($_GET['act']=='remove')) {
	$sql = "DELETE FROM `".PREFIX."customers` WHERE id=".$_GET['id']." AND agent_id=$agent_id";
	$conn->query($sql);
	$sql = "DELETE FROM `".PREFIX."customer_detail` WHERE user_id=".$_GET['id'];
	$conn->query($sql);
	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Record has been deleted!';
		header('Location: customers_trash.php');
		exit;
	}
}

if(isset($_GET['id']) && ($_GET['act']=='resend')) {
	$sql2 = "SELECT * FROM `".PREFIX."customer_detail` WHERE user_id=".$_GET['id'].";";
	$query2 = $conn->query($sql2);
	if($query2->num_rows > 0 ) {
		$title=array();
		while($model2 = $query2->fetch_object()) {
			$sql3 = "SELECT * FROM `".PREFIX."tours` WHERE id=".$model2->tour_id." LIMIT 1;";
			$query3 = $conn->query($sql3);
			$model3 = $query3->fetch_object();
			$title[] = $model3->title;
		}

		$HTML = '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1.2em;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="center"><a href="https://www.toniagara.com"><img src="https://www.toniagara.com/images/logo.png" alt="logo.png" height="55"></a></td>
</tr>
</table>
<p>Hi '.$model->name.'!</p>
<p>I saw you started to reserve '. implode(',',$title) .', but weren\'t able to complete it.</p>
<p>Shoot us a quick note or give us a call at +1 800-653-2242. Let us know how we can help. We\'d love to make this work for you.</p>
<p><a style="color:#ffffff;font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;text-decoration:none;text-transform:uppercase;background-color:#8bc440;padding:15px 50px;width:150px;display:block" href="https://www.toniagara.com/checkout?token='.$model->sessionId.'">Resume Booking</a></p>
<p>Best wishes,<br />
Nick,<br />Niagara Falls Tours Specialist<br />
<a href="https://www.toniagara.com">www.toniagara.com</a></p>
</div>';
	
		$subject = 'Need help with your booking?';
		//sendMail( array($model->email, $model->name), $subject, $HTML);
		sendMail( array('ashutosh2801@gmail.com', SITENAME), $subject, $HTML);
		$_SESSION['msg'] = 'Abandone email has been sent.';
		header('Location: customers_abandone.php');
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Abandone Bookings :: <?php echo SITENAME; ?></title>
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
                <li><a href="customers_abandone.php">Abandone Bookings</a><span>«</span></li>
                <li>List</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Abandone Bookings</h2>
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
                    	<th colspan="8" style="background:#fff">
                      	<a href="add_new_booking.php" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Add New Booking</a>
                        <button type="submit" class="btn btn-danger btn-flat btn-pri" name="trash" onClick="return confirm('Do you want to send to TRASH?')"><i class="fa fa-trash"></i> Trash All</button>
                      </th>
                    	<?php /*?><th colspan="9" style="background:#fff" onClick="return confirm('Do you want to send to TRASH?')"><button type="submit" class="btn btn-danger" name="trash"><i class="fa fa-trash"></i> Trash All</button></th><?php */?>
                    </tr>
                    <tr>
                      <th width="20">#</th>
                      <th width="20"><input type="checkbox" class="select-all" style="width:18px; height:18px" /></th>
                      <th>Order ID </th>
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
									$condition = "c.id=cd.user_id AND c.status=0 AND agent_id=$agent_id";
									if(!empty($_GET['q'])) {
										$condition = " AND (c.order_id like '%".$_GET['q']."%' OR cd.name like '%".$_GET['q']."%' OR cd.phone like '%".$_GET['q']."%' OR cd.email like '%".$_GET['q']."%')";
									}
									if(!empty($_GET['date'])) {
										$explode = explode(" - ",$_GET['date']);
										$condition = " AND tour_date>'".$explode[0]."' AND  tour_date<='".$explode[1]."'";
									}
									
									$limit = 50;
									$page = (int)$_GET['page'] ? $_GET['page'] : 1;
									$offset = $limit * ($page-1);
									
									$sql = "SELECT c.id, c.status, c.order_id, c.created_date, c.agent_id, c.url_string, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY c.created_date DESC LIMIT $offset, $limit";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
											$x = ($offset+1);
											while($row = $result->fetch_object()) {
									?>
                    <tr bgcolor="#d4e8d4">
                    	<td width="20"><strong>#<?php echo $x++; ?></strong></td>
                    	<td width="20"><input type="checkbox" class="checkbox" name="cust_order[]" style="width:18px; height:18px" value="<?php echo $row->id; ?>" /></td>
                      <td width="60">
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
                      	<a href="add_new_booking_checkout.php?token=<?php echo $row->sessionId; ?>" class="badge badge-success"><i class="fa fa-play"></i> Resume</a>
                        <a href="?id=<?php echo $row->id; ?>&act=remove" class="badge badge-danger" onClick="return confirm('Do you want to DELETE?')"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    
                    <tr bgcolor="#d4e8d4"><td colspan="9" style="padding: 0px 10px 0px 0px">
                    <table class="table" style="margin:5px 5px 15px;">
                    <thead>
                      <tr>
                      <th width="200" style="background:#c16a6a">Tour Date</th>
                      <th width="200" style="background:#c16a6a">Tour Title</th>
                      <th width="200" style="background:#c16a6a;">Pickup Location</th>
                      <th width="280" style="background:#c16a6a;text-align:right">Tour Detail</th>
                      <th width="280" style="background:#c16a6a;text-align:right">Tour Add Ons</th>
                      <th width="100" style="background:#c16a6a;text-align:right">Sub Total</th>
                      <th width="100" style="background:#c16a6a;text-align:right">Discount</th>
                      <th width="100" style="background:#c16a6a;text-align:right">Tax</th>
                      <th width="100" style="background:#c16a6a;text-align:right">Gratuity</th>
                      <th width="180" style="background:#c16a6a;text-align:right">Convenience fee</th>
                      <th width="100" style="background:#c16a6a;text-align:right">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql3 = "SELECT c.id, c.status, c.order_id, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.price_type FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd, ".PREFIX."tours t WHERE c.id=".$row->id." AND  c.id=cd.user_id AND cd.tour_id=t.ID AND c.status=0 AND agent_id=$agent_id ORDER BY cd.tour_date DESC";
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
                      <td style="text-align:right">$<?php echo number_format($row3->total,2); ?></td>
                    </tr>
                  <?php
									//$sum+=$row3->total;
									}
									?>
                  	<tr>
                      <td colspan="8" style="text-align:right"><strong>Grand Total</strong></td>
                      <td style="text-align:right"><strong>$<?php echo number_format($sum,2); ?></strong></td>
                    </tr>
                  	</tbody>
                		</table>
                    </td>
                    </tr>
                  <?php  
									}
									} else {
										echo "<tr><td colspan='9'>No records found.</td></tr>";
									}
									$sql = "SELECT c.id, c.status, c.order_id, c.created_date, c.url_string, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY c.created_date DESC";
									$result = $conn->query($sql);
									
									
									?>
                  <tr><td colspan='9'><?php echo paginattion($page, ($result->num_rows/$limit) ,'/admin/customers_abandone.php?q='); ?></td></tr>
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