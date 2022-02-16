<?php
include('includes/config.php');
include('includes/functions.php');

if( !empty($_GET['cjevent']) && !isset($_COOKIE['CJEVENT']) ) {
	setcookie('CJEVENT', $_GET['cjevent'], time() + (86400 * 30), "/"); // 86400 = 1 day
}
if( !empty($_GET['batcheventID']) && !isset($_COOKIE['batcheventID']) ) {
	setcookie('batcheventID', $_GET['batcheventID'], time() + (86400 * 30), "/"); // 86400 = 1 day
}

$_SESSION['msg'] = '';
if(isset($_POST['g-recaptcha-response']))
{
	$captcha=$_POST['g-recaptcha-response'];
	if(!empty($captcha))
	{
		$response=json_decode(file_contents("https://www.google.com/recaptcha/api/siteverify?secret=".reCAPTCHA_SECRET."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
		if($response['success'] == true)
		{
			extract($_POST);
			//call email template for send signup mail for Admin
			$htmlContent = "Hello {{name}},
			<br><br>
			Thank you for contacting us. We will reply soon.
			<br><br>
			E-Mail From <a href='https://www.discount.tours'>Discount.Tours</a>";
						
			$message2 = str_replace("{{name}}", $name, $htmlContent);
			$message2 = str_replace("{{email}}", $email, $message2);
			$message2 = str_replace("{{phone}}", $phone, $message2);
			$message2 = str_replace("{{subject}}", $subject, $message2);
			$message2 = str_replace("{{message}}", $message, $message2);
			$message2 = str_replace("{{from_name}}", SITENAME, $message2);
			
			$subject = "Sub - $subject";
			
			$res1 = sendMail( array( $email, $name  ), $subject, $message2);
							 
			//call email template for send signup mail for Admin
			$htmlContent1 = "Hello,
			<br><br>
			New contact from {{from_name}}. Details are
			<br><br>
			Subject: {{subject}}
			<br><br>
			Name: {{name}}<br>
			Email: {{email}}<br>
			Phone: {{phone}}<br>
			<br><br>
			{{message}}
			<br><br>
			E-Mail From <a href='https://www.discount.tours'>Discount.Tours</a>";
			
			$message1 = str_replace("{{name}}", $name, $htmlContent1);			
			$message1 = str_replace("{{email}}", $email, $message1);
			$message1 = str_replace("{{phone}}", $phone, $message1);
			$message1 = str_replace("{{subject}}", $subject, $message1);
			$message1 = str_replace("{{message}}", $message, $message1);
			$message1 = str_replace("{{from_name}}", SITENAME, $message1);
			
			$subject = "Sub - $subject";
			
			$res2 = sendMail( array('info@discounttours.com', SITENAME), $subject, $message1);
			
			//echo '<pre>'; print_r(array($res1,$res2));			   
			
			if($res1 && $res2) 
			{
				//$_SESSION['msg'] = '<div class="alert alert-success">Thank you for contacting us. We will reply soon.</div>';
				header('Location: /thank-you?'.$_SERVER['QUERY_STRING']); exit;
			}
		}
		else
		$_SESSION['msg'] = '<div class="alert alert-danger">Invalid captcha!</div>';
	}
	else
	$_SESSION['msg'] = '<div class="alert alert-danger">Enter captcha!</div>';
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Contact Us to Know More About Discount Tours Info. Operators are standing by to answer your questions, feel free to email or call us +1 866-404-5115!"/>
<meta name="keywords" content="Best Niagara Falls Sightseeing Tours, Tour Packages, Day Tour, Evening Tour, Small Group Custom Tour, Private Tour, Group Tours"/>
<link rel="canonical" href="<?=SITEURL;?>/contact-us" />
<title>Contact Us | Discount Tours Info | Tours Falls | Discount Tours</title>
<?php include 'inner_header.php';?>
<!--contact-->
<div class="contact_wra">
  <div class="container">
    <div class="row">      
      <div class="col-lg-12">
         <div class="contact_box">
         <div class="row">
         <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
           <div class="contact_form">
             <h2>We are always here to help you</h2>
             <p>Please feel free to email/call us with any questions, a Discount Tours representative will be happy to assist you!</p>
             <form action="" method="post">
				<?php if(isset($_SESSION['msg'])) { echo $_SESSION['msg']; $_SESSION['msg']=''; } ?>
               <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <input required name="name" type="text" placeholder="Name*" class="fld2" oninvalid="setCustomValidity('Please enter your full name')" onchange="try{setCustomValidity('')}catch(e){}" onkeypress="validate(event)" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <input required name="email" type="text" placeholder="Email*" class="fld2" oninvalid="setCustomValidity('Please enter your email address')" onchange="try{setCustomValidity('')}catch(e){}" onkeypress="validate(event)" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                 </div>
  
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <input required name="phone" type="text" placeholder="Phone*" class="fld2" oninvalid="setCustomValidity('Please enter your contact number')" onchange="try{setCustomValidity('')}catch(e){}" onkeypress="validate(event)" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <input required name="subject" type="text" placeholder="Subject" class="fld2" oninvalid="setCustomValidity('Please enter subject')" onchange="try{setCustomValidity('')}catch(e){}" onkeypress="validate(event)" value="<?php if(isset($_POST['subject'])) echo $_POST['subject']; ?>">
                 </div>
               </div>
               
               <textarea name="message" cols="" rows="3" placeholder="Write message" class="txtarea2"><?php if(isset($_POST['message'])) echo $_POST['message']; ?></textarea>
               
               <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="<?=reCAPTCHA_KEY;?>"></div>
               </div>
               
               <button type="submit" class="btn2">Submit</button>      <small>(*) is required information</small>        
             </form>
             
           </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
         <div class="address_right">
           <!--<h3>Mailing Address</h3> -->
           <!--<p class="address2"><i class="fa fa-building-o"></i> Brampton, ON L7A 0S9, Canada</p>-->
           <h3>Phone Number</h3>
           <p class="phone"><i class="fa fa-phone"></i> +1 866-404-5115</p>
           <h3>Email Address</h3>
           <p class="mail"><i class="fa fa-envelope-o"></i> info@discount.tours</p>
           <h3>Get Support Services</h3>
           <p class="support"><i class="fa fa-microphone"></i> <a href="<?=SITEURL;?>/contact-us"><?=SITEURL;?>/contact-us</a></p>
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
<?php //echo '<pre>'; print_r($_COOKIE); echo '</pre>';  ?>
<?php $conn->close(); ?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
function validate(evt) {
	var theEvent = evt || window.event;

	// Handle paste
	if (theEvent.type === 'paste') {
		key = event.clipboardData.getData('text/plain');
	} else {
	// Handle key press
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode(key);
	}
	var regex = /[a-zA-z0-9@.- ]|\./;
	if( !regex.test(key) ) {
	theEvent.returnValue = false;
	if(theEvent.preventDefault) theEvent.preventDefault();
	}
}
</script>
</body>
</html>
