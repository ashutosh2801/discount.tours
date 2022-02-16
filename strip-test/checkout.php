<?php
require_once('includes/config.php');
require_once('includes/functions.php');
$sessionId = session_id();

$statusMsg='';
$HTML = '';
//check whether stripe token is not empty
if(!empty($_POST['stripeToken']))
{
		$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb FROM `tour_customers` c, `tour_customer_detail` cd, tour_tours t WHERE c.id=cd.user_id AND c.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
		$query = $conn->query($sql);
		if($query->num_rows > 0 ) {
			
			$subtotal = $sub_total = $tax = $cnt = $total = 0;
			$tour_title = array();
			
			$HTML.= '<table width="100%" border="0" cellspacing="0" cellpadding="15" bordercolor="#ccc" style="border-collapse:collapse; border:1px solid #ccc;">';
			while($model = $query->fetch_object()) {
				if($model->adults) { $subtotal+=($model->adults*$model->adults_price); $cnt+=$model->adults; }
				if($model->children) { $subtotal+=($model->children*$model->children_price); $cnt+=$model->children; }
				if($model->seniors) { $subtotal+=($model->seniors*$model->seniors_price); $cnt+=$model->seniors; }
				if($model->infants) { $subtotal+=($model->infants*$model->infants_price); $cnt+=$model->infants; }
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
									<td><img src="https://www.toniagara.com/images/email/user.png" alt="user.png"> '.$cnt.' Reserved</td>
								</tr>
								<tr>
									<td><img src="https://www.toniagara.com//images/email/mail.png" alt="user.png"> <a href="mailto:'.$model->email.'" style="color:#666; text-decoration:none;">'.$model->email.'</a></td>
								</tr>
								<tr>
									<td><img src="https://www.toniagara.com//images/email/call.png" alt="user.png"> '.$model->phone.'</td>
								</tr>
							</table>
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
					
				$sub_total+= $subtotal;
			}
			
			$HTML.= '</tbody></table>';
				
			$tax = ($subtotal*13)/100;
			$total = ($subtotal + $tax);
			
			$HTML.= '<table width="100%" border="0" cellspacing="0" cellpadding="10" bordercolor="#ccc" style="border-collapse:collapse; border:1px solid #ccc; margin-top:15px; text-align:right;">
          <tr style="color:#333; font-weight:600;">
            <td style="padding:10px 10px 0 10px">Total</td>
            <td style="padding:10px 10px 0 10px">CA$ '. number_format($sub_total).' <sup><u>'. substr(number_format($sub_total,2),-2).'</u></sup></td>
          </tr>
          <tr>
            <td>HST Ontario (13%)</td>
            <td>CA$'. number_format($tax,2).'</td>
          </tr>
          <tr style="background: #2e9a0e;color: #fff;font-size:17px;font-weight: 600;">
            <td>Grand Total</td>
            <td>CA$ '. number_format($total).' <sup><u>'. substr(number_format($total,2),-2).'</u></sup></td>
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
		
    //get token, card and user info from the form
    $token  				= $_POST['stripeToken'];
    $card_num 			= str_replace(" ","",$_POST['card_num']);
    $card_cvc 			= $_POST['cvc'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year 	= $_POST['exp_year'];
    
    //include Stripe PHP library
    require_once('stripe-php/init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => SECRET_KEY,
      "publishable_key" => PUBLISHABLE_KEY
    );
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
		
		/*try {
		$result = \Stripe\Token::create(
									array(
											"card" => array(
													//"name" => $user['name'],
													"number" => ($card_num),
													"exp_month" => $card_exp_month,
													"exp_year" => $card_exp_year,
													"cvc" => ($card_cvc),
													"cvc" => ($card_cvc)
											)
									)
							);
		
		$token = $result['id'];
		echo '<pre>'; print_r($result); exit;*/
		
		try {
    
			//add customer to stripe
			$customer = \Stripe\Customer::create(array(
					'email' => $email,
					'source'  => $token
			));
			
			//item information
			$itemName 	= implode(", ", $tour_title);
			$itemNumber = $item_number;
			$itemPrice 	= round($total,2) * 100;
			$currency 	= "CAD";
			$orderID 		= $order_id;
			
			//charge a credit or a debit card
			$charge = \Stripe\Charge::create(array(
					'customer' => $customer->id,
					'amount'   => $itemPrice,
					'currency' => $currency,
					'description' => $itemName,
					'capture' => false,
					'metadata' => array(
							'order_id' => $orderID
					)
			));
			
			//retrieve charge details
			$chargeJson = $charge->jsonSerialize();
			
			//echo '<pre>'; print_r($chargeJson); exit;
			
			if($chargeJson['id'] && $chargeJson['status']=="succeeded" && $chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == '') {
				$sql_2 = "UPDATE `tour_customers` SET `auth_id`='".$chargeJson['id']."', `status`='1' WHERE id=".$model3->id.";";
				$conn->query($sql_2);
				
				$client_msg.= '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1em;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img src="https://www.toniagara.com//images/logo.png" alt="logo.png" height="55"></td>
  </tr>
  <tr>
    <td>
    <h3 align="center">Your booking request has been received.</h3>
    <p align="center">Your booking request has been received, but has not been confirmed. We will review the booking and confirm its status as soon as possible. Your credit card will not be charged until the booking is confirmed. The charge on your credit card statement will appear as "TONIAGARA".</p>
    </td>
  </tr>
</table>'.$HTML.'<div style="font-size:13px;text-align:right; padding-top:5px;">Booking ID: '.$orderID.'</div></div>';
				
				sendMail( array($email, $name), 'ToNiagara - Your booking request has been received. Order ID - '.$orderID, $client_msg);
				
				$admin_msg.= '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1em;">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td colspan="2" align="center"><img src="https://www.toniagara.com//images/logo.png" alt="logo.png" height="55"></td>
  </tr>
  <tr>
    <td width="50%" style="background:green;"><a style="color:#fff;display:block; text-align:center; text-decoration:none;" href="https://www.toniagara.com/admin/accept.php?orderId='.$orderID.'">Accept</a></td>
	<td width="50%" style="background:red;"><a style="color:#fff; display:block; text-align:center; text-decoration:none;" href="https://www.toniagara.com/admin/decline.php?orderId='.$orderID.'">Decline</a></td> 
  </tr>
</table>


'.$HTML.'<div style="font-size:13px;text-align:right; padding-top:5px;">Booking ID: '.$orderID.'</div>
</div>';

				sendMail( array(SITEEMAIL, SITENAME), 'ToNiagara - New booking. Order ID - '.$orderID, $admin_msg);
				sendMail( array('ashutosh2801@gmail.com', SITENAME), 'ToNiagara - New booking. Order ID - '.$orderID, $admin_msg);
				//sendMail( array('designer.webguru@gmail.com', SITENAME), 'ToNiagara - New booking. Order ID - '.$orderID, $admin_msg);
				
				//echo $HTML;
				header('Location: '.APPROOT.'confirmation');
				//header('Location: '.APPROOT.'checkout');
				exit;
			}
			else {
				$statusMsg = '<p class="error">Transaction has been failed!</p>';
			}
		}
		catch (Exception $e) {
			$statusMsg = '<p class="error">'.$e->getMessage().'</p>';
			//echo '<pre>'; print_r($e);
		}
}

if($_GET['id'] && $_GET['act']=='remove')
{
	$sql = "DELETE FROM `tour_customer_detail` WHERE cid=".$_GET['id'].";";
	if($conn->query($sql)) {
		$statusMsg = '<p class="error">Product has been deleted. <a href="/tours">Click here to continue shopping.</a>?</p>';
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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0">
<title>Checkout | ToNiagara - Toronto to Niagara Falls Tours</title>
<meta name="description" content="Best Toronto to Niagara Falls Sightseeing Tours. Niagara Falls Tours &amp; Attractions With Special offers! Toll-Free +1 800-653-2242"/>
<meta name="keywords" content="Best Niagara Falls Sightseeing Tours, Tour Packages, Day Tour, Evening Tour, Small Group Custom Tour, Private Tour, Group Tours"/>
<link rel="canonical" href="<?=SITEURL;?>/cart" />
<link href="<?php echo APPROOT; ?>css/payment.css" rel="stylesheet" />
<?php include 'inner_header.php';?>

<form action="" method="POST" id="paymentFrm" autocomplete="off">
<div class="reservation_wra">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="pay_head1">CHECKOUT</h3>
        <div class="pay_step">
          <div class="pay_progress1">
          <div class="pay_step_box act"><span>1</span><br>Booking Detail</div>
          <div class="pay_step_box act"><span>2</span><br>Checkout</div>
          <div class="pay_step_box"><span>3</span><br>Confirmation</div>
          </div>
        </div>      
      </div>
    </div>
    <?php echo str_replace("Stripe","",$statusMsg); $statusMsg=''; ?>
    <?php
		$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb FROM `tour_customers` c, `tour_customer_detail` cd, `tour_tours` t WHERE c.id=cd.user_id AND cd.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
		$query = $conn->query($sql);
		if($query->num_rows > 0 ) {
			$subtotal = $sub_total = $tax = $total = 0;
			while($model = $query->fetch_object()) {
				$url = tour_urlMap('tours', $model->slug);
				$thumb = tour_thumb($model->tour_thumb);
				$sub_total = $cnt = 0;
				
				if($model->adults) { $sub_total+= ($model->adults*$model->adults_price); $cnt+=$model->adults; }
				if($model->children) { $sub_total+= ($model->children*$model->children_price); $cnt+=$model->children; }
				if($model->seniors) { $sub_total+= ($model->seniors*$model->seniors_price); $cnt+=$model->seniors; }
				if($model->infants) { $sub_total+= ($model->infants*$model->infants_price); $cnt+=$model->infants; }
		?>
    <div class="checkout_wra">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="pay_tour_img"><a href="<?php echo $url;?>"><img itemprop="image" src="<?php echo $thumb;?>?ver=4" alt="<?php echo $model->tour_thumb;?>" class="img-res"></a></div>
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
                  <td><i class="fa fa-calendar"></i> <?php echo date('d M Y', strtotime($model->tour_date));?></td>
                  <td><i class="fa fa-phone"></i> <?php echo $model->phone;?></td>
                </tr>
              </table>
              <div class="pay_modify"><a class="remove" onClick="return confirm('Are you sure?');" href="<?php echo APPROOT; ?>checkout?id=<?php echo $model->cid;?>&act=remove"><i class="fa fa-trash"></i> Remove</a> <a class="modify" href="<?php echo APPROOT; ?>cart?id=<?php echo $model->ID;?>"><i class="fa fa-pencil"></i> Modify</a></div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="pay_price_tbl">
            <?php if($model->adults) { ?>
            <tr>
              <td>Adults (<?php echo $model->adults; ?> × CA$<?php echo $model->adults_price; ?>)</td>
              <td align="right">CA$<?php echo number_format(($model->adults*$model->adults_price),2); ?></td>
            </tr>
            <?php } if($model->children) { ?>
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
              <td align="right">CA$<?php echo number_format(($add_ons_nom[$k++]*$model2->addons_price),2); ?></td>
            </tr>
            <?php } ?>
            <?php } ?>
            <?php $subtotal+= $sub_total; ?>
            <tr>
              <td><strong>Sub Total</strong></td>
              <td align="right">CA$<?php echo number_format($sub_total,2); ?></td>
            </tr>
            
          </table>
  
        </div>
      </div>
    </div>
    <?php } ?>
    
    <div class="pay_card_wra">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-push-6 col-md-push-6 col-sm-push-6">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="pay_total">
          <tr>
            <td>Total</td>
            <td align="right">CA$<?=number_format($subtotal); ?> <sup><?=substr(number_format($subtotal,2),-2); ?></sup></td>
          </tr>
          <?php $tax = ($subtotal*13)/100; ?>
          <tr>
            <td>Taxes & fees (13%)</td>
            <td align="right">CA$<?=number_format($tax); ?> <sup><?=substr(number_format($tax,2),-2); ?></sup></td>
          </tr>
          <?php $total = ($subtotal + $tax); ?>
          <tr>
            <td>Grand Total</td>
            <td align="right">CA$<?=number_format($total); ?> <sup><?=substr(number_format($total,2),-2); ?></sup></td>
          </tr>
        </table>

      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-pull-6 col-md-pull-6 col-sm-pull-6">
        <h2 class="pay_head2">CREDIT CARD DETAILS</h2>
        
        <p class="payment-status"></p>
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="form-group">
            <input type="tel" name="card_num" id="card_number" placeholder="Card Number" class="card_number" required maxlength="19" autocomplete="off" value="" />
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          	<div class="form-group">
            <input type="password" name="cvc" id="cvc" placeholder="Security Code" class="card_secu" required maxlength="3" autocomplete="off" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="form-group">
        Expires
        <select class="card_mnth" name="exp_month" id="exp_month" required>
          <option value="">Month</option><option value="1">01 Jan</option><option value="2">02 Feb</option><option value="3">03 Mar</option><option value="4">04 Apr</option><option value="5">05 May</option><option value="6">06 Jun</option><option value="7">07 Jul</option><option value="8">08 Aug</option><option value="9">09 Sep</option><option value="10">10 Oct</option><option value="11">11 Nov</option><option value="12">12 Dec</option>
      </select>
        <select class="card_mnth" name="exp_year" id="exp_year" required>
          <option value="">Year</option>
          <?php for($i=date('Y'); $i<=(date('Y') + 10); $i++) { ?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php } ?>
      </select>
      
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code" class="card_zip" required maxlength="6" autocomplete="off" />
          </div>
        </div>
        
      </div>
      
    </div>
    </div>
    
    <?php } ?>
  </div>
</div>

<div class="pay_row_wra">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-push-6 col-md-push-6 col-sm-push-6">
        <div class="pay_btn_final">
          <button id="payBtn" type="submit"><i class="fa fa-cart-arrow-down"></i> Pay CA$<?php echo round($total,2); ?></button>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-pull-6 col-md-pull-6 col-sm-pull-6">
        <div class="pay_back_btn">
        <a onClick="window.history.back()">Back</a> <a href="<?php echo APPROOT; ?>/tours">Continue Shopping</a>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
<?php include 'footer.php';?>
<script src="<?php echo APPROOT; ?>js/jquery.creditCardValidator.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('<?php echo PUBLISHABLE_KEY; ?>');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
				
				var str = response.error.message;
				var str = str.replace("exp_year", "Year");
				var str = str.replace("exp_month", "Month");

        $(".payment-status").addClass('error').html(str);
    } else {
				$(".payment-status").removeClass('error');
				
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            name: '<?php echo $user_result->name; ?>',
            number: $('#card_number').val(),
            cvc: $('#cvc').val(),
            exp_month: $('#exp_month').val(),
            exp_year: $('#exp_year').val(),
						address_zip: $('#postal_code').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
		
		$('#card_number').validateCreditCard(function(result) {
			result.card_type == null ? '-' : $(this).addClass(result.card_type.name+' '+result.luhn_valid);				
		});
		
		/*$('#card_number').bind('keyup','keydown', function(event) {
			var inputLength = event.target.value.length;
			if (event.keyCode != 8){
				if(inputLength === 4 || inputLength === 9 || inputLength === 14){
					var thisVal = event.target.value;
					thisVal += ' ';
					$(event.target).val(thisVal);
				}
			}
		})*/
		
});
</script>
</body>
</html>
