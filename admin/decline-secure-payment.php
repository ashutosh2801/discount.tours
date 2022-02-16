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
	$sql = "SELECT * FROM `tour_secure_payment` WHERE order_id='".$orderId."';";
	$query = $conn->query($sql);
	if($query->num_rows > 0 ) 
	{
		$model3 = $query->fetch_object();
    //include Stripe PHP library
    require_once('../stripe-php/init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => SECRET_KEY,
      "publishable_key" => PUBLISHABLE_KEY
    );
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
    
		try {
			
			$re = \Stripe\Refund::create(["charge" => $model3->auth_id]);

			//retrieve charge details
			$chargeJson = $re->jsonSerialize();
			//echo '<pre>'; print_r($chargeJson); exit;
			
			if($chargeJson['id'] && $chargeJson['status']=="succeeded" && $chargeJson['object'] == 'refund') {
				$sql_2 = "UPDATE `tour_secure_payment` SET `transaction_id`='".$chargeJson['balance_transaction']."', `status`='3' WHERE id=".$model3->id.";";
				$conn->query($sql_2);
				$statusMsg = '<p class="alert alert-danger">Payment declined.</p>';
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
} 
else {
	$statusMsg = '<p class="alert alert-danger">Invalid order ID!</p>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Decline - Secure Payments :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo APPROOT; ?>css/payment.css" rel="stylesheet" />
<?php require_once('includes/header.php'); ?>
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
                <li><a href="secure-payment.php">Secure Payments</a><span>«</span></li>
                <li>Decline</li>
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