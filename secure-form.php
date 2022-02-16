<?php
include('includes/config.php');
include('includes/functions.php');

$statusMsg='';
$HTML = '';
//check whether stripe token is not empty
if(!empty($_POST['stripeToken']))
{
	//echo '<pre>'; print_r($_POST); exit;
	extract($_POST);
	$flag=0;
	$name = test_input($name);
	if( empty($name) ) {
		$name_msg = '<div class="error">Name is required.</div>';
		$error_id = 'contact_info';
		$flag=1;
	}
	else if (!preg_match("/^[0-9a-zA-Z. ]*$/",$name)) {
		$name_msg = '<div class="error">Invalid name format.</div>';
		$error_id = 'contact_info';
		$flag=1;
	}
	
	$email = test_input($email);
	if( empty($email) ) {
		$email_msg = '<div class="error">Email address is required.</div>';
		$error_id = 'contact_info';
		$flag=1;
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
		$email_msg = '<div class="error">Invalid email address.</div>';
		$error_id = 'contact_info';
		$flag=1;
	}
	
	if( empty($phone) ) {
		$phone_msg = '<div class="error">Phone is required.</div>';
		$error_id = 'phone_info';
		$flag=1;
	}

	if( empty($amount) ) {
		$amount_msg = '<div class="error">Amount is required.</div>';
		$error_id = 'phone_info';
		$flag=1;
	}

	if(	$flag == 0 )
	{
    //get token, card and user info from the form
    $token  				= $_POST['stripeToken'];
    
    //include Stripe PHP library
    require_once('stripe-php/init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => SECRET_KEY,
      "publishable_key" => PUBLISHABLE_KEY
    );
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
		
		try {
    	
			$order_id = orderId();
			
			//add customer to stripe
			$customer = \Stripe\Customer::create(array(
					'email' => $email,
					'source'  => $token
			));
			
			$amount = str_replace(array("$",","),'',$amount);
			
			//item information
			$itemName 	= "Payment From $name";
			$itemNumber = "SecureForm_$order_id";
			$itemPrice 	= round($amount,2) * 100;
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
			if($chargeJson['id'] && $chargeJson['status']=="succeeded" && $chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == '') 
			{
				$sql = "INSERT INTO `tour_secure_payment` (`order_id`, `auth_id`, `name`, `email`, `phone`, `note`, `amount`, `status`, `created_date`) VALUES ('".$order_id."', '".$chargeJson['id']."', '".addslashes($name)."', '".addslashes($email)."', '".addslashes($phone)."', '".addslashes($note)."', '".floatval($amount)."', '1', '".date('Y-m-d H:i:s')."');";
				$conn->query($sql);
			
				$html = '<table width="100%" border="0" cellspacing="0" cellpadding="15" bordercolor="#ccc" style="border-collapse:collapse; border:1px solid #ccc;">
				<thead bgcolor="#e8e8e8">
 <tr>
  <th colspan="2" align="left" style="color:#0078de;">Details are below</th>
 </tr></thead><tbody>
 <tr>
  <td>Name</td>
  <td>'.$name.'</td>
 </tr>
 <tr>
  <td>Email</td>
  <td>'.$email.'</td>
 </tr>
 <tr>
  <td>Phone</td>
  <td>'.$phone.'</td>
 </tr>
 <tr>
  <td>Amount</td>
  <td>CA$'.number_format($amount,2).'</td>
 </tr>
 <tr>
  <td>Message</td>
  <td>'.$note.'</td>
 </tr></tbody>
</table>';
				$client_msg.= '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1em;"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><img src="https://www.toniagara.com/images/logo.png" alt="logo.png" height="55"></td></tr><tr><td><h3 align="center">Thank you for payment</h3><p align="center">Your payment authorization has been received. You will receive a receipt once the payment is accepted by us.</p></td></tr></table>'.$html.'<div style="font-size:13px;text-align:right; padding-top:5px;">Booking ID: '.$orderID.'</div></div>';
				
				sendMail( array($email, $name), 'ToNiagara - Thank you for payment. Order ID - '.$orderID, $client_msg);
				
				$admin_msg.= '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1em;"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td colspan="2" align="center"><img src="https://www.toniagara.com/images/logo.png" alt="logo.png" height="55"></td></tr><tr><td width="50%" style="background:green;"><a style="color:#fff;display:block; text-align:center; text-decoration:none;" href="https://www.toniagara.com/admin/accept-secure-payment.php?orderId='.$orderID.'">Accept</a></td><td width="50%" style="background:red;"><a style="color:#fff; display:block; text-align:center; text-decoration:none;" href="https://www.toniagara.com/admin/decline-secure-payment.php?orderId='.$orderID.'">Decline</a></td></tr></table><p>'.$name.' payment authorization has been received.</p>'.$html.'<div style="font-size:13px;text-align:right; padding-top:5px;">Booking ID: '.$orderID.'</div></div>';

				sendMail( array(SITEEMAIL, SITENAME), "ToNiagara - Payment From $name", $admin_msg);
				sendMail( array('ashutosh2801@gmail.com', SITENAME), "ToNiagara - Payment From $name", $admin_msg);
				 
				header('Location: '.APPROOT.'thank-you-secure-form');
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
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Contact Us to Know More About Niagara Falls Tours Info. Operators are standing by to answer your questions, feel free to email or call us +1 800-653-2242!"/>
<meta name="keywords" content="Best Niagara Falls Sightseeing Tours, Tour Packages, Day Tour, Evening Tour, Small Group Custom Tour, Private Tour, Group Tours"/>

<link href="<?php echo APPROOT; ?>css/payment.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo APPROOT; ?>strip-test/css/base.css" data-rel-css="">
<link rel="stylesheet" type="text/css" href="<?php echo APPROOT; ?>strip-test/css/stripe-v3.css" data-rel-css="">
<script src="https://js.stripe.com/v3/"></script>
<script src="<?php echo APPROOT; ?>strip-test/js/index2.js" data-rel-js=""></script>

<link rel="canonical" href="<?=SITEURL;?>/secure-form" />
<title>Secure Form | Niagara Falls Tours Info | Tours Falls | ToNiagara</title>
<?php include 'inner_header.php';?>
<!--contact-->
<div class="contact_wra1 secure_form_wra">
  <div class="container">
    <div class="row">      
      <div class="col-lg-8 col-lg-offset-2">
         <div class="contact_box">
         <div class="row">
         <div class="col-xs-12 ">
           <div class="contact_form">
             <h2>Secure Form</h2>
             <p>(*) is required information</p>
             <?php echo str_replace("Stripe","",$_SESSION['statusMsg']); $_SESSION['statusMsg']=''; ?>
             <div class="cardForm" id="example-2">
             <form action="" method="POST" id="form_checkout">
							 <?php if(isset($_SESSION['msg'])) { echo $_SESSION['msg']; $_SESSION['msg']=''; } ?>
               <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="contact_info">
                 		<?php echo $name_msg; $name_msg=''; ?>
                   <input required name="name" type="text" placeholder="Name*" class="fld2" oninvalid="setCustomValidity('Please enter your full name')" onchange="try{setCustomValidity('')}catch(e){}" onkeypress="validate(event)" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" id="checkout2-name">
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 		<?php echo $email_msg; $email_msg=''; ?>
                   <input required name="email" type="text" placeholder="Email*" class="fld2" oninvalid="setCustomValidity('Please enter your email address')" onchange="try{setCustomValidity('')}catch(e){}" onkeypress="validate(event)" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                 </div>
  
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="phone_info">
                 		<?php echo $phone_msg; $phone_msg=''; ?>
                   <input required name="phone" type="text" placeholder="Phone*" class="fld2" oninvalid="setCustomValidity('Please enter your contact number')" onchange="try{setCustomValidity('')}catch(e){}" onkeypress="return isNumber(event);" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 		<?php echo $amount_msg; $amount_msg=''; ?>
                   <input required name="amount" type="text" placeholder="Amount*" class="fld2" id="aninput" onkeypress="return validateFloatKeyPress(this,event)" value="<?php if(isset($_POST['amount'])) echo $_POST['amount']; ?>">
                 </div>
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <textarea name="note" placeholder="Note" class="fld2"><?php if(isset($_POST['note'])) echo $_POST['note']; ?></textarea>
                 </div>
               </div>
               
<main>    
<section class="container-lg">
  <div class="cell checkout checkout2">
      
      <div class="row">
        <div class="field col-md-12 col-lg-12 col-xs-12">
          <div id="input-card-number" class="input empty"></div>
          <label for="input-card-number" data-tid="elements_checkout.form.card_number_label">Card number*</label>
          <div class="baseline"></div>
        </div>
      </div>
      <div class="row">
        <div class="field col-md-4 col-lg-4 col-xs-4">
          <div id="input-card-expiry" class="input empty"></div>
          <label for="input-card-expiry" data-tid="elements_checkout.form.card_expiry_label">Expiration*</label>
          <div class="baseline"></div>
        </div>
        <div class="field col-md-3 col-lg-3 col-xs-3">
          <div id="input-card-cvc" class="input empty"></div>
          <label for="input-card-cvc" data-tid="elements_checkout.form.card_cvc_label">CVC*</label>
          <div class="baseline"></div>
        </div>
        <div class="field col-md-5 col-lg-5 col-xs-5">
            <input name="checkout2_zip" id="checkout2-zip" data-tid="elements_checkout.form.postal_code_placeholder" class="input empty" type="text" placeholder="Postal Code" required autocomplete="postal-code">
            <label for="checkout2-zip" data-tid="elements_checkout.form.postal_code_label">Postal Code*</label>
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
  </div>
</section>
</main>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-push-6 col-md-push-6 col-sm-push-6">
        <div class="pay_btn_final" id="pay_btn_final">
          <button id="payBtn" data-tid="elements_checkout.form.pay_button" type="submit"><i class="fa fa-cart-arrow-down"></i> Pay Now</button>
        </div>
        <div class="pay_btn_final" id="processing_text" style="display:none;">
          <button type="button"><img src="<?php echo APPROOT; ?>images/loading.gif" alt="loading.gif"> Please Wait.</button>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-pull-6 col-md-pull-6 col-sm-pull-6">
      	<div class="pay_back_btn">
        	<img src="<?php echo APPROOT; ?>images/ssl-secure-encryption.svg" alt="ssl-secure-encryption.svg" width="100">
          <div class="clearfix"></div>
          </div>    
      </div>
    </div>

             </form>
             </div>
           </div>
         </div>
         
       	 </div>
       	 </div>
       
       </div>
    </div>
  </div>
</div>
<!--end contact-->
<?php include 'footer.php';?>
<?php $conn->close(); ?>
<script>
function validateFloatKeyPress(el, evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    var number = el.value.split('.');
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    //just one dot
    if(number.length>1 && charCode == 46){
         return false;
    }
    //get the carat position
    var caratPos = getSelectionStart(el);
    var dotPos = el.value.indexOf(".");
    if( caratPos > dotPos && dotPos>-1 && (number[1].length > 1)){
        return false;
    }
    return true;
}
//thanks: http://javascript.nwbox.com/cursor_position/
function getSelectionStart(o) {
	if (o.createTextRange) {
		var r = document.selection.createRange().duplicate()
		r.moveEnd('character', o.value.length)
		if (r.text == '') return o.value.length
		return o.value.lastIndexOf(r.text)
	} else return o.selectionStart
}

function addCommas(nStr){ nStr+="",x=nStr.split("."),x1=x[0],x2=x.length>1?"."+x[1]:""; for(var rgx=/(\d+)(\d{3})/;rgx.test(x1);)x1=x1.replace(rgx,"$1,$2"); return x1+x2 ;  }
function formatNum(str) { var num = '$'+str.toLocaleString(); return num; }

$( document ).ready(function(){
	$('#aninput').keypress(function(){ 
		var ask_price 	= $('#aninput').val();
		var price = ask_price.replace(/[$,]/g, ''); 
		$('#aninput').val( formatNum(addCommas(price)) ); 
	});
});
</script>
<script src="<?php echo APPROOT; ?>strip-test/js/l10n.js" data-rel-js=""></script>
<script src="<?php echo APPROOT; ?>strip-test/js/stripe-v3.js" data-rel-js=""></script>
</body>
</html>
