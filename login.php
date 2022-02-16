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
                <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="/" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
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
