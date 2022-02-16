<?php
include('includes/config.php');
include('includes/functions.php');

$_SESSION['msg'] = '';
if(isset($_POST['login']))
{
	extract($_POST);
	$error=[];
	if(empty($email)) {
		$error[] = 'Email address can not be blank!';
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error[] = 'Invalid Email address format!';
	}
	if(empty($password)) {
		$error[] = 'Password can not be blank!';
	}

	if(empty($error))
	{
		$token = md5(rand());
		echo $sql = "SELECT ID,concat(first_name,' ',last_name) as name,email,role,status 
		FROM tour_users 
		WHERE email='$email' and password='".md5($password)."'";
		$query = $conn->query($sql);
		$result = $query->fetch_object();
		//print_r($result); exit;

		if($result->ID)
		{
			if(!empty($_POST["remember"])) {
				setcookie ("user_login",$email,time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("user_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
			}
			
			$_SESSION['USER_ID'] = $result->ID;
			$_SESSION['FULLNAME'] = $result->name;
			$_SESSION['EMAIL'] = $result->email;
			$_SESSION['ROLE'] = $result->role;
			header('Location: '.SITEURL); 
			exit;
		}
		else {
			$error[] =  'Invalid Email/Password!';
		}
	}
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Contact Us to Know More About Discount Tours Info. Operators are standing by to answer your questions, feel free to email or call us +1 866-404-5115!"/>
<meta name="keywords" content="Best Niagara Falls Sightseeing Tours, Tour Packages, Day Tour, Evening Tour, Small Group Custom Tour, Private Tour, Group Tours"/>
<link rel="canonical" href="<?=SITEURL;?>/login" />
<title>Login | Discount Tours Info | Tours Falls | Discount Tours</title>
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
							<h3 class="form-title">Login</h3>
							<form action="" class="form-horizontal" method="post">
							<?php
                                if(!empty($error)){
                                    foreach($error as $err) {
										if($err)
                                        echo '<div class="alert alert-danger">'.$err.'</div>';
                                    }
                                }
                                ?>
								<div class="form-group">
									<label>Email</label>
									<input value="<?php echo isset($_POST['email']) ? $_POST['email'] :$_COOKIE['user_login'];?>" name="email" type="email" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input value="<?php echo isset($_POST['password']) ? $_POST['password'] :$_COOKIE['user_password'];?>" name="password" type="password" class="form-control" required>
								</div>
								<button class="btn signin" name="login">Login</button>
								<div class="remember-me">
									<input type="checkbox" class="checkbox">
									<span class="check-label">Remember Me</span>
								</div>
								<a href="<?=SITEURL;?>/forgot" class="forgot">Forgot Password</a>
							</form>
							
							<span class="signup-link">Don't have an account? Sign up <a href="<?=SITEURL;?>/signup">here</a></span>
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
