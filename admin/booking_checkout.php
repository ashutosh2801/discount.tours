<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
//$sessionId = session();

$agent_id = $sessionId = 0;

$_sql = "SELECT * FROM `tour_customers` WHERE id=".$_GET['id'].";";
$_query = $conn->query($_sql);
if($_query->num_rows > 0 ) {
	$_model = $_query->fetch_object();
	$agent_id = $_model->agent_id;
	$sessionId = $_model->sessionId;
}

$statusMsg='';
$HTML = '';
//check whether stripe token is not empty
if(!empty($_POST['stripeToken']))
{
	$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.currency, t.price_type, t.gratuity, t.convenience_fee FROM `tour_customers` c, `tour_customer_detail` cd, tour_tours t WHERE c.id=cd.user_id AND c.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
	$query = $conn->query($sql);
	if($query->num_rows > 0 ) 
	{
		$subtotal = $sub_total = $tax = $cnt = $total = $convenience_fee = 0;
		$tour_title = array();
		
		$HTML.= '<table width="100%" border="0" cellspacing="0" cellpadding="15" bordercolor="#ccc" style="border-collapse:collapse; border:1px solid #ccc;">';
		while($model = $query->fetch_object()) 
		{
			$subtotal = $cnt = 0;
			
			$adults_price 	= $adults = 0;
			$children_price = $children = 0;
			$seniors_price 	= $seniors = 0;
			$infants_price 	= $infants = 0;
			
			if($model->adults) { $adults = $model->adults; $adults_price = $model->adults_price; $cnt+=$model->adults; }
			if($model->children) { $children = $model->children; $children_price = $model->children_price; $cnt+=$model->children; }
			if($model->seniors) { $seniors = $model->seniors; $seniors_price = $model->seniors_price; $cnt+=$model->seniors; }
			if($model->infants) { $infants = $model->infants; $infants_price = $model->infants_price; $cnt+=$model->infants; }
			
			if($model->price_type=='person') {
				$subtotal+= ($adults * $adults_price) + ($children * $children_price) + ($seniors * $seniors_price) + ($infants * $infants_price);
			}
			else if($model->price_type=='group') {
				$subtotal+= $adults_price;
			}

			$tour_title[]= $model->title;				
			 
			$HTML.= '<thead bgcolor="#e8e8e8">
				<tr>
					<td colspan="2" style="font-size:16px; text-align:center;">'.$model->title.' <span style="color:#0078de;">'.strtoupper(date('D d M',strtotime($model->tour_date))).'</span></td>
				</tr>
				</thead><tbody>';
				
				$HTML.= '<tr>
					<td valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="2">
							<tr>
								<td style="color:#0078de; padding-bottom:5px;">CUSTOMER DETAILS</td>
							</tr>
							<tr>
								<td> <strong>'.$model->name.'</strong> </td>
							</tr>
							<tr>
								<td><img src="https://www.toniagara.com/images/email/mail.png" alt="user.png"> <a href="mailto:'.$model->email.'" style="color:#666; text-decoration:none;">'.$model->email.'</a></td>
							</tr>
							<tr>
								<td><img src="https://www.toniagara.com/images/email/call.png" alt="user.png"> '.$model->phone.'</td>
							</tr>
							<tr>
								<td><img src="https://www.toniagara.com/images/email/user.png" alt="user.png"> '.$cnt.' Reserved</td>
							</tr>
						</table>
					</td>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody style="line-height:24px;">';
				
			if($model->adults) {
				if($model->price_type=='person') {
					$HTML.= '<tr>
						<td>Adults ('.$model->adults.' × CA$'. $model->adults_price.')</td>
						<td align="right">CA$'. number_format(($model->adults * $model->adults_price),2).'</td>
					</tr>';
				}
				else if($model->price_type=='group') {
					$HTML.= '<tr>
						<td>Number of Guests ('.$model->adults.')</td>
						<td align="right">CA$'. number_format($model->adults_price,2).'</td>
					</tr>';
				}
			} if($model->children) {
			$HTML.= '<tr>
				<td>Children ('. $model->children.' × CA$'. $model->children_price.')</td>
				<td align="right">CA$'. number_format(($model->children * $model->children_price),2).'</td>
			</tr>';
			} if($model->seniors) {
			$HTML.= '<tr>
				<td>Seniors ('. $model->seniors.' × CA$'. $model->seniors_price.')</td>
				<td align="right">CA$'. number_format(($model->seniors * $model->seniors_price),2).'</td>
			</tr>';
			} if($model->infants) {
			$HTML.= '<tr>
				<td>Infants ('. $model->infants.')</td>
				<td align="right">Free</td>
			</tr>';
			/*$HTML.= '<tr>
				<td>Infants ('. $model->infants.' × CA$'. $model->infants_price.')</td>
				<td align="right">CA$'. number_format(($model->infants * $model->infants_price),2).'</td>
			</tr>';*/
			}
	
			$sql2 = "SELECT * FROM `tour_add_ons` WHERE addons_id IN (".$model->add_ons.");";
			$query2 = $conn->query($sql2);
			if($query2->num_rows > 0 ) {
				$k = 0;
				$add_ons_nom = explode(",",$model->add_ons_nom);
				while($model2 = $query2->fetch_object()) {
					$subtotal+=($add_ons_nom[$k] * $model2->addons_price);
					
					$HTML.= '<tr>
						<td>'. $model2->addons_title.' ('. $add_ons_nom[$k].' × CA$ '.$model2->addons_price.')</td>
						<td align="right">CA$'. number_format(($add_ons_nom[$k++]*$model2->addons_price),2).'</td>
					</tr>';
				}
			}
			
			$sub_total+= $subtotal;
			$tax+= $model->tax;
			$gratuity+= $model->gratuity_amt;
			$convenience_fee+= $model->convenience_fee;

			$HTML.= '</tbody><tfoot style="color:#333; font-weight:600;">';
			
			$HTML.= '<tr>
							 <td style=" border-top:1px solid #ccc; padding-top:5px;"><strong>Total</strong></td>
							 <td style=" border-top:1px solid #ccc;" align="right">CA$'. number_format($subtotal,2).'</td>
						 </tr>';
						 
			$HTML.= '</tfoot>
						</table>
					</td>
					</tr>';
				
				

			$sql2 = "SELECT * FROM `tour_add_ons` WHERE addons_id IN (".$model->add_ons.");";
			$query2 = $conn->query($sql2);
			if($query2->num_rows > 0 ) {
				$HTML.= '<tr style="border-top:1px solid #ccc;">
					<td colspan="2" style="margin:0 0 10px 0; color:#0078de;">
						ADD-ONS PURCHASED
					</td>
				 </tr>
				<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="2" style="text-align:right;">';
				$k = 0;
				$add_ons_nom = explode(",",$model->add_ons_nom);
				while($model2 = $query2->fetch_object()) {
					$HTML.= '<tr>
						<td style="padding-right:20px;">'. $model2->addons_title.'</td>
						<td align="right">Qty	'. $add_ons_nom[$k++].'</td>
					</tr>';
				}
				$HTML.= '</table></td></tr>';
			}	
				
		}
		
		$HTML.= '</tbody></table>';
			
		//$tax = ($subtotal*13)/100;
		$total = ($sub_total + $tax + $gratuity + $convenience_fee);
		
		list($whole, $decimal) = explode('.', number_format($sub_total,2));
		$HTML.= '<table width="100%" border="0" cellspacing="0" cellpadding="10" bordercolor="#ccc" style="border-collapse:collapse; border:1px solid #ccc; margin-top:15px; text-align:right;">
				<tr style="color:#333; font-weight:600;">
					<td style="padding:10px 10px 0 10px">Total</td>
					<td style="padding:10px 10px 0 10px">CA$ '. $whole.' <sup><u>'. $decimal .'</u></sup></td>
				</tr>';
		if($tax) {		
			list($whole, $decimal) = explode('.', number_format($tax,2));		
			$HTML.= '<tr>
					<td>Taxes & fees (13%)</td>
					<td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
				</tr>';
		}
		if($gratuity) {		
			list($whole, $decimal) = explode('.', number_format($gratuity,2));		
			$HTML.= '<tr>
					<td>Gratuity</td>
					<td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
				</tr>';
		}
		if($convenience_fee) {		
			list($whole, $decimal) = explode('.', number_format($convenience_fee,2));		
			$HTML.= '<tr>
					<td>Convenience fee</td>
					<td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
				</tr>';
		}
		list($whole, $decimal) = explode('.', number_format($total,2));		
		$HTML.= '<tr style="background: #2e9a0e;color: #fff;font-size:17px;font-weight: 600;">
					<td>Grand Total</td>
					<td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
				</tr>
			</table>';
		$HTML.= '</table>';
		
		$sql3 = "SELECT * FROM `tour_customers` WHERE sessionId='".$sessionId."' LIMIT 1;";
		$query3 = $conn->query($sql3);
		if($query3->num_rows > 0 ) {
			$model3 = $query3->fetch_object();
			
			$item_number= $model3->sessionId; 
			$order_id 	= $model3->order_id; 
			$name 			= $model3->name;
			$email 			= $model3->email;
			$phone 			= $model3->phone;
		}
	}
	
	//item information
	$itemName 	= implode(", ", $tour_title);
	$itemNumber = $item_number;
	$itemPrice 	= round($total,2) * 100;
	$currency 	= "CAD";
	$orderID 		= $order_id;
	
	//$sql_2 = "UPDATE `tour_customers` SET `auth_id`='".$chargeJson['id']."', `status`='1', `type`='".$_POST['type']."' WHERE id=".$model3->id.";";
	//$conn->query($sql_2);
			
	$client_msg.= '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1em;"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><img src="https://www.toniagara.com/images/logo.png" alt="logo.png" height="55"></td></tr><tr><td><h3 align="center">Your booking request has been received.</h3><p align="center">Your booking request has been received, but has not been confirmed. We will review the booking and confirm its status as soon as possible. Your credit card will not be charged until the booking is confirmed. The charge on your credit card statement will appear as "TONIAGARA".</p></td></tr></table>'.$HTML.'<div style="font-size:13px;text-align:right; padding-top:5px;">Booking ID: '.$orderID.'</div></div>';
	
	//sendMail( array($email, $name), 'ToNiagara - Your booking request has been received. Order ID - '.$orderID, $client_msg);

	$admin_msg.= '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1em;"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td colspan="2" align="center"><img src="https://www.toniagara.com/images/logo.png" alt="logo.png" height="55"></td></tr><tr><td width="50%" style="background:green;"><a style="color:#fff;display:block; text-align:center; text-decoration:none;" href="https://www.toniagara.com/admin/accept.php?orderId='.$orderID.'">Accept</a></td><td width="50%" style="background:red;"><a style="color:#fff; display:block; text-align:center; text-decoration:none;" href="https://www.toniagara.com/admin/decline.php?orderId='.$orderID.'">Decline</a></td></tr></table>'.$HTML.'<div style="font-size:13px;text-align:right; padding-top:5px;">Booking ID: '.$orderID.'</div></div>';

	//sendMail( array(SITEEMAIL, SITENAME), 'ToNiagara - New booking. Order ID - '.$orderID, $admin_msg);
	//sendMail( array('ashutosh2801@gmail.com', SITENAME), 'ToNiagara - New booking. Order ID - '.$orderID, $admin_msg);
	
	//echo $HTML;
	header('Location: booking_confirmation.php');
	exit;
			
}

if(!empty($_GET['id']) && !empty($_GET['cid']) && $_GET['act']=='remove')
{
	$sql = "DELETE FROM `tour_customer_detail` WHERE cid=".$_GET['cid'].";";
	if($conn->query($sql)) {
		
		$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.currency FROM `tour_customers` c, `tour_customer_detail` cd, `tour_tours` t WHERE c.id=cd.user_id AND cd.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
		$query = $conn->query($sql);
		if($query->num_rows > 0 ) {
			$statusMsg = '<p class="error">Product has been deleted.</p>';
		}
		else {
			$sql2 = "DELETE FROM `tour_customers` WHERE id=".$_GET['id'].";";
			$conn->query($sql2);
			$statusMsg = '<p class="error">Product has been deleted. <a href="/tours">Click here to continue shopping.</a></p>';
		}
		$_SESSION['statusMsg'] = $statusMsg;
		header('Location: booking_checkout.php');
		exit;
	}
}

$user_result = array();
$user_sql = "SELECT c.id, c.status, c.created_date, cd.* FROM `tour_customers` c, `tour_customer_detail` cd WHERE c.id=cd.user_id AND c.sessionId='".$sessionId."';";
$user_query = $conn->query($user_sql);
if($user_query->num_rows > 0 )
$user_result = $user_query->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Booking Checkout :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<?php require_once('includes/header.php'); ?>
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<link href="<?php echo APPROOT; ?>css/payment.css" rel="stylesheet" />
<link href="<?php echo APPROOT; ?>css/bootstrap-datetimepicker.css" rel="stylesheet">
<link href="<?php echo APPROOT; ?>strip-test/css/base.css" data-rel-css="" rel="stylesheet" type="text/css" >
<link href="<?php echo APPROOT; ?>strip-test/css/stripe-v3.css" data-rel-css="" rel="stylesheet" type="text/css" >
</head>
<body>

<div class="wthree_agile_admin_info">
		<div class="w3_agileits_top_nav">
			<?php require_once('includes/leftbar.php'); ?>
		</div>
			
		<div class="clearfix"></div>
				<div class="inner_content">
        
          <!-- breadcrumbs -->
          <div class="w3l_agileits_breadcrumbs">
            <div class="w3l_agileits_breadcrumbs_inner">
              <span style="float:right"><strong><span>«</span> <a href="index.php">Back to Dashboard</a></strong></span>
              <ul>
                <li><a href="index.php">Dashboard</a><span>«</span></li>
                <li><a href="customers_unconfirm.php">New Booking</a><span>«</span></li>
                <li>Checkout</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
          <?php
					$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.currency, t.price_type, t.gratuity, t.convenience_fee FROM `tour_customers` c, `tour_customer_detail` cd, `tour_tours` t WHERE c.id=cd.user_id AND cd.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
					$query = $conn->query($sql);
					if($query->num_rows > 0 ) {
					?>
					<div class="inner_content_w3_agile_info two_in">
          	<div class="cardForm" id="example-2">
            <form id="form_checkout" action="" method="post">
            
					  <h2 class="w3_inner_tittle"><?php echo $tour_detail->title.' '.$tour_detail->sub_title; ?></h2>
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
						?>
            
            <div class="forms-main_agileits">
              <div class="set-1_w3ls">
							<?php echo str_replace("Stripe","",$_SESSION['statusMsg']); $_SESSION['statusMsg']=''; ?>
              <?php
              $subtotal = $sub_total = $tax = $total = $cflag = $convenience_fee = 0;
              while($model = $query->fetch_object()) {
                $url = tour_urlMap('tours', $model->slug);
                $thumb = tour_thumb($model->tour_thumb);
                $sub_total = $cnt = 0;
                
                if($model->currency=='US') { $cflag=1; }
                
                $adults_price 	= $adults = 0;
                $children_price = $children = 0;
                $seniors_price 	= $seniors = 0;
                $infants_price 	= $infants = 0;
                
                if($model->adults) { $adults = $model->adults; $adults_price = $model->adults_price; $cnt+=$model->adults; }
                if($model->children) { $children = $model->children; $children_price = $model->children_price; $cnt+=$model->children; }
                if($model->seniors) { $seniors = $model->seniors; $seniors_price = $model->seniors_price; $cnt+=$model->seniors; }
                if($model->infants) { $infants = $model->infants; $infants_price = $model->infants_price; $cnt+=$model->infants; }
                
                if($model->price_type=='person') {
                  $sub_total+= ($adults * $adults_price) + ($children * $children_price) + ($seniors * $seniors_price) + ($infants * $infants_price);
                }
                else if($model->price_type=='group') {
                  $sub_total+= $adults_price;
                }
              ?>
              <div class="checkout_wra1">
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="pay_tour_img"><a href="<?php echo $url;?>"><img itemprop="image" src="<?php echo $thumb;?>?ver=4" alt="<?php echo $model->tour_thumb;?>" class="img-res" style="width:200px"></a></div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h2 class="pay_tour_title"><a href="<?php echo $url;?>"><?php echo $model->title;?></a></h2>
                        <h3 class="pay_name"><?php echo $model->name;?></h3>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="pay_detail_tbl">
                          <tr>
                            <td width="40%"><i class="fa fa-users"></i> <?php echo $cnt; ?> Reserved</td>
                            <td><i class="fa fa-envelope"></i> <?php echo $model->email;?></td>
                          </tr>
                          <tr>
                            <td><i class="fa fa-calendar"></i> <?php echo date('d M Y', strtotime($model->tour_date));?> <?php echo $model->tour_time;?></td>
                            <td><i class="fa fa-phone"></i> <?php echo $model->phone;?></td>
                          </tr>
                        </table>
                        <div class="pay_modify"><a class="remove" onClick="return confirm('Are you sure?');" href="booking_checkout.php?id=<?php echo $model->id;?>&cid=<?php echo $model->cid;?>&act=remove"><i class="fa fa-trash"></i> Remove</a> <a class="modify" href="booking_cart.php?id=<?php echo $model->tour_id;?>&user_id=<?php echo $model->user_id;?>"><i class="fa fa-pencil"></i> Modify</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="pay_price_tbl">
                      <?php if($model->adults) { ?>
                      <?php if($model->price_type=='person') { ?>
                      <tr>
                        <td>Adults (<?php echo $model->adults; ?> × CA$<?php echo $model->adults_price; ?>)</td>
                        <td align="right">CA$<?php echo number_format(($model->adults * $model->adults_price),2); ?></td>
                      </tr>
                      <?php } else if($model->price_type=='group') { ?>
                      <tr>
                        <td>Number of Guests (<?php echo $model->adults; ?>)</td>
                        <td align="right">CA$<?php echo number_format($model->adults_price,2); ?></td>
                      </tr>
                      <?php } 
                      } if($model->children) { ?>
                      <tr>
                        <td>Children (<?php echo $model->children; ?> × CA$<?php echo $model->children_price; ?>)</td>
                        <td align="right">CA$<?php echo number_format(($model->children * $model->children_price),2); ?></td>
                      </tr>
                      <?php } if($model->seniors) { ?>
                      <tr>
                        <td>Seniors (<?php echo $model->seniors; ?> × CA$<?php echo $model->seniors_price; ?>)</td>
                        <td align="right">CA$<?php echo number_format(($model->seniors * $model->seniors_price),2); ?></td>
                      </tr>
                      <?php } if($model->infants) { ?>
                      <tr>
                        <td>Infants (<?php echo $model->infants; ?>)</td>
                        <td align="right">Free</td>
                      </tr>
                      <?php /*?><tr>
                        <td>Infants (<?php echo $model->infants; ?> × CA$<?php echo $model->infants_price; ?>)</td>
                        <td align="right"><?php echo 'CA$'.number_format(($model->infants * $model->infants_price),2); ?></td>
                      </tr><?php */?>
                      <?php } ?>
                      
                      <?php
                      $sql2 = "SELECT * FROM `tour_add_ons` WHERE addons_id IN (".$model->add_ons.");";
                      $query2 = $conn->query($sql2);
                      if($query2->num_rows > 0 ) {
                        $k = 0;
                        $add_ons_nom = explode(",",$model->add_ons_nom);
                        while($model2 = $query2->fetch_object()) {
                          $sub_total+= ($add_ons_nom[$k]*$model2->addons_price);
                      ?>
                      <tr>
                        <td><?php echo $model2->addons_title; ?> (<?php echo $add_ons_nom[$k] ?> × CA$<?php echo $model2->addons_price; ?>)</td>
                        <td align="right">CA$<?php echo number_format(($add_ons_nom[$k++] * $model2->addons_price),2); ?></td>
                      </tr>
                      <?php } ?>
                      <?php } ?>
                      <?php $subtotal+= $sub_total; ?>
                      <?php $tax+= $model->tax; ?>
                      <?php $gratuity_amt+= $model->gratuity_amt; ?>
                      <?php $convenience_fee+= $model->convenience_fee; ?>
                      <tr>
                        <td><strong>Sub Total</strong></td>
                        <td align="right">CA$<?php echo number_format($sub_total,2); ?></td>
                      </tr>
                      
                    </table>
            
                  </div>
                </div>
              </div>
              <?php } ?>
            	</div>
						</div>            
            <div class="forms-main_agileits">
              <div class="set-1_w3ls">
                
                <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                  <div class="grid-1">
                    <h2 class="pay_head2">OLD PAYMENT</h2>
                    <?php
										$old_sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.currency, t.price_type, t.convenience_fee, t.gratuity FROM `tour_customers` c, `tour_customer_detail_copy` cd, `tour_tours` t WHERE c.id=cd.user_id AND cd.user_id='".$_GET['id']."' AND cd.tour_id=t.ID;";
										$old_query = $conn->query($old_sql);
										if($old_query->num_rows > 0 ) {
											$old_sub_total = $old_tax = $old_total = 0;
              				while($old_model = $old_query->fetch_object()) {
												$old_sub_total+= $old_model->subtotal;
												$old_tax+= $old_model->tax;
												$old_gratuity+= $old_model->gratuity_amt;
												$old_convenience_fee+= $old_model->convenience_fee;
												$old_total+= $old_model->total;
											}
										}
										?>
										<table width="100%" border="0" cellspacing="0" cellpadding="0" class="pay_total">
											<?php list($whole, $decimal) = explode('.', number_format($old_sub_total,2));  ?>
                      <tr>
                        <td>Total</td>
                        <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
                      </tr>
                      <?php if($old_tax>0) { list($whole, $decimal) = explode('.', number_format($old_tax,2) );  ?>
                      <tr>
                        <td>Taxes & fees (13% <?=$cflag==1 ? 'For CA Tours':'';?>)</td>
                        <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
                      </tr>
                      <?php } if($old_gratuity>0) { list($whole, $decimal) = explode('.', number_format($old_gratuity,2) );  ?>
                      <tr>
                        <td>Gratuity (15%)</td>
                        <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
                      </tr>
                      <?php } if($old_convenience_fee>0) { list($whole, $decimal) = explode('.', number_format($old_convenience_fee,2) );  ?>
                      <tr>
                        <td>Convenience fee</td>
                        <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
                      </tr>
                      <?php } ?>
                      <?php if($old_total>0) { ?>
                      <?php //$old_total = ($old_subtotal + $old_tax + $old_gratuity); ?>
                      <?php list($whole, $decimal) = explode('.', number_format($old_total,2)); ?>
                      <tr class="last_tr">
                        <td>Grand Total</td>
                        <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
                      </tr>
                      <?php } ?>
                    </table>
                  </div>
                </div>
                
                
                <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                  <div class="grid-1">
                  	<h2 class="pay_head2">NEW PAYMENT</h2>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="pay_total">
        <?php list($whole, $decimal) = explode('.', number_format($subtotal,2));  ?>
        <tr>
          <td>Total</td>
          <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
        </tr>
        <?php if($tax>0) { list($whole, $decimal) = explode('.', number_format($tax,2) );  ?>
        <tr>
          <td>Taxes & fees (13% <?=$cflag==1 ? 'For CA Tours':'';?>)</td>
          <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
        </tr>
        <?php } if($gratuity_amt>0) { list($whole, $decimal) = explode('.', number_format($gratuity_amt,2) );  ?>
        <tr>
          <td>Gratuity (15%)</td>
          <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
        </tr>
        <?php } if($convenience_fee>0) { list($whole, $decimal) = explode('.', number_format($convenience_fee,2) );  ?>
        <tr>
          <td>Convenience fee</td>
          <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
        </tr>
        <?php } ?>
        <?php if($tax>0 || $gratuity_amt>0 || $convenience_fee>0) { ?>
        <?php $total = $_total = ($subtotal + $tax + $gratuity_amt + $convenience_fee); ?>
        <?php list($whole, $decimal) = explode('.', number_format($_total,2)); ?>
        <tr class="last_tr">
          <td>Grand Total</td>
          <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
        </tr>
        <?php } else { $total = ($subtotal + $tax); } ?>
      </table>
      							
                    <br><br>
										<?php
                      $new_total = $total - $old_total;
											if($old_total==0) $new_total = 0;
                    ?> 
                    <div class="form-group text-center">
                    	<div class="pay_btn_final" id="pay_btn_final">
                        <button onClick="confirm('Did you paid this amount?')" style="padding:10px; font-size:30px;" class="btn btn-success" id="payBtn" type="submit"><i class="fa fa-cart-arrow-down"></i> Pay CA$<?php echo number_format($new_total,2); ?></button>
                      </div> 
                      <div class="pay_btn_final" id="processing_text" style="display:none;">
          							<button type="button">Processing Payment. Please Wait.</button>
                      </div>  
                    </div>
                  </div>
                </div> 
              </div>
            </div>
            <div class="clearfix"></div>
            </form>
            </div>
          </div> 
          <?php } ?> 
        <!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->

<?php require_once('includes/footer.php'); ?>
<script type="text/javascript" src="<?php echo APPROOT; ?>js/moment-with-locales.js"></script>
<script type="text/javascript" src="<?php echo APPROOT; ?>js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo APPROOT; ?>js/moment-timezone-with-data.js"></script>
<script type="text/javascript" >
$(document).ready(function() {
	
	<?php
	$en=$str=''; 
	if( $user_result->tour_date && strtotime($user_result->tour_date)>strtotime('now') ) {
		$str.="defaultDate:'".$user_result->tour_date."',";
	}
	else if( $_POST['tour_date'] && strtotime($_POST['tour_date'])>strtotime('now')  ) { 
		$str.="defaultDate:'".$_POST['tour_date']."',";
	}
	else {
		if(!empty($tour_detail->date_allow)) {
			$explode = explode(" - ",$tour_detail->date_allow);
			if( strtotime($explode[0]) <= strtotime(date('Y-m-d')) )
			$str.="defaultDate:'".date('Y-m-d', strtotime('+1 day'))."',";
			else
			$str.="defaultDate:'".$explode[0]."',";
		}
		else {
			if($tour_detail->today_allow==0) {
				$str.="defaultDate:'".date('Y-m-d', strtotime('+1 day'))."',";
			}
			else {
				$str.="defaultDate:'".date('Y-m-d', strtotime('+1 day'))."',";
			}
		}
		/*if($tour_detail->today_allow==0) {
			$str.="defaultDate:'".date('Y-m-d', strtotime('+1 day'))."',";
		}*/
	}
	if(!empty($tour_detail->date_allow)) {
		$explode = explode(" - ",$tour_detail->date_allow);
		$date = strtotime($explode[1]) + 86400;
		$str.="enabledDates: [";
		for($d=strtotime($explode[0]); $d<=$date; $d=$d+86400) {
			if(strtotime('now')<=$d) 
			$en.= '"'.date('Y-m-d',$d).'",'; 
		}
		$str.=substr($en,0,-1);
		$str.="],";
	}
	
	if($tour_detail->today_allow==0) {
		//$str.="useCurrent:false";
		echo "var tomorrow = moment();";
	}
	else { 
		echo "var tomorrow = moment();";
	}
	?>
	var b = moment.tz("Canada/Eastern").format();
	$('#datetimepicker').datetimepicker({
		timeZone: 'Canada/Eastern',
		format: 'MMMM DD, YYYY',
		minDate:tomorrow,
		ignoreReadonly: true,
		widgetPositioning:{
			horizontal: 'auto',
			vertical: 'bottom'
		},
		<?php echo $str; ?>
	});
	
	$('#datetimepicker').on('dp.change', function(event) {
		var formatted_date = event.date.format('YYYY-MM-DD');
    $('#tour_date').val(formatted_date);
  });
	
	//$('.form-horizontal').valida();
	
	$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
	});
	
	$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
	});
	
	$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
		
		<?php if($tour_detail->price_type=='group') { ?>
		var num = 0;
		$( ".each-input" ).each(function( index ) {
			num = num + parseInt( $(this).val());
		});
		if(num><?=$tour_detail->max_people;?>) {
			num = num-1;
			$(this).val(num);
			$('#quantity').addClass('error').html('Number of Guests cannot exceed <?=$tour_detail->max_people;?>.');
		}
		else {
			$('#quantity').removeClass('error').html('');
		}
		<?php } ?>
	});

	$(".input-number").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
				 // Allow: Ctrl+A
				(e.keyCode == 65 && e.ctrlKey === true) || 
				 // Allow: home, end, left, right
				(e.keyCode >= 35 && e.keyCode <= 39)) {
						 // let it happen, don't do anything
						 return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
		}
	});
	
	$('#cash, #check, #pay_later').click(function(){ 
		window.location.href = 'booking_checkout2.php?type='+$(this).val();
	});

});
</script>
<script type="text/javascript" src="js/valida.2.1.6.min.js"></script>
<script type="text/javascript" src="js/validator.min.js"></script>
</body>
</html>