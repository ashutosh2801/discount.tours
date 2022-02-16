<?php
require_once('includes/config.php');
require_once('includes/functions.php');
$sessionId = session();

if(!empty($_GET['token']))
$_SESSION['session_id'] = $_GET['token'];

$statusMsg='';
$HTML = '';
$discount = $people = $not = 0;
//check whether stripe token is not empty
if(!empty($_POST['stripeToken']))
{
		$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.currency, t.price_type, t.gratuity, t.price_type, t.adults_text, t.adults_label, t.children_label, t.seniors_label, t.infants_label FROM `tour_customers` c, `tour_customer_detail` cd, tour_tours t WHERE c.id=cd.user_id AND c.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
		$query = $conn->query($sql);
		if($query->num_rows > 0 )
		{
			$not = $query->num_rows;
			$subtotal = $sub_total = $tax = $cnt = $total = $gratuity = 0;
			$tour_title = array();
			$tour_id = 0;

			$HTML.= '<table width="100%" border="0" cellspacing="0" cellpadding="15" bordercolor="#ccc" style="border-collapse:collapse; border:1px solid #ccc;">';
			while($model = $query->fetch_object()) {

				$subtotal = $cnt = 0;

				$adults_price 	= $adults = 0;
				$children_price = $children = 0;
				$seniors_price 	= $seniors = 0;
				$infants_price 	= $infants = 0;

				$tour_id = $model->ID;

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

				//$tour_title[]= $model->title;
				$tour_date = strtoupper(date('D d M',strtotime($model->tour_date))).' '.$model->tour_time;

				$HTML.= '<thead bgcolor="#e8e8e8"><tr><td colspan="2" style="font-size:16px; text-align:center;">'.$model->title.' <span style="color:#0078de;">'.strtoupper(date('D d M',strtotime($model->tour_date))).' '.$model->tour_time.'</span></td></tr></thead><tbody>';

					$HTML.= '<tr><td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2"><tr><td style="color:#0078de; padding-bottom:5px;">CUSTOMER DETAILS</td></tr><tr><td> <strong>'.$model->name.'</strong> </td></tr><tr><td><img src="https://www.toniagara.com/images/email/mail.png" alt="user.png"> <a href="mailto:'.$model->email.'" style="color:#666; text-decoration:none;">'.$model->email.'</a></td></tr><tr><td><img src="https://www.toniagara.com/images/email/call.png" alt="user.png"> '.$model->phone.'</td></tr><tr><td><img src="https://www.toniagara.com/images/email/user.png" alt="user.png"> '.$cnt.' Reserved</td></tr></table></td><td><table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody style="line-height:24px;">';

				$price_text = '';
				if($model->adults) {
					if($model->price_type=='person') {
						$price_text.= ', Adults ('.$model->adults.' × CA$'. $model->adults_price . ') - '. number_format(($model->adults * $model->adults_price),2);
						$HTML.= '<tr>
							<td>Adults ('.$model->adults.' × CA$'. $model->adults_price.')</td>
							<td align="right">CA$'. number_format(($model->adults * $model->adults_price),2).'</td>
						</tr>';
					}
					else if($model->price_type=='group') {
						$price_text.= ', Number of Guests ('.$model->adults.') - '. number_format($model->adults_price,2);
						$HTML.= '<tr>
							<td>Number of Guests ('.$model->adults.')</td>
							<td align="right">CA$'. number_format($model->adults_price,2).'</td>
						</tr>';
					}
				} if($model->children) {
					$price_text.= ', Children ('. $model->children.' × CA$'. $model->children_price.') - '. number_format(($model->children * $model->children_price),2);
					$HTML.= '<tr>
						<td>Children ('. $model->children.' × CA$'. $model->children_price.')</td>
						<td align="right">CA$'. number_format(($model->children * $model->children_price),2).'</td>
					</tr>';
				} if($model->seniors) {
					$price_text.= ', Seniors ('. $model->seniors.' × CA$'. $model->seniors_price.') - '. number_format(($model->seniors * $model->seniors_price),2);
					$HTML.= '<tr>
						<td>Seniors ('. $model->seniors.' × CA$'. $model->seniors_price.')</td>
						<td align="right">CA$'. number_format(($model->seniors * $model->seniors_price),2).'</td>
					</tr>';
				} if($model->infants) {
					$price_text.= ', Infants ('. $model->infants.') - Free';
					$HTML.= '<tr>
						<td>Infants ('. $model->infants.')</td>
						<td align="right">Free</td>
					</tr>';
				}

				$sql2 = "SELECT * FROM `tour_add_ons` WHERE addons_id IN (".$model->add_ons.");";
				$query2 = $conn->query($sql2);
				if($query2->num_rows > 0 ) {
					$k = 0;
					$add_ons_nom = explode(",",$model->add_ons_nom);
					while($model2 = $query2->fetch_object()) {
						$subtotal+=($add_ons_nom[$k] * $model2->addons_price);

						$price_text.= ', '.$model2->addons_title.' ('. $add_ons_nom[$k].' × CA$ '.$model2->addons_price.') CA$'. number_format(($add_ons_nom[$k]*$model2->addons_price),2);
						$HTML.= '<tr>
              <td>'. $model2->addons_title.' ('. $add_ons_nom[$k].' × CA$ '.$model2->addons_price.')</td>
              <td align="right">CA$'. number_format(($add_ons_nom[$k]*$model2->addons_price),2).'</td>
            </tr>';
						$k++;
					}
				}

				$sub_total+= $subtotal;
				$tax+= $model->tax;
				$gratuity+= $model->gratuity_amt;
				$convenience_fee+= $model->convenience_fee;

				$tour_title[]= $model->title.' - '.$tour_date.' '.$price_text;

				$HTML.= '</tbody><tfoot style="color:#333; font-weight:600;">';

				$HTML.= '<tr>
									 <td style=" border-top:1px solid #ccc; padding-top:5px;"><strong>Total</strong></td>
									 <td style=" border-top:1px solid #ccc;" align="right">CA$'. number_format($subtotal,2).'</td>
								 </tr>';

				$HTML.= '</tfoot>
              </table>
            </td>
          	</tr>';


			  	$sql20 = "SELECT * FROM `tour_customer_attendees` WHERE sessionId = '".$sessionId."'";
				$query20 = $conn->query($sql20);
				if($query20->num_rows > 0 ) {
					$HTML.= '<tr style="border-top:1px solid #ccc;">
						<td colspan="2" style="margin:0 0 10px 0; color:#0078de;">
							Guest Details
						</td>
					</tr>
					<tr>
    					<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="2" style="text-align:left;">';
					$k = 0;
					while($model20 = $query20->fetch_object()) {
						$lable='';
						if($model20->type=='adults') {
							$lable = $model->price_type=='group'?$model->adults_text:$model->adults_label.' Traveler ' . $model20->num;
						}
						else if($model20->type=='children') {
							$lable = $model->children_label.' Traveler ' .  $model20->num;
						}
						else if($model20->type=='seniors') {
							$lable = $model->seniors_label.' Traveler ' .  $model20->num;
						}
						else if($model20->type=='infants') {
							$lable = $model->infants_label.' Traveler ' .  $model20->num;
						}

						$HTML.= '<tr>
									<td style="padding-right:20px;">'.$lable.'</td>
									<td align="right">'. $model20->name .'</td>
								</tr>';
					}
					$HTML.= '</table></td></tr>';
				}

//echo $HTML; exit;

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

			if(!empty($_GET['promo']) && ($not==1)) {
				$promo = addslashes($_GET['promo']);
				$discount = discount($conn, $promo, $subtotal);
				if($discount>0) {
					$d 						= ($subtotal - $discount);
					//$tax 					= ($d	* 13)/100;
					//$gratuity 		= ($d	* $gratuity)/100;
					$total = ($d + $tax + $gratuity + $convenience_fee);
				}
			}
			else {
				$total = ($sub_total + $tax + $gratuity + $convenience_fee);
			}

			list($whole, $decimal) = explode('.', number_format($sub_total,2));
			$HTML.= '<table width="100%" border="0" cellspacing="0" cellpadding="10" bordercolor="#ccc" style="border-collapse:collapse; border:1px solid #ccc; margin-top:15px; text-align:right;">
          <tr style="color:#333; font-weight:600;">
            <td style="padding:10px 10px 0 10px">Total</td>
            <td style="padding:10px 10px 0 10px">CA$ '. $whole.' <sup><u>'. $decimal .'</u></sup></td>
          </tr>';
			
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

			//get token, card and user info from the form
    	$name		= $_POST['checkout2_name'];
			$token  				= $_POST['stripeToken'];
			$card_num 			= str_replace(" ","",$_POST['card_num']);
			$card_cvc 			= $_POST['cvc'];
			$card_exp_month = $_POST['exp_month'];
			$card_exp_year 	= $_POST['exp_year'];
			$str = "$name - Order ID - $order_id: ".implode(",",$tour_title);
			$tax_flag = 0;

			if($discount) {
				$str.= ', Discount - CA$'.number_format($discount,2);
				list($whole, $decimal) = explode('.', number_format($discount,2));
      	$HTML.= '<tr style="color:#f00;">
            <td>Discount</td>
            <td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
          </tr>';
			}
			if($tax) {
				$tax_flag = 1;
				$str.= ', Taxes & fees (13%) - CA$'.number_format($tax,2);
				list($whole, $decimal) = explode('.', number_format($tax,2));
      	$HTML.= '<tr>
            <td>Taxes & fees (13%)</td>
            <td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
          </tr>';
			}
			if($gratuity) {
				$str.= ', Gratuity - CA$'.number_format($gratuity,2);
				list($whole, $decimal) = explode('.', number_format($gratuity,2));
      	$HTML.= '<tr>
            <td>Gratuity</td>
            <td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
          </tr>';
			}
			if($convenience_fee) {
				$str.= ', Convenience fee - CA$'.number_format($convenience_fee,2);
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
		}

		if($tax_flag==1) {
			$str.= ". Business number: 707676698 RT0001";
		}
		
		//echo $str; exit;

    //include Stripe PHP library
    require_once('stripe-php/init.php');

    //set api key
    $stripe = array(
      "secret_key"      => SECRET_KEY,
      "publishable_key" => PUBLISHABLE_KEY
	);
	
	/*$stripe = array(
		"secret_key"      => TEST_SECRET_KEY,
		"publishable_key" => TEST_PUBLISHABLE_KEY
	);*/

    \Stripe\Stripe::setApiKey($stripe['secret_key']);

		try {

			//add customer to stripe
			$customer = \Stripe\Customer::create(array(
					'name' => $name,
					'email' => $email,
					'source'  => $token
			));

			//item information
			$itemName 	= $str;
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
					'receipt_email' => $email,
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

				if($discount>0) {
					$sql_3 = "UPDATE `tour_customer_detail` SET `subtotal`='$subtotal', `discount`='$discount', tax='$tax', gratuity_amt='$gratuity', convenience_fee='$convenience_fee', total='$total', coupon='$promo' WHERE user_id=".$model3->id.";";
					$conn->query($sql_3);
				}

				$client_msg.= '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1em;"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><img src="https://www.toniagara.com/images/logo.png" alt="logo.png" height="55"></td></tr><tr><td><h3 align="center">Your booking request has been received.</h3><p align="center">Your booking request has been received, but has not been confirmed. We will review the booking and confirm its status as soon as possible. Your credit card will not be charged until the booking is confirmed. The charge on your credit card statement will appear as "TONIAGARA".</p></td></tr></table>'.$HTML.'<div style="font-size:13px;text-align:right; padding-top:5px;">Booking ID: '.$orderID.'</div></div>';

				if($tour_id!=9) {
					sendMail( array($email, $name), 'ToNiagara - Your booking request has been received. Order ID - '.$orderID, $client_msg);
				}

				$admin_msg.= '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1em;"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td colspan="2" align="center"><img src="https://www.toniagara.com/images/logo.png" alt="logo.png" height="55"></td></tr><tr><td width="50%" style="background:green;"><a style="color:#fff;display:block; text-align:center; text-decoration:none;" href="https://www.toniagara.com/admin/accept.php?orderId='.$orderID.'">Accept</a></td><td width="50%" style="background:red;"><a style="color:#fff; display:block; text-align:center; text-decoration:none;" href="https://www.toniagara.com/admin/decline.php?orderId='.$orderID.'">Decline</a></td></tr></table>'.$HTML.'<div style="font-size:13px;text-align:right; padding-top:5px;">Booking ID: '.$orderID.'</div></div>';

				sendMail( array(SITEEMAIL, SITENAME), 'ToNiagara - New booking. Order ID - '.$orderID, $admin_msg);
				sendMail( array('ashutosh2801@gmail.com', SITENAME), 'ToNiagara - New booking. Order ID - '.$orderID, $admin_msg);

				//echo $HTML;
				$url_string = json_decode($model3->url_string);
				if( isset($_COOKIE['cjevent']) && !empty($url_string->cjevent) ) {
					header('Location: '.APPROOT.'confirmation?cjevent='.$url_string->cjevent.'&batcheventID='.$url_string->batcheventID.'&utm_campaign='.$url_string->utm_campaign.'&utm_medium='.$url_string->utm_medium.'&utm_source='.$url_string->utm_source);
				}
				else
				header('Location: '.APPROOT.'confirmation');
				exit;
			}
			else {
				$statusMsg = '<p class="danger">Transaction has been failed!</p>';
				$_SESSION['statusMsg'] = $statusMsg;
			}
		}
		catch (Exception $e) {
			$statusMsg = '<p class="danger">'.$e->getMessage().'</p>';
			$_SESSION['statusMsg'] = $statusMsg;
		}
}

if(!empty($_GET['id']) && !empty($_GET['cid']) && $_GET['act']=='remove')
{

	$sql22 = "SELECT * FROM `tour_customer_detail` WHERE cid=".$_GET['cid'].";";
	$query22 = $conn->query($sql22);
	if($query22->num_rows > 0 ) {
		$model22 = $query22->fetch_object();
		$productObj = array(
			'id' 		=> $model22->ID, 
			'name' 		=> $model22->title,
			'price' 	=> $model22->adults_price,
			'duration' 	=> $model22->duration,
			'category' 	=> $model22->category,
			'quantity'	=> $model22->adults
		);
	}

	$sql = "DELETE FROM `tour_customer_detail` WHERE cid=".$_GET['cid'].";";
	if($conn->query($sql)) {

		$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title,, t.category, t.slug, t.tour_thumb, t.currency FROM `tour_customers` c, `tour_customer_detail` cd, `tour_tours` t WHERE c.id=cd.user_id AND cd.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
		$query = $conn->query($sql);
		if($query->num_rows > 0 ) {
			$statusMsg = '<p class="danger">Product has been deleted.</p>';
		}
		else {
			$sql2 = "DELETE FROM `tour_customers` WHERE id=".$_GET['id'].";";
			$conn->query($sql2);
			$statusMsg = '<p class="danger">Product has been deleted. <a href="/tours">Click here to continue shopping.</a></p>';
		}
		$_SESSION['statusMsg'] = $statusMsg;
		header('Location: '.APPROOT.'checkout');
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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0">
<title>Checkout | ToNiagara - Toronto to Niagara Falls Tours</title>
<meta name="description" content="Best Toronto to Niagara Falls Sightseeing Tours. Niagara Falls Tours &amp; Attractions With Special offers! Toll-Free +1 800-653-2242"/>
<meta name="keywords" content="Best Niagara Falls Sightseeing Tours, Tour Packages, Day Tour, Evening Tour, Small Group Custom Tour, Private Tour, Group Tours"/>
<link rel="canonical" href="<?=SITEURL;?>/checkout" />
<link href="<?php echo APPROOT; ?>css/payment.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo APPROOT; ?>strip-test/css/base.css" data-rel-css="">
<link rel="stylesheet" type="text/css" href="<?php echo APPROOT; ?>strip-test/css/stripe-v3.css" data-rel-css="">
<script src="https://js.stripe.com/v3/"></script>
<script src="<?php echo APPROOT; ?>strip-test/js/index.js" data-rel-js=""></script>
<?php include 'inner_header.php';?>

<?php
echo "<script>
var dataLayer  = window.dataLayer || [];
dataLayer.push({
	'event': 'removeFromCart',
	'ecommerce': {
		'currencyCode': 'CAD',
		'remove': {
			'products': ".json_encode($productObj)."
		}
	}
});
</script>";
$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.currency, t.price_type, t.gratuity, t.original_price FROM `tour_customers` c, `tour_customer_detail` cd, `tour_tours` t WHERE c.id=cd.user_id AND cd.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
$query = $conn->query($sql);
if($query->num_rows > 0 ) {
	$not = $query->num_rows;
?>
<div class="cardForm" id="example-2">
<form action="" method="POST" id="form_checkout">
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
    <?php //echo str_replace("Stripe","",$statusMsg); $statusMsg=''; ?>
    <?php echo str_replace("Stripe","",$_SESSION['statusMsg']); $_SESSION['statusMsg']=''; ?>
    <?php
		//$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.currency, t.price_type FROM `tour_customers` c, `tour_customer_detail` cd, `tour_tours` t WHERE c.id=cd.user_id AND cd.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
		//$query = $conn->query($sql);
		//if($query->num_rows > 0 ) {
			$subtotal = $sub_total = $tax = $total = $cflag = $original_price = 0;
			while($model = $query->fetch_object()) {

				$url = tour_urlMap('tours', $model->slug);
				$thumb = tour_thumb($model->tour_thumb);
				$tour_detail = tour_detail($conn, $model->tour_id);
				$sub_total = $cnt = 0;

				if($model->currency=='US') { $cflag=1; }
				if($model->original_price>0) { $original_price=1; } else { $original_price = 0; }

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

				$quantity = ($adults + $children + $seniors + $infants);

				$productObj = array(
					'id' 		=> $model->ID, 
					'name' 		=> $model->title,
					'price' 	=> $sub_total,
					'duration' 	=> $model->duration,
					'category' 	=> $model->category,
					'quantity'	=> $quantity
				);

				$dataLayer[] = $productObj;

echo "<script>
var dataLayer  = window.dataLayer || [];
dataLayer.push({
	'event': 'addToCart',
	'ecommerce': {
		'currencyCode': 'CAD',
		'add': {
		'products': [{
				'name': '".$model->title."',
				'id': '".$model->ID."',
				'price': '".$sub_total."',
				'category': '".$model->category."',
				'quantity': '".$adults."'
			}]
		}
	}
});
</script>";
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
						<td><i class="fa fa-phone"></i> <?php echo $model->phone;?></td>
						<td><i class="fa fa-calendar"></i> <?php echo date('d M Y', strtotime($model->tour_date));?> <?php echo $model->tour_time;?></td>
						</tr>
					</table>
					<div class="pay_modify"><a class="remove" onClick="return confirm('Are you sure?');" href="<?php echo APPROOT; ?>checkout?id=<?php echo $model->id;?>&cid=<?php echo $model->cid;?>&act=remove"><i class="fa fa-trash"></i> Remove</a> <a class="modify" href="<?php echo APPROOT; ?>cart?id=<?php echo $model->ID;?>"><i class="fa fa-pencil"></i> Modify</a></div>
					</div>
				</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="pay_price_tbl">
					<?php if($model->adults) { $people+= $model->adults; ?>
					<?php if($model->price_type=='person') { ?>
					<tr>
					<td><?php echo trim($tour_detail->adults_label)?$tour_detail->adults_label:'Number of Guests'?> (<?php echo $model->adults; ?> × CA$<?php echo $model->adults_price; ?>)</td>
					<td align="right">CA$<?php echo number_format(($model->adults * $model->adults_price),2); ?></td>
					</tr>
					<?php } else if($model->price_type=='group') { ?>
					<tr>
					<td>Number of Guests (<?php echo $model->adults; ?>)</td>
					<td align="right">CA$<?php echo number_format($model->adults_price,2); ?></td>
					</tr>
					<?php }
					} if($model->children) { $people+= $model->children; ?>
					<tr>
					<td>Children (<?php echo $model->children; ?> × CA$<?php echo $model->children_price; ?>)</td>
					<td align="right">CA$<?php echo number_format(($model->children * $model->children_price),2); ?></td>
					</tr>
					<?php } if($model->seniors) { $people+= $model->seniors; ?>
					<tr>
					<td><?php echo trim($tour_detail->seniors_label)?$tour_detail->seniors_label:'Seniors'?> (<?php echo $model->seniors; ?> × CA$<?php echo $model->seniors_price; ?>)</td>
					<td align="right">CA$<?php echo number_format(($model->seniors * $model->seniors_price),2); ?></td>
					</tr>
					<?php } if($model->infants) { ?>
					<tr>
					<td>Infants (<?php echo $model->infants; ?>)</td>
					<td align="right">Free</td>
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
					<td align="right">CA$<?php echo number_format(($add_ons_nom[$k++] * $model2->addons_price),2); ?></td>
					</tr>
					<?php } ?>
					<?php } ?>

								<?php $subtotal+= $sub_total; ?>
					<?php $tax+= $model->tax; ?>
					<?php $gratuity_amt+= $model->gratuity_amt; ?>
					<?php $convenience_fee = $model->convenience_fee; ?>
					<tr>
					<td><strong>Sub Total</strong></td>
					<td align="right">CA$<?php echo number_format($sub_total,2); ?></td>
					</tr>
				</table>
				</div>
			</div>
		</div>
		<?php } ?>


		<?php
          $sql20 = "SELECT * FROM `tour_customer_attendees` WHERE sessionId = '".$sessionId."'"; 
				$query20 = $conn->query($sql20);
				if($query20->num_rows > 0 ) { ?>
					<tr style="border-top:1px solid #ccc;border-bottom:1px solid #ccc;">
						<td colspan="2" style="margin:0 0 10px 0; color:#0078de;">
						<h2 class="pay_head2">Guest Details</h2>
						</td>
					 </tr>
					<tr>
    					<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="2" style="text-align:left;" class="pay_price_tbl">
							<?php
							$k = 0;
							while($model20 = $query20->fetch_object()) {
								$lable='';
								if($model20->type=='adults') {
									$lable = $tour_detail->price_type=='group'?$tour_detail->adults_text:$tour_detail->adults_label.' Traveler ' . $model20->num;
								}
								else if($model20->type=='children') {
									$lable = $tour_detail->children_label.' Traveler ' .  $model20->num;
								}
								else if($model20->type=='seniors') {
									$lable = $tour_detail->seniors_label.' Traveler ' .  $model20->num;
								}
								else if($model20->type=='infants') {
									$lable = $tour_detail->infants_label.' Traveler ' .  $model20->num;
								}
            					?>

							<tr>
								<td style="padding-right:20px; width:10%"><?php echo $lable; ?></td>
								<td align="left"><?php echo $model20->name; ?></td>
							</tr>
                			<?php 
							}
          				?>
					</table></td></tr>
          	<?php
				}
			?>






		<?php
		if(!empty($_GET['promo']) && ($not==1) && ($original_price == 0)) {
			$promo = addslashes($_GET['promo']);
			$discount = discount($conn, $promo, $subtotal);

			if($discount>0) {
				$d 		 = ($subtotal - $discount);
				$total = ($subtotal + $tax + $gratuity_amt + $convenience_fee) - $discount;
				$sql_3 = "UPDATE `tour_customer_detail` SET `subtotal`='$subtotal', `discount`='$discount', tax='$tax', gratuity_amt='$gratuity', convenience_fee='$convenience_fee', total='$total', coupon='$promo' WHERE sessionId='".$sessionId."';";
				$conn->query($sql_3);
			}
		}
		?>

    <div class="pay_card_wra">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-push-6 col-md-push-6 col-sm-push-6">

        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="pay_total">
          <?php list($whole, $decimal) = explode('.', number_format($subtotal,2));  ?>
          <tr>
            <td>Total</td>
            <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
          </tr>
          <?php if(($discount>0) && ($not==1) && ($original_price == 0)) { list($whole, $decimal) = explode('.', number_format($discount,2) );  ?>
          <tr class="discount2">
            <td>Discount <a href="checkout"><i class="fa fa-times-circle"></i> <span>Remove</span></a></td>
            <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
          </tr>
          <?php } else if(($not==1) && ($original_price == 0)) {  ?>
          <tr class="discount">
            <td colspan="2"><a data-toggle="modal" data-target="#exampleModal" href="#">Have a promo code?</a></td>
          </tr>
          <?php } if($tax>0) { list($whole, $decimal) = explode('.', number_format($tax,2) );  ?>
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
          <?php $total = $_total = ($subtotal + $tax + $gratuity_amt + $convenience_fee) - $discount; ?>
          <?php list($whole, $decimal) = explode('.', number_format($_total,2)); ?>
          <tr class="last_tr">
            <td>Grand Total</td>
            <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
          </tr>
          <?php } else { $total = ($subtotal + $tax); } ?>
        </table>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-pull-6 col-md-pull-6 col-sm-pull-6">
        <h2 class="pay_head2">CREDIT CARD DETAILS</h2>

<main>
<section class="container-lg">
  <div class="cell checkout checkout2">

      <div class="row">
        <div class="field col-md-12 col-lg-12 col-xs-12">
          <div id="input-card-number" class="input empty"></div>
          <label for="input-card-number" data-tid="elements_checkout.form.card_number_label">Card number</label>
          <div class="baseline"></div>
        </div>
      </div>
      <div class="row">
        <div class="field col-md-4 col-lg-4 col-xs-4">
          <div id="input-card-expiry" class="input empty"></div>
          <label for="input-card-expiry" data-tid="elements_checkout.form.card_expiry_label">Expiration</label>
          <div class="baseline"></div>
        </div>
        <div class="field col-md-3 col-lg-3 col-xs-3">
          <div id="input-card-cvc" class="input empty"></div>
          <label for="input-card-cvc" data-tid="elements_checkout.form.card_cvc_label">CVC</label>
          <div class="baseline"></div>
        </div>
        <div class="field col-md-5 col-lg-5 col-xs-5">
            <input name="checkout2_zip" id="checkout2-zip" data-tid="elements_checkout.form.postal_code_placeholder" class="input empty" type="text" placeholder="Postal Code" required autocomplete="postal-code">
            <label for="checkout2-zip" data-tid="elements_checkout.form.postal_code_label">Postal Code</label>
            <div class="baseline"></div>
          </div>
      </div>
      <div class="error" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
          <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"/>
          <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"/>
        </svg>
        <span class="message"></span>
      </div>
      <input type="hidden" name="stripeToken" id="stripeToken" />
    	<input name="checkout2_name" id="checkout2-name" type="hidden" value="<?php echo $user_result->name; ?>" />
  </div>
</section>
</main>

      </div>

    </div>
    </div>

  </div>
</div>

<div class="pay_row_wra">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-push-6 col-md-push-6 col-sm-push-6">
        <div class="pay_btn_final" id="pay_btn_final">
          <button id="payBtn" data-tid="elements_checkout.form.pay_button" type="submit"><i class="fa fa-cart-arrow-down"></i> Pay CA$<?php echo number_format($total,2); ?></button>
        </div>
        <div class="pay_btn_final" id="processing_text" style="display:none;">
          <button type="button"><img src="<?php echo APPROOT; ?>images/loading.gif" alt="loading.gif"> Processing Payment. Please Wait.</button>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-pull-6 col-md-pull-6 col-sm-pull-6">
      	<div class="pay_back_btn">
        	<a href="<?php echo $_SESSION['page_url']; ?>">Back</a> <a href="<?php echo APPROOT; ?>/tours">Continue Shopping</a> <img src="<?php echo APPROOT; ?>images/ssl-secure-encryption.svg" alt="ssl-secure-encryption.svg" width="100">
          <div class="clearfix"></div>
          </div>
      </div>
    </div>
  </div>
</div>

<?php
echo "<script>
var dataLayer  = window.dataLayer || [];
dataLayer.push({
    'event': 'checkout',
    'ecommerce': {
      'checkout': {
        'actionField': {'step': 1},
        'products': ".json_encode($dataLayer)."
     }
   }
  });
</script>";
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title promo_title" id="exampleModalLabel">ADD A PROMO CODE TO THIS BOOKING</h3>
      </div>
      <div class="modal-body promo_body">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <h4 for="promo_code">Enter promo code</h4>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
              <input type="text" class="form-control" id="promo_code" name="promo_code" placeholder="Enter promo code">
              <div id="result"></div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="promo_tbl">
          <tr>
            <td><div class="promo_cancel"  data-dismiss="modal">Cancel</div></td>
            <td>
            <div class="promo_apply" id="apply_code">
              <button type="button">Apply Code</button>
            </div></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

</form>
</div>
<?php } else { ?>
<div class="reservation_wra" style="min-height:250px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
      	 <?php echo $_SESSION['statusMsg']=''; ?>
         <h4>Your cart is empty. We are redirecting you to tours listing page in 3 seconds.</h4>
         <h4>If you are not redirected automatically, <a href="/tours">click here</a> to view the list of tours.</h4>
         <meta http-equiv="refresh" content="3;URL='/tours'" />
			</div>
    </div>
  </div>
</div>
<?php } ?>
<?php include 'footer.php'; ?>
<script src="<?php echo APPROOT; ?>strip-test/js/l10n.js" data-rel-js=""></script>
<script src="<?php echo APPROOT; ?>strip-test/js/stripe-v3.js" data-rel-js=""></script>
<script>
$(function(){
	$('#apply_code').click(function(){

		var val = $('#promo_code').val();
		if(val!='') {
			$('#result').html('Validating...');
			$.ajax({
				url:'<?php echo APPROOT; ?>ajax/validate',type:'POST',data:'promo='+$('#promo_code').val(),
				success:function(res){
					if(res=='') window.location.href='<?php echo APPROOT; ?>checkout?promo='+$('#promo_code').val();
					else $('#result').html(res);
				}
			});
		} else $('#result').html('<div class="label label-danger">Promo code should not be blank.</div>');
	});
});
</script>
</body>
</html>
