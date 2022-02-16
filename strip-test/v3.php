<?php
$statusMsg='';
//check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){
    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = 'A K';
    $email = 'ashutosh2801@gmail.com';
    //$phone = $_POST['phone'];
    //$card_num = $_POST['card_num'];
    //$card_cvc = $_POST['cvc'];
    //$card_exp_month = $_POST['exp_month'];
    //$card_exp_year = $_POST['exp_year'];
    
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
    $itemName = "Testing - Toronto To Niagara Falls Day Tour";
    $itemNumber = "PS123".rand(100,999);
    $itemPrice = rand(1000,9999);
    $currency = "CAD";
    $orderID = "SKA92712382".rand(100,999);
    
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
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0">

  <title data-tid="elements_examples.meta.title">Stripe Elements</title>


  <script src="https://js.stripe.com/v3/"></script>
  <script src="js/index.js" data-rel-js=""></script>


<link href="https://www.toniagara.com/css/style.css" rel="stylesheet">
<link href="https://www.toniagara.com/css/other.css" rel="stylesheet">
<link href="https://www.toniagara.com/css/bootstrap.css" rel="stylesheet">
<link href="https://www.toniagara.com/css/bootstrap-theme.css?v3.3.7" rel="stylesheet">
<link href="https://www.toniagara.com/css/font-awesome.min.css?v4.7.0" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/base.css" data-rel-css="">

  <!-- CSS for each example: -->
  <link rel="stylesheet" type="text/css" href="css/example2.css" data-rel-css="">
</head>
<body>
<main>    
<section class="container-lg">
  <!--Example 2-->
  <div class="cell example example2" id="example-2">
    <form id="form_checkout" method="post">
      
      <div class="row">
        <div class="field">
          <div id="example2-card-number" class="input empty"></div>
          <label for="example2-card-number" data-tid="elements_examples.form.card_number_label">Card number</label>
          <div class="baseline"></div>
        </div>
      </div>
      <div class="row">
        <div class="field col-lg-4">
          <div id="example2-card-expiry" class="input empty"></div>
          <label for="example2-card-expiry" data-tid="elements_examples.form.card_expiry_label">Expiration</label>
          <div class="baseline"></div>
        </div>
        <div class="field col-lg-4">
          <div id="example2-card-cvc" class="input empty"></div>
          <label for="example2-card-cvc" data-tid="elements_examples.form.card_cvc_label">CVC</label>
          <div class="baseline"></div>
        </div>
        <div class="field col-lg-4">
            <input name="example2_zip" id="example2-zip" data-tid="elements_examples.form.postal_code_placeholder" class="input empty" type="text" placeholder="A1A2A3" required autocomplete="postal-code">
            <label for="example2-zip" data-tid="elements_examples.form.postal_code_label">Postal Code</label>
            <div class="baseline"></div>
          </div>
      </div>
      <div class="error" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
              <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"/>
              <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"/>
            </svg>
            <span class="message"></span></div>
      <input type="hidden" name="stripeToken" id="stripeToken" />
    	<button type="submit" data-tid="elements_examples.form.pay_button">Pay $25</button>
    </form>
    <div class="success">
          
          <h3 class="title" data-tid="elements_examples.success.title">Processing Payment. Please Wait.</h3>
        </div>
  </div>
</section>
</main>
<!-- Simple localization script for Stripe's examples page. -->
<script src="js/l10n.js" data-rel-js=""></script>

<!-- Scripts for each example: -->
<script src="js/example2.js" data-rel-js=""></script>



</body>
</html>