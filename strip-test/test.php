<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="http://demos.codexworld.com/includes/css/bootstrap1.css" rel="stylesheet">
<link href="http://demos.codexworld.com/includes/css/style1.css" rel="stylesheet">
<link href="demo1.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="jquery.creditCardValidator.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('pk_test_Hgdj7o2VNFu9dKm0yoOMhE6B');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-status").html(response.error.message);
    } else {
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
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
		
		$('#card_number').validateCreditCard(function(result) {
			result.card_type == null ? '-' : $(this).addClass(result.card_type.name+' '+result.luhn_valid);				
			result.card_type == null ? '-' : $(this).addClass(result.card_type.name+' '+result.luhn_valid);				
			console.log(result); 
		});
		
		/*$('.card-expiry-month').bind('keyup','keydown', function(event) {
			var inputLength = event.target.value.length;
			if (event.keyCode != 8){
				if(inputLength === 2){
					var thisVal = event.target.value;
					thisVal += '/';
					$(event.target).val(thisVal);
				}
			}
		})*/
		
});
</script>
<style>
form{-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.3);-moz-box-shadow:0 1px 3px rgba(0,0,0,.3);box-shadow:0 1px 3px rgba(0,0,0,.3);background-color:#f9f9f7;border:1px solid #fff;margin:0 0 0;padding:13px 20px;width:287px}
form label{color:#555;display:block;font-size:14px;font-weight:400}
form input{background-color:#fff;border:1px solid #e5e5e5;color:#333;display:block;font-size:18px;height:32px;padding:0 5px;width:275px;-moz-box-sizing:content-box;-webkit-box-sizing:content-box; margin-bottom:15px;}
form select{background-color:#fff;border:1px solid #e5e5e5;color:#333;display:inline-block;font-size:18px;height:32px;padding:0 5px;width:100px;-moz-box-sizing:content-box;-webkit-box-sizing:content-box; margin-bottom:15px;}
form input::-webkit-input-placeholder{color:#ddd}
form input:-moz-placeholder{color:#ddd;opacity:1}
form input::-moz-placeholder{color:#ddd;opacity:1}
form input:-ms-input-placeholder{color:#ddd}form input:focus{outline:1px solid #38d}
form #card_number{background-image:url(images.png),url(images.png);background-position:2px -121px,260px -61px;background-size:120px 361px,120px 361px;background-repeat:no-repeat;padding-left:54px;width:225px}
form #card_number.visa{background-position:2px -163px,260px -61px}
form #card_number.visa_electron{background-position:2px -205px,260px -61px}
form #card_number.mastercard{background-position:2px -247px,260px -61px}
form #card_number.maestro{background-position:2px -289px,260px -61px}
form #card_number.discover{background-position:2px -331px,260px -61px}
form #card_number.valid.visa{background-position:2px -163px,260px -87px}
form #card_number.valid.visa_electron{background-position:2px -205px,260px -87px}
form #card_number.valid.mastercard{background-position:2px -247px,260px -87px}
form #card_number.valid.maestro{background-position:2px -289px,260px -87px}
form #card_number.valid.discover{background-position:2px -331px,260px -87px}
</style>
</head>

<body>
<?php
$statusMsg='';
//check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){
    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    //$phone = $_POST['phone'];
    $card_num = $_POST['card_num'];
    $card_cvc = $_POST['cvc'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];
    
    //include Stripe PHP library
    require_once('../stripe-php/init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => "sk_test_IbP3soaI2IyYAWC63jaKF0QS",
      "publishable_key" => "pk_test_Hgdj7o2VNFu9dKm0yoOMhE6B"
    );
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $email,
        'source'  => $token
    ));
		
		/*\Stripe\Issuing\Cardholder::create([
			"type" => "individual",
			"name" => $name,
			"email" => $email,
			//"phone_number" => $phone,
			"shipping" => [
				"name" => $name,
				/*"address" => [
					"line1" => "1234 Main Street",
					"city" => "San Francisco",
					"state" => "CA",
					"country" => "US",
					"postal_code" => "94111"
				]* /
			],
		]);*/
    
    //item information
    $itemName = "Premium Script CodexWorld";
    $itemNumber = "PS123456";
    $itemPrice = 5500;
    $currency = "usd";
    $orderID = "SKA92712382139";
    
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

		//echo "Your authrize id is:; ".$chargeJson['id']; exit;
		echo '<pre>'; print_r($chargeJson); exit;
    //check whether the charge is successful
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
			
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
}else{
    //$statusMsg = "Form submission error.......";
}

//show success or error message
echo $statusMsg;
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
                        <form action="test.php" method="POST" id="paymentFrm">
                        <div class="form-group">
                            <label>NAME</label>
                            <input type="text" class="name" name="name" placeholder="Enter name" required autofocus />
                        </div>
                        <div class="form-group">
                            <label>EMAIL</label>
                            <input type="email" class="email" name="email" placeholder="Enter email" required />
                        </div>
                        <div class="form-group">
                            <label>CARD NUMBER</label>
                            <input type="text" id="card_number" class="card-number" name="card_num" placeholder="Valid card number" required maxlength="19" />
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label>EXPIRY DATE</label>
                                    <select class="card-expiry-month" name="exp_month" notranslate="">
            <option value="Month">Month</option><option value="1">01 Jan</option><option value="2">02 Feb</option><option value="3">03 Mar</option><option value="4">04 Apr</option><option value="5">05 May</option><option value="6">06 Jun</option><option value="7">07 Jul</option><option value="8">08 Aug</option><option value="9">09 Sep</option><option value="10">10 Oct</option><option value="11">11 Nov</option><option value="12">12 Dec</option></select>
            												<select class="card-expiry-year" name="exp_year" notranslate="">
                                    <option value="Year">Year</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option><option value="2036">2036</option><option value="2037">2037</option><option value="2038">2038</option><option value="2039">2039</option></select>
                                    <?php /*?><input type="text" class="card-expiry-month" name="exp_month" placeholder="MM/YY" maxlength="5" required /><?php */?>
                                </div>
                            </div>
                            <div class="col-xs-5 pull-right">
                                <div class="form-group">
                                    <label>CVC CODE</label>
                                    <input type="text" class="form-control card-cvc" name="cvc" placeholder="CVC" required maxlength="3" />
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success btn-lg btn-block" id="payBtn" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <h2>Test Card Details</h2>
                <p>To test the payment process, you need test card details. Use any of the following test card numbers, a valid future expiration date, and any random CVC number, to test Stripe payment gateway integration in PHP</p>
                <ul>
                <li>4242424242424242	Visa</li>
                <li>4000056655665556	Visa (debit)</li>
                <li>5555555555554444	Mastercard</li>
                <li>5200828282828210	Mastercard (debit)</li>
                <li>378282246310005	American Express</li>
                <li>6011111111111117	Discover</li>
                </ul>
            </div>
				</div>
    </div>
</div>
</body>
</html>
