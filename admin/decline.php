<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

$statusMsg='';
$HTML = '';
//check whether stripe token is not empty
if(!empty($_GET['orderId']))
{
		$orderId = $_GET['orderId'];
		$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.price_type FROM `tour_customers` c, `tour_customer_detail` cd, tour_tours t WHERE c.id=cd.user_id AND c.order_id='".$orderId."' AND cd.tour_id=t.ID;";
		$query = $conn->query($sql);
		if($query->num_rows > 0 ) {
			
			$subtotal = $tax = $cnt = $total = 0;
			$tour_title = array();
			
			$HTML.= '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size-adjust:14px;">
			<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="center"><img src="https://www.toniagara.com//images/logo.png" alt="logo.png" height="55"></td>
			</tr>
			<tr>
				<td>
				<h3 align="center">Your booking request has been received.</h3>
				<p align="center">Your booking request has been received, but has not been confirmed. We will review the booking and confirm its status as soon as possible. Your credit card will not be charged until the booking is confirmed. The charge on your credit card statement will appear as "TONIAGARA".</p>
				</td>
			</tr>
			</table>';
			
			
			$HTML.= '<table width="100%" border="0" cellspacing="0" cellpadding="10" bordercolor="#ccc" style="border-collapse:collapse;">';
			while($model = $query->fetch_object()) {
				if($model->adults) { $subtotal+=($model->adults*$model->adults_price); $cnt+=$model->adults; }
				if($model->children) { $subtotal+=($model->children*$model->children_price); $cnt+=$model->children; }
				if($model->seniors) { $subtotal+=($model->seniors*$model->seniors_price); $cnt+=$model->seniors; }
				if($model->infants) { $subtotal+=($model->infants*$model->infants_price); $cnt+=$model->infants; }
				$tour_title[]= $model->title; 
				
				 
				$HTML.= '<thead bgcolor="#e8e8e8">
          <tr>
            <td colspan="2"><strong>'.$model->title.'</strong> <span style="color:#0078de; float:right;">'.strtoupper(date('D d M',strtotime($model->tour_date))).'</span></td>
          </tr>
          </thead><tbody>';
					
					$HTML.= '<tr>
            <td>
						<h3 style="margin:0 0 10px 0; color:#0078de; font-size:16px; font-weight:normal;">CUSTOMER DETAILS</h3>
            <ul style="list-style:none; margin:0; padding:0">
            <li><img src="https://www.toniagara.com//images/email/user.png" alt="user.png"> '.$cnt.' Reserved</li>	 
            <li><img src="https://www.toniagara.com//images/email/mail.png" alt="user.png"> '.$model->email.'</li>
            <li><img src="https://www.toniagara.com//images/email/call.png" alt="user.png"> '.$model->phone.'</li>
            </ul>
            </td>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tbody style="line-height:24px;">';
					
				if($model->adults) {
				$HTML.= '<tr>
					<td>Adults ('.$model->adults.' × CA$'. $model->adults_price.')</td>
					<td align="right">CA$'. number_format(($model->adults*$model->adults_price),2).'</td>
				</tr>';
				} if($model->children) {
				$HTML.= '<tr>
					<td>Children ('. $model->children.' × CA$'. $model->children_price.')</td>
					<td align="right">CA$'. number_format(($model->children*$model->children_price),2).'</td>
				</tr>';
				} if($model->seniors) {
				$HTML.= '<tr>
					<td>Seniors ('. $model->seniors.' × CA$'. $model->seniors_price.')</td>
					<td align="right">CA$'. number_format(($model->seniors*$model->seniors_price),2).'</td>
				</tr>';
				} if($model->infants) {
				$HTML.= '<tr>
					<td>Infants ('. $model->infants.' × CA$'. $model->infants_price.')</td>
					<td align="right">CA$'. number_format(($model->infants*$model->infants_price),2).'</td>
				</tr>';
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
					$HTML.= '<tr>
					<td colspan="2">
						<h3 style="margin:0 0 10px 0; color:#0078de; font-size:16px; font-weight:normal;">ADD-ONS PURCHASED</h3>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:right;">';
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
					
				$sub_total+= $subtotal;
			}
			
			$HTML.= '</tbody></table>';
				
			$tax = ($subtotal*13)/100;
			$total = ($subtotal + $tax);
			
			$HTML.= '<table width="100%" border="0" cellspacing="0" cellpadding="10" bordercolor="#ccc" style="border-collapse:collapse; border:1px solid #ccc; margin-top:10px; text-align:right;">
          		<tr style="color:#333; font-weight:600;">
								<td><strong>Sub Total</strong></td>
								<td align="right">CA$'. number_format($sub_total,2).'</td>
							</tr>
							<tr>
								<td><strong>Tax</strong></td>
								<td align="right">CA$'. number_format($tax,2).'</td>
							</tr>
							<tr style="background: #2e9a0e;color: #fff;font-size:17px;font-weight: 600;">
								<td><strong>Grand Total</strong></td>
								<td align="right">CA$'. number_format($total,2).'</td>
							</tr>';
			$HTML.= '</table>';
			$HTML.= '</div>';
			
			$sql3 = "SELECT * FROM `tour_customers` WHERE order_id='".$orderId."' LIMIT 1;";
			$query3 = $conn->query($sql3);
			if($query3->num_rows > 0 ) {
				$model3 = $query3->fetch_object();
				$name 			= $model3->name;
				$email 			= $model3->email;
				$phone 			= $model3->phone;
				$auth_id		= $model3->auth_id;
			}
		}
		
    //include Stripe PHP library
    require_once('../stripe-php/init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => SECRET_KEY,
      "publishable_key" => PUBLISHABLE_KEY
    );
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
    
		try {
			
			$re = \Stripe\Refund::create(["charge" => $auth_id]);

			//retrieve charge details
			$chargeJson = $re->jsonSerialize();
			//echo '<pre>'; print_r($chargeJson); exit;
			
			if($chargeJson['id'] && $chargeJson['status']=="succeeded" && $chargeJson['object'] == 'refund') {
				$sql_2 = "UPDATE `tour_customers` SET `transaction_id`='".$chargeJson['balance_transaction']."', `status`='3' WHERE id=".$model3->id.";";
				$conn->query($sql_2);
				
				//sendMail( array($email, $name), 'Purchase '.$itemName, $HTML);
				//sendMail( array($email, $name), 'ToNiagara - Your booking request has been confirmed. Order ID - '.$orderID, $HTML);
				//sendMail( array(SITEEMAIL, SITENAME), 'Purchase '.$itemName, $HTML);
				
				//echo $HTML;
				//header('Location: '.APPROOT.'confirmation');
				//exit;
			}
			else {
				$statusMsg = '<p class="alert alert-danger">Transaction has been failed!</p>';
			}
		}
		catch (Exception $e) {
			$statusMsg = '<p class="alert alert-danger">'.$e->getMessage().'</p>';
			//echo '<pre>'; print_r($e);
		}
} 
else {
	$statusMsg = '<p class="alert alert-danger">Invalid order ID!</p>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Decline :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo APPROOT; ?>css/payment.css" rel="stylesheet" />
<?php require_once('includes/header.php'); ?>
<?php
echo "<script>
var dataLayer  = window.dataLayer || [];
dataLayer.push({
	'event': 'refund',
	'ecommerce': {
		'refund': {
		  	'actionField': {'id': '".$_GET['orderId']."'}
		}
	}
});
</script>";
?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W8WKKS2');</script>
<!-- End Google Tag Manager -->
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
                <li>Accept</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info">
							<!-- /agile_top_w3_grids-->
					   	<div class="agile_top_w3_grids">

<div class="reservation_wra">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        
        <?php echo str_replace("Stripe","",$statusMsg); $statusMsg=''; ?>
        
        <?php
				$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.price_type FROM `tour_customers` c, `tour_customer_detail` cd, `tour_tours` t WHERE c.id=cd.user_id AND c.order_id='".$orderId."' AND cd.tour_id=t.ID;";
				$query = $conn->query($sql);
				if($query->num_rows > 0 ) {
        	echo '<h2 class="booking_head" style="color:#f00">Booking amount has been refunded.</h2>';
					$subtotal = $sub_total = $tax = $total = 0;
					while($model = $query->fetch_object()) {
						$sub_total = $cnt = 0;
						
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
						
						/*if($model->adults) { $sub_total+= ($model->adults * $model->adults_price); $cnt+=$model->adults; }
						if($model->children) { $sub_total+= ($model->children * $model->children_price); $cnt+=$model->children; }
						if($model->seniors) { $sub_total+= ($model->seniors * $model->seniors_price); $cnt+=$model->seniors; }
						if($model->infants) { $sub_total+= ($model->infants * $model->infants_price); $cnt+=$model->infants; }*/
						if($model->add_ons_price) { $sub_total+= $model->add_ons_price; }
				?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="booking_tbl">
          <thead>
          <tr>
            <td colspan="2"><?=$model->title; ?> <span><?=strtoupper(date('D d M',strtotime($model->tour_date))); ?></span></td>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>
            <h3>CUSTOMER DETAILS</h3>
            <ul>
            <li><i class="fa fa-users"></i> <?=$cnt; ?> Reserved</li>	 
            <li><i class="fa fa-envelope"></i> <?=$model->email; ?></li>
            <li><i class="fa fa-phone"></i> <?=$model->phone; ?></li>
            </ul>
            </td>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
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
                <?php /*?><tr>
                  <td>Adults (<?php echo $model->adults; ?> × CA$<?php echo $model->adults_price; ?>)</td>
                  <td align="right">CA$<?php echo number_format(($model->adults*$model->adults_price),2); ?></td>
                </tr><?php */?>
                <?php } } if($model->children) { ?>
                <tr>
                  <td>Children (<?php echo $model->children; ?> × CA$<?php echo $model->children_price; ?>)</td>
                  <td align="right">CA$<?php echo number_format(($model->children*$model->children_price),2); ?></td>
                </tr>
                <?php } if($model->seniors) { ?>
                <tr>
                  <td>Seniors (<?php echo $model->seniors; ?> × CA$<?php echo $model->seniors_price; ?>)</td>
                  <td align="right">CA$<?php echo number_format(($model->seniors*$model->seniors_price),2); ?></td>
                </tr>
                <?php } if($model->infants) { ?>
                <tr>
                  <td>Infants (<?php echo $model->infants; ?> × CA$<?php echo $model->infants_price; ?>)</td>
                  <td align="right">CA$<?php echo number_format(($model->infants*$model->infants_price),2); ?></td>
                </tr>
                <?php } if($model->add_ons_price) { ?>
                <tr>
                  <td>Add-Ons</td>
                  <td align="right">CA$<?php echo number_format($model->add_ons_price,2); ?></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <td>Total</td>
                  <td align="right">CA$<?php echo number_format($sub_total,2); ?></td>
                </tr>
                </tfoot>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <h3>ADD-ONS PURCHASED</h3>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="booking_addon_tbl">
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
									<td><?php echo $model2->addons_title; ?></td>
									<td align="right">Qty	<?php echo $add_ons_nom[$k++]; ?></td>
								</tr>
								<?php } ?>
								<?php } ?>
              </table>
            </td>
          </tr>
          </tbody>  
        </table>
				<?php $subtotal+= ($sub_total - $model->add_ons_price); ?>
				<?php } ?>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="booking_total_tbl">
          <tr>
            <td>Total</td>
            <td align="right">CA$<?php echo number_format($subtotal,2); ?></td>
          </tr>
          <?php $tax = ($subtotal*13)/100; ?>
          <tr>
            <td>HST Ontario (13%)</td>
            <td align="right">CA$<?php echo number_format($tax,2); ?></td>
          </tr>
          <?php $total = ($subtotal + $tax); ?>
          <tr>
            <td>Grand Total</td>
            <td align="right">CA$<?php echo number_format($total,2); ?></td>
          </tr>
          
        </table>
        <?php } ?>
      </div>
    </div> 
  </div>
</div>
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