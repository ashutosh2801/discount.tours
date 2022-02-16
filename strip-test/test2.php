<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!-- Bootstrap core CSS -->
<link href="http://demos.codexworld.com/includes/css/bootstrap.css" rel="stylesheet">
<!-- Add custom CSS here -->
<link href="http://demos.codexworld.com/includes/css/style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php
//check whether stripe token is not empty
if(!empty($_POST['auth_id'])){

	//include Stripe PHP library
	require_once('../stripe-php/init.php');
	
	//set api key
	$stripe = array(
		"secret_key"      => "sk_test_IbP3soaI2IyYAWC63jaKF0QS",
		"publishable_key" => "pk_test_Hgdj7o2VNFu9dKm0yoOMhE6B"
	);
	
	\Stripe\Stripe::setApiKey($stripe['secret_key']);
	
	$ch = \Stripe\Charge::retrieve($_POST['auth_id']);
	$ch->capture();
	
	//retrieve charge details
	$chargeJson = $ch->jsonSerialize();
	
	//check whether the charge is successful
	if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
			
			echo '<pre>'; print_r($chargeJson); exit;
			//order details 
			$amount = $chargeJson['amount'];
			$balance_transaction = $chargeJson['balance_transaction'];
			$currency = $chargeJson['currency'];
			$status = $chargeJson['status'];
			$date = date("Y-m-d H:i:s");
			
			//include database config file
			//include_once 'dbConfig.php';
			
			//insert tansaction data into the database
			//$sql = "INSERT INTO orders(name,email,card_num,card_cvc,card_exp_month,card_exp_year,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES('".$name."','".$email."','".$card_num."','".$card_cvc."','".$card_exp_month."','".$card_exp_year."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$amount."','".$currency."','".$balance_transaction."','".$status."','".$date."','".$date."')";
			//$insert = $db->query($sql);
			//$last_insert_id = $db->insert_id;
			
			//if order inserted successfully
			if($last_insert_id && $status == 'succeeded'){
					$statusMsg = "<h2>The transaction was successful.</h2><h4>Order ID: {$last_insert_id}</h4>";
			}else{
					$statusMsg = "Transaction has been failed";
			}
	}else{
			$statusMsg = "Transaction has been failed";
	}
}
?>
<div class="container bodyBck">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-xs-12 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Charge $55 with Stripe</h3>
                    </div>
                    <div class="panel-body">
                        <!-- display errors returned by createToken -->
                        <p class="payment-status"></p>
                        <form action="test2.php" method="POST">
                        <div class="form-group">
                            <label>AUTH ID</label>
                            <input type="text" class="form-control card-number" name="auth_id" required />
                        </div>
                        
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Accept Payment">
                        </form>
                    </div>
                </div>
            </div>
            
				</div>
    </div>
</div>
</body>
</html>
