<?php
include('includes/config.php');
include('includes/functions.php');

$_SESSION['msg'] = '';
if(isset($_POST['register']))
{
	// $captcha=$_POST['g-recaptcha-response'];
	// if(!empty($captcha))
	// {
	// 	$response=json_decode(file_contents("https://www.google.com/recaptcha/api/siteverify?secret=".reCAPTCHA_SECRET."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
	// 	if($response['success'] == true)
	// 	{
			extract($_POST);
            $error=[];
            if(empty($first_name)) {
                $error[] = 'First name can not be blank!';
            }
            if(empty($last_name)) {
                $error[] = 'Last name can not be blank!';
            }
            if(empty($email)) {
                $error[] = 'Email address can not be blank!';
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = 'Invalid Email address format!';
            }
            if(empty($password)) {
                $error[] = 'Password can not be blank!';
            }
            elseif((strlen($password)<8) && (strlen($password)>20) ) {
                $error[] = 'Password must be 8-20 characters!';
            }

            if(empty($error))
            {
                $token = md5(rand());
                $sql = "INSERT INTO tour_users 
                (first_name, last_name, email, password, phone, token, role, status, created_on) 
                value 
                ('$first_name', '$last_name', '$email', '".md5($password)."', '$phone', '$token', 3, 1, '".date('Y-m-d H:i:s')."')";
                if($conn->query($sql))
                {
                    //echo "Yes";
                 
                    //exit;
                    /*
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
                        */
                        header('Location: '.SITEURL.'/confirm?'.$_SERVER['QUERY_STRING']); exit;
                        /*
                    }
                    */
                }
                else {
                    $error[] =  $conn->error;
                }
            }
	// 	}
	// 	else
	// 	$_SESSION['msg'] = '<div class="alert alert-danger">Invalid captcha!</div>';
	// }
	// else
	// $_SESSION['msg'] = '<div class="alert alert-danger">Enter captcha!</div>';
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Register to Know More About Discount Tours Info. Operators are standing by to answer your questions, feel free to email or call us +1 866-404-5115!"/>
<meta name="keywords" content="Best Niagara Falls Sightseeing Tours, Tour Packages, Day Tour, Evening Tour, Small Group Custom Tour, Private Tour, Group Tours"/>
<link rel="canonical" href="<?=SITEURL;?>/login" />
<title>Register | Discount Tours Info | Tours Falls | Discount Tours</title>
<?php include 'inner_header.php'; ?>
<!--contact-->
<div class="contact_wra">
    <div class="container">
        <div class="row">      
            <div class="col-lg-12">
                <div class="contact_box">
					<div class="form-container">
						<div class="left-content">
							<h3 class="title">Discount.Tours</h3>
							<h4 class="sub-title">Lorem ipsum dolor sit amet.</h4>
						</div>
						<div class="right-content">
							<h3 class="form-title">Register</h3>
							<form action="" class="form-horizontal" method="POST">
                                <?php
                                if(!empty($error)){
                                    foreach($error as $err) {
                                        echo '<div class="alert alert-danger">'.$err.'</div>';
                                    }
                                }
                                ?>
                                <div class="row">      
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input value="<?php echo $_POST['first_name']; ?>" name="first_name" type="first_name" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input value="<?php echo $_POST['last_name']; ?>" name="last_name" type="last_name" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group">
									<label>Email</label>
									<input value="<?php echo $_POST['email']; ?>" name="email" type="email" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input name="password" type="password" class="form-control" required>
								</div>
                                <div class="form-group">
									<label>Phone</label>
									<input value="<?php echo $_POST['phone']; ?>" name="phone" type="text" class="form-control" required>
								</div>
								<div class="remember-me">
									<input name="term" value="1" type="checkbox" class="checkbox" required>
									<span class="check-label">I agree <a href="<?=SITEURL;?>/terms-and-conditions">Terms and Conditions</a></span>
								</div>
								<a href="<?=SITEURL;?>/login" class="forgot"><i class="fa fa-user"></i> Login</a>
								<button class="btn signin" name="register">Register</button>
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
        </div>
    </div>
</div>
<!--end contact-->
<?php include 'footer.php';?>
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
	    if(theEvent.preventDefault) 
            theEvent.preventDefault();
	}
}
</script>
</body>
</html>
