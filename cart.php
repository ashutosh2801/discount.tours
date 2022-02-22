<?php
require_once('includes/config.php');
require_once('includes/functions.php');
require_once('includes/Mobile_Detect.php');
$Mobile_Detect = new Mobile_Detect;
$sessionId = session();

//print_r($_COOKIE);

$tour_detail = array();
if(!empty($_GET['id']))
{
	$_SESSION['page_url'] = '/cart?id='.$_GET['id'];
	$tour_detail = tour_detail($conn, (int)$_GET['id']);
	if ( $tour_detail->ID ) {
		//$adults_price 	= currency($conn, $tour_detail->adults_price, $tour_detail->currency);
		//$children_price = currency($conn, $tour_detail->children_price, $tour_detail->currency);
		//$seniors_price 	= currency($conn, $tour_detail->seniors_price, $tour_detail->currency);
		//$infants_price 	= currency($conn, $tour_detail->infants_price, $tour_detail->currency);
	}
	else {
		//header('Location: /error?url='.$_SESSION['page_url']);
		//exit;
	}
}
else {
	//header('Location: /tours');
	//exit;
}

$user = array();
$sql2 = "SELECT c.id, c.status, c.created_date, cd.* FROM `tour_customers` c, `tour_customer_detail` cd WHERE c.id=cd.user_id AND c.sessionId='".$sessionId."';";
$query = $conn->query($sql2);
if($query->num_rows > 0 )
$user = $query->fetch_object();

$error_id = '';
if(!empty($_POST['id']))
{
	extract($_POST);

	//echo '<pre>'; print_r($_POST); exit;

	$max_people = $adults + $children + $seniors + $infants;
	$flag=0;
	if( empty($tour_date) ) {
		$date_msg = '<div class="error">Select a valid date.</div>';
		$error_id = 'date_qty';
		$flag=1;
	}

	if(!empty($tour_detail->time_slot) && empty($tour_time)) {
		$time_msg = '<div class="error">Select a valid time.</div>';
		$error_id = 'time_qty';
		$flag=1;
	}

	if( empty($adults) && empty($children) && empty($seniors) && empty($infants) ) {
		$qty_msg = '<div class="error">Number of Guests must be at least 1.</div>';
		$error_id = 'date_qty';
		$flag=1;
	}
	else if( $max_people>$tour_detail->max_people && $tour_detail->price_type=='group' ) {
		$qty_msg = '<div class="error">Number of Guests cannot exceed '.$tour_detail->max_people.'.</div>';
		$error_id = 'date_qty';
		$flag=1;
	}
	/*if( empty($pickup_location) ) {
		$pc_msg = '<div class="error">Pickup location is required!</div>';
		$flag=1;
	}
	if(!empty($user)) {
		$name = $user->name;
		$email = $user->email;
		$phone = $user->phone;
	}*/

	$name1 = validateName($name);
	if( empty($name1) ) {
		$name_msg = '<div class="error">Name is required.</div>';
		$error_id = 'contact_info';
		$flag=1;
	}
	else if ($name1 == false) {
		$name_msg = '<div class="error">Invalid name format.</div>';
		$error_id = 'contact_info';
		$flag=1;
	}

	$email1 = validateEmail($email);
	if( empty($email1) ) {
		$email_msg = '<div class="error">Email address is required.</div>';
		$error_id = 'contact_info';
		$flag=1;
	}
	else if ($email1 == false) {
		$email_msg = '<div class="error">Invalid email address.</div>';
		$error_id = 'contact_info';
		$flag=1;
	}

	if(	$flag == 0 )
	{
		$_sql = "SELECT * FROM `tour_customers` WHERE sessionId='".$sessionId."';";
		$_result = $conn->query($_sql);
		if( $_result->num_rows > 0 )
		{
			$result = $_result->fetch_object();
			$user_id = $result->id;
		}
		else {
			$order_id = orderId();
			$url_string = '';
			if( isset($_COOKIE['cjevent']) ) {
				$url_string = array(
								'utm_campaign'=> isset($_COOKIE['utm_campaign']) ? $_COOKIE['utm_campaign'] : '',
								'utm_medium'	=> isset($_COOKIE['utm_medium']) ? $_COOKIE['utm_medium'] : '',
								'utm_source'	=> isset($_COOKIE['utm_source']) ? $_COOKIE['utm_source'] : '',
								'cjevent'			=> isset($_COOKIE['cjevent']) ? $_COOKIE['cjevent'] : '',
								'batcheventID'=> isset($_COOKIE['batcheventID']) ? $_COOKIE['batcheventID'] : '',
							);
				$url_string = json_encode($url_string);
				$agent_id		= 0;
			}
			else if( isset($_COOKIE['USER_PARTNER']) ) {
				$sql = "SELECT * FROM tour_users WHERE username='".$_COOKIE['USER_PARTNER']."'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$user = $result->fetch_object();
					$url_string = array(
									'utm_campaign'=> '',
									'utm_medium'	=> '',
									'utm_source'	=> $user->name,
									'cjevent'			=> $user->username,
									'batcheventID'=> $user->ID,
								);
					$url_string = json_encode($url_string);
					$agent_id		= $user->ID;
				}
			}

			$sql = "INSERT INTO `tour_customers` (`sessionId`, `order_id`, `name`, `email`, `phone`, `agent_id`, `url_string`, `status`, `created_date`) VALUES ('".$sessionId."', '".$order_id."', '".addslashes($name)."', '".addslashes($email)."', '".addslashes($phone)."', '".$agent_id."', '".$url_string."', '0', '".date('Y-m-d H:i:s')."');";
			$conn->query($sql);
			$user_id = $conn->insert_id;
		}

		if ($user_id)
		{
			$_ids = $_memb = array();
			$addons_ids = $add_ons_nom = '';
			$addons_sum = 0;
			//$addons = array_reverse($addons,true);
			ksort($addons);
			foreach($addons as $key => $val) {
				if($val) {
					$_ids[] = $key;
					$_memb[] = $val;
					$addons_sum+= $addons_price[ $key ] * $val;
				}
			}

			if(!empty($_ids)) {
				$addons_ids = implode(",",$_ids);
				$add_ons_nom = implode(",",$_memb);
			}

			//$addons_ids = json_encode($addons);

			$adults_price 	= $adults ? $adults_price : 0;
			$children_price = $children ? $children_price : 0;
			$seniors_price 	= $seniors ? $seniors_price : 0;
			$infants_price 	= $infants ? $infants_price : 0;

			if($tour_detail->price_type=='person') {
				$subtotal = $addons_sum + ($adults * $adults_price) + ($children * $children_price) + ($seniors * $seniors_price) + ($infants * $infants_price);
			}
			else if($tour_detail->price_type=='group') {
				$subtotal = $addons_sum + $adults_price;
			}

			$gratuity 			= $tour_detail->gratuity ? ($subtotal * $tour_detail->gratuity)/100 : 0;
			$convenience_fee 	= $tour_detail->convenience_fee;
			$tax 				= $tour_detail->tax_allow ? ($subtotal * 13)/100 : 0;
			$total 				= ($subtotal + $tax + $gratuity + $convenience_fee);

			$sq2 = "SELECT * FROM `tour_customer_detail` WHERE sessionId='".$sessionId."' AND tour_id=".$tour_detail->ID;
			$query2 = $conn->query($sq2);
			if( $query2->num_rows > 0 )
			{
				$result2 = $query2->fetch_object();
				$sql2 = "UPDATE `tour_customer_detail` SET `user_id`='".$user_id."', `tour_id`='".$tour_detail->ID."', `sessionId`='".$sessionId."', `name`='".addslashes($name)."', `email`='".addslashes($email)."', `phone`='".addslashes($phone)."', `adults`='".(int)$adults."', `adults_price`='".(float)$adults_price."', `children`='".(int)$children."', `children_price`='".(float)$children_price."', `seniors`='".(int)$seniors."', `seniors_price`='".(float)$seniors_price."', `infants`='".(int)$infants."', `infants_price`='".(float)$infants_price."', `add_ons`='".addslashes($addons_ids)."', `add_ons_nom`='".addslashes($add_ons_nom)."', `add_ons_price`='".(float)$addons_sum."', `pickup_location`='".addslashes($pickup_location)."', `subtotal`='".(float)$subtotal."', `gratuity_amt`='".(float)$gratuity."', `convenience_fee`='".(float)$convenience_fee."', `tax`='".(float)$tax."', `total`='".(float)$total."', `tour_date`='".addslashes($tour_date)."', `tour_time`='".addslashes($tour_time)."' WHERE cid=".$result2->cid.";";

				$url_string = '';
				if( isset($_COOKIE['cjevent']) ) {
					$url_string = array(
									'utm_campaign'=> isset($_COOKIE['utm_campaign']) ? $_COOKIE['utm_campaign'] : '',
									'utm_medium'	=> isset($_COOKIE['utm_medium']) ? $_COOKIE['utm_medium'] : '',
									'utm_source'	=> isset($_COOKIE['utm_source']) ? $_COOKIE['utm_source'] : '',
									'cjevent'			=> isset($_COOKIE['cjevent']) ? $_COOKIE['cjevent'] : '',
									'batcheventID'=> isset($_COOKIE['batcheventID']) ? $_COOKIE['batcheventID'] : '',
								);
					$url_string = json_encode($url_string);
					$agent_id		= 0;
				}
				else if( isset($_COOKIE['USER_PARTNER']) ) {
					$sql = "SELECT * FROM tour_users WHERE username='".$_COOKIE['USER_PARTNER']."'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$user = $result->fetch_object();
						$url_string = array(
										'utm_campaign'=> '',
										'utm_medium'	=> '',
										'utm_source'	=> $user->name,
										'cjevent'			=> $user->username,
										'batcheventID'=> $user->ID,
									);
						$url_string = json_encode($url_string);
						$agent_id		= $user->ID;
					}
				}

				$sql3 = "UPDATE `tour_customers` SET `name`='".addslashes($name)."', `email`='".addslashes($email)."', `phone`='".addslashes($phone)."', agent_id='".$agent_id."', url_string='".$url_string."' WHERE id=".$user_id.";";
				$conn->query($sql3);

				$sql4 = "UPDATE `tour_customer_detail` SET `name`='".addslashes($name)."', `email`='".addslashes($email)."', `phone`='".addslashes($phone)."' WHERE user_id=".$user_id.";";
				$conn->query($sql4);

				$del_sql = "DELETE FROM `tour_customer_attendees` WHERE `user_id`='".$user_id."' AND `tour_id`='".$tour_detail->ID."' AND `sessionId`='".$sessionId."'";
				$conn->query($del_sql);

				if($tour_detail->attend_allow) {
					if(!empty($_POST['_adults'])) {
						$i=2;
						foreach($_POST['_adults'] as $val) {
							$sql5 = "INSERT INTO `tour_customer_attendees` (`user_id`, `tour_id`, `sessionId`, `name`, `type`, `num`) VALUES ('".$user_id."', '".$tour_detail->ID."', '".$sessionId."', '".addslashes($val)."', 'adults', '".$i++."')";
							$conn->query($sql5);
						}
					}
					if(!empty($_POST['_children'])) {
						$i=1;
						foreach($_POST['_children'] as $val) {
							$sql5 = "INSERT INTO `tour_customer_attendees` (`user_id`, `tour_id`, `sessionId`, `name`, `type`, `num`) VALUES ('".$user_id."', '".$tour_detail->ID."', '".$sessionId."', '".addslashes($val)."', 'children', '".$i++."')";
							$conn->query($sql5);
						}
					}
					if(!empty($_POST['_seniors'])) {
						$i=1;
						foreach($_POST['_seniors'] as $val) {
							$sql5 = "INSERT INTO `tour_customer_attendees` (`user_id`, `tour_id`, `sessionId`, `name`, `type`, `num`) VALUES ('".$user_id."', '".$tour_detail->ID."', '".$sessionId."', '".addslashes($val)."', 'seniors', '".$i++."')";
							$conn->query($sql5);
						}
					}
					if(!empty($_POST['_infants'])) {
						$i=1;
						foreach($_POST['_infants'] as $val) {
							$sql5 = "INSERT INTO `tour_customer_attendees` (`user_id`, `tour_id`, `sessionId`, `name`, `type`, `num`) VALUES ('".$user_id."', '".$tour_detail->ID."', '".$sessionId."', '".addslashes($val)."', 'infants', '".$i++."')";
							$conn->query($sql5);
						}
					}
				}
			}
			else
			{
				$sql2 = "INSERT INTO `tour_customer_detail` (`user_id`, `tour_id`, `sessionId`, `name`, `email`, `phone`, `adults`, `adults_price`, `children`, `children_price`, `seniors`, `seniors_price`, `infants`, `infants_price`, `add_ons`, `add_ons_nom`, `add_ons_price`, `pickup_location`, `subtotal`, `gratuity_amt`, `convenience_fee`, `tax`, `total`, `tour_date`, `tour_time`) VALUES ('".$user_id."', '".$tour_detail->ID."', '".$sessionId."', '".addslashes($name)."', '".addslashes($email)."', '".addslashes($phone)."', '".(int)$adults."', '".(float)$adults_price."', '".(int)$children."', '".(float)$children_price."', '".(int)$seniors."', '".(float)$seniors_price."', '".(int)$infants."', '".(float)$infants_price."', '".addslashes($addons_ids)."', '".addslashes($add_ons_nom)."', '".(float)$addons_sum."', '".addslashes($pickup_location)."', '".(float)$subtotal."', '".(float)$gratuity."', '".(float)$convenience_fee."', '".(float)$tax."', '".(float)$total."', '".addslashes($tour_date)."', '".addslashes($tour_time)."');";

				if($tour_detail->attend_allow) {
					if(!empty($_POST['_adults'])) {
						$i=1;
						foreach($_POST['_adults'] as $val) {
							$sql5 = "INSERT INTO `tour_customer_attendees` (`user_id`, `tour_id`, `sessionId`, `name`, `type`, `num`) VALUES ('".$user_id."', '".$tour_detail->ID."', '".$sessionId."', '".addslashes($val)."', 'adults', '".$i++."')";
							$conn->query($sql5);
						}
					}
					if(!empty($_POST['_children'])) {
						$i=1;
						foreach($_POST['_children'] as $val) {
							$sql5 = "INSERT INTO `tour_customer_attendees` (`user_id`, `tour_id`, `sessionId`, `name`, `type`, `num`) VALUES ('".$user_id."', '".$tour_detail->ID."', '".$sessionId."', '".addslashes($val)."', 'children', '".$i++."')";
							$conn->query($sql5);
						}
					}
					if(!empty($_POST['_seniors'])) {
						$i=1;
						foreach($_POST['_seniors'] as $val) {
							$sql5 = "INSERT INTO `tour_customer_attendees` (`user_id`, `tour_id`, `sessionId`, `name`, `type`, `num`) VALUES ('".$user_id."', '".$tour_detail->ID."', '".$sessionId."', '".addslashes($val)."', 'seniors', '".$i++."')";
							$conn->query($sql5);
						}
					}
					if(!empty($_POST['_infants'])) {
						$i=1;
						foreach($_POST['_infants'] as $val) {
							$sql5 = "INSERT INTO `tour_customer_attendees` (`user_id`, `tour_id`, `sessionId`, `name`, `type`, `num`) VALUES ('".$user_id."', '".$tour_detail->ID."', '".$sessionId."', '".addslashes($val)."', 'infants', '".$i++."')";
							$conn->query($sql5);
						}
					}
				}
			}

	echo "<script>
		var dataLayer  = window.dataLayer || [];
		dataLayer.push({
			'event': 'addToCart',
			'ecommerce': {
				'currencyCode': 'CAD',
				'add': {
				'products': [{
						'name': '".$tour_detail->title."',
						'id': '".$tour_detail->ID."',
						'price': '".$adults_price."',
						'category': '".$tour_detail->category."',
						'quantity': '".$adults."'
					}]
				}
			}
		});
		</script>";
			
			$conn->query($sql2);
			header('Location: '.APPROOT.'checkout');
			exit;
		}
	}
}

$user_result = array();
$user_sql = "SELECT c.id, c.status, c.created_date, cd.* FROM `tour_customers` c, `tour_customer_detail` cd WHERE c.id=cd.user_id AND c.sessionId='".$sessionId."' AND cd.tour_id=".$tour_detail->ID.";";
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
<title>Cart | ToNiagara - Toronto to Niagara Falls Tours</title>
<meta name="description" content="Best Toronto to Niagara Falls Sightseeing Tours. Niagara Falls Tours &amp; Attractions With Special offers! Toll-Free +1 800-653-2242"/>
<meta name="keywords" content="Best Niagara Falls Sightseeing Tours, Tour Packages, Day Tour, Evening Tour, Small Group Custom Tour, Private Tour, Group Tours"/>
<link rel="canonical" href="<?=SITEURL;?>/cart" />
<link href="<?php echo APPROOT; ?>css/payment.css" rel="stylesheet" />
<link href="<?php echo APPROOT; ?>css/bootstrap-datetimepicker.css" rel="stylesheet">
<?php if( $tour_detail->today_allow==0 ) { ?>
<style>
.bootstrap-datetimepicker-widget table td.today, .bootstrap-datetimepicker-widget table td.today:hover {
	background:#fff !important; color:#777777; text-shadow:none; cursor:not-allowed;
}
</style>
<?php } ?>
<?php include 'inner_header.php';?>
<!--banner-->
<div class="day_banner_wra">
  <div class="detail_banner_shadow">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner_txt_l">
            <h2><?php echo $tour_detail->title; ?> <span><?php echo $tour_detail->sub_title; ?></span></h2>
            <div class="hour">
                <?php if(trim($tour_detail->duration)) { ?><i class="fa fa-clock-o"></i> <?php echo $tour_detail->duration; ?><?php } ?>
                <i class="fa fa-comment-o"></i> <a><?php echo $tour_detail->no_reviews; ?> Reviews</a>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="price2">

<?php
if($tour_detail->type=='viator') {
	$price = price_calculator($tour_detail->price);
	$cut_price = '<span>'. $price['sub_price'].'</span> ';
	$big_price = $price['total_price'];
}
else {
	$adults_price = currency($conn, $tour_detail->adults_price, $tour_detail->currency);
	$cut_price = $tour_detail->original_price ? '<span>'.number_format($tour_detail->original_price,2).'</span> ':'';
	$big_price = number_format($adults_price,2);
}
?>


            	<?php echo $cut_price.$big_price; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end banner-->

<!--payment detail-->
<div class="reservation_wra">
  <div class="container">

    <?php $category = explode(",",$tour_detail->category); ?>
    <?php if(in_array('Private Tours',$category)) echo '<div class="private_booking"><i class="fa fa-lock"></i> Private booking</div>'; ?>

    <div class="row">
      <div class="col-lg-12">
        <h3 class="pay_head1">Reservation Form</h3>
        <div class="pay_step">
          <div class="pay_progress">
          <div class="pay_step_box act"><span>1</span><br>Booking Detail</div>
          <div class="pay_step_box"><span>2</span><br>Checkout</div>
          <div class="pay_step_box"><span>3</span><br>Confirmation</div>
          </div>
        </div>
      </div>
    </div>

    <form action="" method="post"  autocomplete="off">
    <input type="hidden" name="id" id="tour_id" value="<?php echo $_GET['id']; ?>">
    <div class="row" id="date_qty">

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-push-6 col-md-push-6 col-sm-push-6">
        <h3 class="pay_form_head">Number of Guests</h3>
        <?php echo $qty_msg; $qty_msg=''; ?>
        <div id="quantity"></div>
        <div class="row">
        <?php if($tour_detail->adults_price) { ?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<?php
            if( $user_result->adults ) $adults = $user_result->adults;
            else if( $_POST['adults'] ) $adults = $_POST['adults'];
            else if( $tour_detail->max_people ) $adults = $tour_detail->max_people;
            else $adults = 1;
            ?>
            <label><?=$tour_detail->price_type=='group'?$tour_detail->adults_text:$tour_detail->adults_label; ?></label>
            <div class="form-group pay_adult">
            <div class="input-group">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" <?php echo $adults==0 ? 'disabled="disabled"' : '';?> data-type="minus" data-field="adults">
              <span class="glyphicon glyphicon-minus"></span>
            </button>
            </span>
            <input type="text" name="adults" id="adults" class="form-control input-number valid each-input" value="<?php echo $adults;?>" min="0" max="100" aria-invalid="false" readonly>
            <input type="hidden" name="_adults_price" value="<?php echo $adults_price; ?>" id="adults_price">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="adults">
            <span class="glyphicon glyphicon-plus"></span>
            </button>
            </span>
            </div>
		    	</div>
          </div>
          <?php } if($tour_detail->children_price) { ?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<?php
            if( $user_result->children ) $children = $user_result->children;
            else if( $_POST['children'] ) $children = $_POST['children'];
            else $children = 0;
            ?>
            <label><?php echo $tour_detail->children_label; ?></label>
            <div class="form-group pay_adult">
            <div class="input-group">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" <?php echo $children==0 ? 'disabled="disabled"' : '';?> data-type="minus" data-field="children">
              <span class="glyphicon glyphicon-minus"></span>
            </button>
            </span>
            <input type="text" name="children" id="children" class="form-control input-number valid each-input" value="<?php echo $children;?>" min="0" max="100" aria-invalid="false" readonly>
            <input type="hidden" name="_children_price" value="<?php echo $children_price; ?>" id="children_price">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="children">
            <span class="glyphicon glyphicon-plus"></span>
            </button>
            </span>
            </div>
		    	</div>


          </div>
          <?php } if($tour_detail->seniors_price) { ?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<?php
            if( $user_result->seniors ) $seniors = $user_result->seniors;
            else if( $_POST['seniors'] ) $seniors = $_POST['seniors'];
            else $seniors = 0;
            ?>
            <label><?php echo $tour_detail->seniors_label; ?></label>
            <div class="form-group pay_adult">
            <div class="input-group">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" <?php echo $seniors==0 ? 'disabled="disabled"' : '';?> data-type="minus" data-field="seniors">
              <span class="glyphicon glyphicon-minus"></span>
            </button>
            </span>
            <input type="text" name="seniors" id="seniors" class="form-control input-number valid each-input" value="<?php echo $seniors;?>" min="0" max="100" aria-invalid="false" readonly>
            <input type="hidden" name="_seniors_price" value="<?php echo $seniors_price; ?>" id="seniors_price">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="seniors">
            <span class="glyphicon glyphicon-plus"></span>
            </button>
            </span>
            </div>
		    	</div>
          </div>
          <?php } if(!empty(trim($tour_detail->infants_label)) && $tour_detail->price_type=='person' && (!in_array('Private Tours',$category))) { //if($tour_detail->infants_price) { ?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<?php
            if( $user_result->infants ) $infants = $user_result->infants;
            else if( $_POST['infants'] ) $infants = $_POST['infants'];
            else $infants = 0;
            ?>
            <label><?php echo $tour_detail->infants_label; ?></label>
            <div class="form-group pay_adult">
            <div class="input-group">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" <?php echo $infants==0 ? 'disabled="disabled"' : '';?> data-type="minus" data-field="infants">
              <span class="glyphicon glyphicon-minus"></span>
            </button>
            </span>
            <input type="text" name="infants" id="infants" class="form-control input-number valid each-input" value="<?php echo $infants;?>" min="0" max="100" aria-invalid="false" readonly>
            <input type="hidden" name="_infants_price" value="<?php echo $infants_price; ?>" id="infants_price">
            <span class="input-group-btn">
            	<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="infants">
            		<span class="glyphicon glyphicon-plus"></span>
            	</button>
            </span>
            </div>
		    	</div>
          </div>
          <?php } ?>
        </div>

        <?php if( !$Mobile_Detect->isMobile() ) { ?>
        <div style="display:<?php echo $tour_detail->allow_pickup_location ? 'block' : 'none'; ?>">
        <h3 class="pay_form_head">Pickup Location <span>(optional)</span></h3>
        <?php echo $pc_msg; $pc_msg=''; ?>
		<?php
        if( $user_result->pickup_location ) $pickup_location = $user_result->pickup_location;
        else if( $_POST['pickup_location'] ) $pickup_location = $_POST['pickup_location'];
        else $pickup_location = '';
        ?>
				<input class="pickup_location" name="pickup_location" type="text" id="autocomplete" placeholder="Enter your hotel name/pickup address" value="<?php echo $pickup_location; ?>" autocomplete="off">
        <div class="t_tip_txt">Example: Enter your hotel name or address. If you don't know your pickup location yet, enter "none" & update us later.</div>
        </div>
        <?php } ?>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-pull-6 col-md-pull-6 col-sm-pull-6">
        <h3 class="pay_form_head">Select Tour Date</h3>
        <div class="form-group1">
            <div class="row">
                <div class="col-md-8">
                    <?php echo $date_msg; $date_msg=''; ?>
                    <?php
										$datetimepicker = '';
										$tour_date = '';
										if( $user_result->cut_off_time ) {
											$tour_date = strtotime($user_result->cut_off_time);
											$datetimepicker = date('F d, Y',$tour_date);
											$tour_date = date('Y-m-d', $tour_date);
										} else if( $user_result->tour_date ) {
											$tour_date = strtotime($user_result->tour_date);
											$datetimepicker = date('F d, Y',$tour_date);
											$tour_date = date('Y-m-d', $tour_date);
										} else if( isset($_POST['tour_date']) ) {
											$tour_date = strtotime($_POST['tour_date']);
											$datetimepicker = date('F d, Y',$tour_date);
											$tour_date = date('Y-m-d', $tour_date);
										} else {
											if( $tour_detail->cut_off_time ) {
												if( $tour_detail->date_allow ) {
													$date = explode(" - ",$tour_detail->date_allow);

													$ok 	= strtotime($date[0]);
													$now 	= strtotime('+'.($tour_detail->cut_off_time).' days');

													if($ok>$now) $tour_date = $ok;
													else $tour_date = $now;

													//$ok = strtotime($date[0]);
													//$ok1 = strtotime('+'.($tour_detail->cut_off_time).' days', $ok);
													//$now = strtotime('+'.($tour_detail->cut_off_time).' days');
													//$tour_date = ($now<$ok1) ? $ok1 : $now;
												}
												else {
													$tour_date = strtotime('+'.($tour_detail->cut_off_time).' days');
												}
												$datetimepicker = date('F d, Y',$tour_date);
												$tour_date = date('Y-m-d', $tour_date);
											} else if( $tour_detail->today_allow ) {
												$tour_date = strtotime('now');
												$datetimepicker = date('F d, Y',$tour_date);
												$tour_date = date('Y-m-d', $tour_date);
											} else if( $tour_detail->date_allow ) {
												$date = explode(" - ",$tour_detail->date_allow);
												$tour_date = strtotime($date[0]);
												$datetimepicker = $tour_date<strtotime('now') ? date('F d, Y',strtotime('+1 day')) : date('F d, Y',$tour_date);
												$tour_date = $tour_date<strtotime('now') ? date('Y-m-d',strtotime('+1 day')) : date('Y-m-d', $tour_date);
											}
											else {
												$datetimepicker = date('F d, Y',strtotime('+1 day'));
												$tour_date = date('Y-m-d', strtotime('+1 day'));
											}
										}
										?>
                    <input type="hidden" name="tour_date" id="tour_date" value="<?php echo $tour_date; ?>" class="pickup_location" placeholder="Pick a date" autocomplete="off" readonly>
                    <input type="hidden" name="datetimepicker" id="datetimepicker" value="<?php echo $datetimepicker; ?>" class="pickup_location" placeholder="Pick a date" autocomplete="off" readonly>
                    <div id="datetimepicker12"></div>

                    <?php if($tour_detail->time_slot) { ?>
                    <?php $time_slot = explode(",",$tour_detail->time_slot); ?>
                    <?php
                    if( $user_result->tour_time ) {
											$tour_time = $user_result->tour_time;
										}
										?>
                    <?php echo $time_msg; $time_msg=''; ?>
                    <ul class="time-slot" id="time_qty">
											<?php foreach($time_slot as $ts) { ?>
                      <li title="<?=trim($ts); ?>" class="<?php if($tour_time==trim($ts)) echo 'act'; ?>"><?=trim($ts); ?></li>
											<?php } ?>
                    </ul>
                    <?php } ?>
                    <input type="hidden" name="tour_time" id="tour_time" value="<?php echo $tour_time; ?>" />
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class="row" id="contact_info">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:<?=(!empty($user->name) && $user->tour_id!=$tour_detail->ID)?'none':'block'; ?>">
        <h3 class="pay_form_head">Contact Info</h3>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label class="pay_lable2">Name (Lead Traveler)</label>
            <?php echo $name_msg; $name_msg=''; ?>
            <?php $name = ($user) ? $user->name : $user_result->name; ?>
            <?php $email = ($user) ? $user->email : $user_result->email; ?>
            <?php $phone = ($user) ? $user->phone : $user_result->phone; ?>

            <input required type="text" name="name" placeholder="Full Name" class="pickup_location" value="<?php echo ($name) ? $name : $_POST['name']; ?>" autocomplete="off">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label class="pay_lable2">Email</label>
            <?php echo $email_msg; $email_msg=''; ?>
            <input required type="email" name="email" placeholder="Email Address" class="pickup_location" value="<?php echo ($email) ? $email : $_POST['email']; ?>" autocomplete="off" oninvalid="setCustomValidity('Invalid email address')" onchange="try{setCustomValidity('')}catch(e){}">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label class="pay_lable2">Phone (Optional) </label>
            <input type="tel" name="phone" placeholder="Mobile number recommended" class="pickup_location" value="<?php echo ($phone) ? $phone : $_POST['phone']; ?>" autocomplete="off">
          </div>
        </div>

		<div class="row" id="attendees">
		<?php 
		$adults = 1; $children = $seniors = $infants = 0;
		$attendees = attendees($conn, $user->user_id, $user->tour_id);
		if( isset($_POST['name']) &&  !empty($_POST['name']) ) {

			if( isset($_POST['_adults']) ) {
				$id  = '';
				foreach( $_POST['_adults']  as $val) { 
					$adults++;
					$id = 'adults_'.$adults;
					$lable = $tour_detail->price_type=='group'?$tour_detail->adults_text:$tour_detail->adults_label.' Traveler ' . $adults; ?>
					<div id="<?php echo $id; ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<label class="pay_lable2"><?php echo ucfirst($lable); ?> </label>
						<input type="text" placeholder="Full Name" name="_adults[]" value="<?php echo $val; ?>" class="pickup_location" required />
					</div><?php
				}
			}
			if( isset($_POST['_children']) ) {
				$id  = '';
				foreach( $_POST['_children']  as $val) { 
					$children++;
					$id = 'children_'.$children;
					$lable = $tour_detail->children_label.' Traveler ' .  $children; ?>
					<div id="<?php echo $id; ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<label class="pay_lable2"><?php echo ucfirst($lable); ?> </label>
						<input type="text" placeholder="Full Name" name="_children[]" value="<?php echo $val; ?>" class="pickup_location" required />
					</div><?php
				}
			}
			if( isset($_POST['_seniors']) ) {
				$id  = '';
				foreach( $_POST['_seniors']  as $val) { 
					$seniors++;
					$id = 'seniors_'.$seniors;
					$lable = $tour_detail->seniors_label.' Traveler ' .  $seniors; ?>
					<div id="<?php echo $id; ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<label class="pay_lable2"><?php echo ucfirst($lable); ?> </label>
						<input type="text" placeholder="Full Name" name="_seniors[]" value="<?php echo $val; ?>" class="pickup_location" required />
					</div><?php
				}
			}
			if( isset($_POST['_infants']) ) {
				$id  = 1;
				foreach( $_POST['_infants']  as $val) { 
					$infants++;
					$id = 'infants_'.$infants;
					$lable = $tour_detail->infants_label.' Traveler ' .  $infants; ?>
					<div id="<?php echo $id; ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<label class="pay_lable2"><?php echo ucfirst($lable); ?> </label>
						<input type="text" placeholder="Full Name" name="_infants[]" value="<?php echo $val; ?>" class="pickup_location" required />
					</div><?php
				}
			}
		}
		else if($attendees) 
		{ 
			while( $attend = $attendees->fetch_object() ) {
				$id = '';
				if($attend->type=='adults') {
					$adults++;
					$id = 'adults_'.$adults;
					$lable = $tour_detail->price_type=='group'?$tour_detail->adults_text:$tour_detail->adults_label.' Traveler ' . $attend->num;
				}
				else if($attend->type=='children') {
					$children++;
					$id = 'children_'.$children;
					$lable = $tour_detail->children_label.' Traveler ' .  $attend->num;
				}
				else if($attend->type=='seniors') {
					$seniors++;
					$id = 'seniors_'.$seniors;
					$lable = $tour_detail->seniors_label.' Traveler ' .  $attend->num;
				}
				else if($attend->type=='infants') {
					$infants++;
					$id = 'infants_'.$infants;
					$lable = $tour_detail->infants_label.' Traveler ' .  $attend->num;
				}			
				?>
				<div id="<?php echo $id ; ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<label class="pay_lable2"><?php echo ucfirst($lable); ?> </label>
					<input type="text" placeholder="Full Name" name="_<?php echo $attend->type; ?>[]" value="<?php echo $attend->name; ?>" class="pickup_location" required />
				</div>
				<?php } ?>
		<?php } ?>
		</div>

      </div>

	<?php if( $Mobile_Detect->isMobile() ) { ?>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:<?php echo $tour_detail->allow_pickup_location ? 'block' : 'none'; ?>">
      <h3 class="pay_form_head">Pickup Location <span>(optional)</span></h3>
      <?php echo $pc_msg; $pc_msg=''; ?>
      <?php
      if( $user_result->pickup_location ) $pickup_location = $user_result->pickup_location;
      else if( $_POST['pickup_location'] ) $pickup_location = $_POST['pickup_location'];
      else $pickup_location = '';
      ?>
      <input class="pickup_location" name="pickup_location" type="text" id="autocomplete" placeholder="Enter your hotel name/pickup address" value="<?php echo $pickup_location; ?>" >
      <div class="t_tip_txt">Example: Enter your hotel name or address. If you don't know your pickup location yet, enter "none" & update us later.</div>
      </div>
      <?php } ?>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      	<?php
				$add_ons = explode(",",$user_result->add_ons);
				$add_ons_nom = explode(",",$user_result->add_ons_nom);

				$add_ons_ids = $tour_detail->add_ons_ids ? $tour_detail->add_ons_ids : 0;
				$condition = "status=1 AND addons_id IN (".$add_ons_ids.")";
				$result = query_all($conn, "tour_add_ons", $condition, '`addons_order` ASC');
				if ($result->num_rows > 0) {
        ?>
				<h3 class="pay_form_head">ADD ONS <span>(optional)</span></h3>
        <div class="row">
        <?php
					$i=0;$k=0;
					while($model = $result->fetch_object()) {
						if($i++%2==0) echo '</div><div class="row">';
        ?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <label class="pay_lable"><?php echo $model->addons_title; ?> <span class="addon_price">(CA$<?php echo $model->addons_price; ?> / add-on)</span> <b class="t_tip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo $model->addons_desc; ?>"><i class="fa fa-info"></i></b></label>
          <div class="form-group pay_adult">
            <div class="input-group">
            	<?php
							$value = 0;
							if(!empty($_POST['addons'])) {
              	if( (array_key_exists($model->addons_id, $_POST['addons'])) ) {
									$value =  $_POST['addons'][$model->addons_id];
								}
							}
							else if(!empty($add_ons)) {
              	if( (in_array($model->addons_id, $add_ons)) ) {
									$key = array_search ($model->addons_id, $add_ons);
									$value =  $add_ons_nom[$key];
								}
							}
							?>
              <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" <?php echo $value==0 ? 'disabled="disabled"' : '';?> data-type="minus" data-field="addons[<?php echo $model->addons_id; ?>]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
              </span>
              <input type="text" name="addons[<?php echo $model->addons_id; ?>]" id="<?php echo "addons_".$model->addons_id; ?>" class="form-control input-number valid" value="<?php echo $value; ?>" min="0" max="100" aria-invalid="false" readonly>
              <input type="hidden" name="addons_price[<?php echo $model->addons_id; ?>]" value="<?php echo $model->addons_price; ?>" id="<?php echo "addons_price_".$model->addons_id; ?>">
              <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="addons[<?php echo $model->addons_id; ?>]">
              <span class="glyphicon glyphicon-plus"></span>
              </button>
            </span>
            </div>
          </div>
          <div class="t_tip_txt"><?php echo $model->addons_desc; ?></div>
        </div>
        <?php } ?>
       </div>
       <?php } ?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="pay_btn">
        <img class="desk-ssl-secure" src="<?php echo APPROOT; ?>images/ssl-secure-encryption.svg" alt="ssl-secure-encryption.svg" width="100">
        <button name="SUBMIT" class="pay_continue" type="submit">Continue</button>
        <img class="mob-ssl-secure" src="<?php echo APPROOT; ?>images/ssl-secure-encryption.svg" alt="ssl-secure-encryption.svg" width="100">
        </div>
      </div>
    </div>
    </form>

  </div>
</div>
<!--end payment detail-->

<?php include 'footer.php';?>

<script type="text/javascript" src="<?php echo APPROOT; ?>js/moment-with-locales.js"></script>
<script type="text/javascript" src="<?php echo APPROOT; ?>js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo APPROOT; ?>/js/moment-timezone-with-data.js"></script>
<script>
function validate(evt) {
	var theEvent = evt || window.event;

	// Handle paste
	if (theEvent.type === 'paste') {
		key = event.clipboardData.getData('text/plain');
	} else {
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode(key);
	}
	var regex = /[0-9]|\./;
	if( !regex.test(key) ) {
	theEvent.returnValue = false;
	if(theEvent.preventDefault) theEvent.preventDefault();
	}
}

$(function () {

	$('.time-slot li').click(function(){
		$('.time-slot li').removeClass('act');
		$(this).addClass('act');
		$('#tour_time').val( $(this).attr('title') );
	});

	<?php
	$en=$str='';
	if( $user_result->tour_date && strtotime($user_result->tour_date)>strtotime('now') ) {
		$str.="defaultDate:'".$user_result->tour_date."',";
	}
	else if( $_POST['tour_date'] && strtotime($_POST['tour_date'])>strtotime('now')  ) {
		$str.="defaultDate:'".$_POST['tour_date']."',";
	}
	else {
		if(!empty($tour_detail->date_allow)) {
			$explode = explode(" - ",$tour_detail->date_allow);
			if($tour_detail->cut_off_time) {
			 $ok = strtotime($explode[0]);
			 $ok1 = strtotime('+'.($tour_detail->cut_off_time).' days', $ok);
			 $now = strtotime('+'.($tour_detail->cut_off_time).' days');
			 $str.=($now<$ok1) ? "defaultDate:'".date('Y-m-d', $ok)."'," : "defaultDate:'".date('Y-m-d', $now)."',";
			}
			else if( strtotime($explode[0]) <= strtotime(date('Y-m-d')) )
			 $str.="defaultDate:'".date('Y-m-d', strtotime('+1 day'))."',";
			else
			 $str.="defaultDate:'".$explode[0]."',";
		}
		else {
			if($tour_detail->cut_off_time) {
			 $str.="defaultDate:'".date('Y-m-d', strtotime('+'.($tour_detail->cut_off_time).' days'))."',";
			}
			else if($tour_detail->today_allow==0) {
				$str.="defaultDate:'".date('Y-m-d', strtotime('+1 day'))."',";
			}
			else {
				$str.="defaultDate:'".date('Y-m-d', strtotime('now'))."',";
			}
		}
	}

	if(!empty($tour_detail->date_allow)) {
		$explode 		= explode(" - ",$tour_detail->date_allow);

		$diff = strtotime($explode[0]) - strtotime('now');
		$cot = 86400 * $tour_detail->cut_off_time;

		$add_date 	= ($tour_detail->cut_off_time) && $diff<$cot ? (86400 * ($tour_detail->cut_off_time-1)) : 0;
		$start_date = strtotime($explode[0]) + $add_date;
		$end_date 	= strtotime($explode[1]);
		$str.="enabledDates: [";
		for($d=$start_date; $d<=$end_date; $d=$d+86400) {
			if(strtotime('now')<=$d)
			$en.= '"'.date('Y-m-d',$d).'",';
		}
		$str.=substr($en,0,-1);
		$str.="],";
	}

	echo 'var b = moment.tz("Canada/Eastern").format();';

	if($tour_detail->today_allow==1) {
		echo "var start_date = moment().add(-1, 'days');";
	}
	else {
		if($tour_detail->cut_off_time) {
			if(trim($tour_detail->date_allow)) {
				$date = explode(" - ",$tour_detail->date_allow);
				$ok 	= strtotime($date[0]);
			}
			else {
				$ok 	= strtotime('now');
			}
			$now 	= strtotime('+'.$tour_detail->cut_off_time.' days');


			if($ok>$now) { $str1 = $ok; }
			else { $str1 = $now; }
			//echo $ok.'---'.$now; exit;

			$start_dt = strtotime('+'.($tour_detail->cut_off_time).' days', $str1);
			$disable_dt = strtotime('+'.($tour_detail->cut_off_time-1).' days');
			echo "var start_date = '".date('Y-m-d',$str1)."';";
			$str.="disabledDates:['".date('Y-m-d',$disable_dt)."'],";
			//}
			//else
			//echo "var start_date = moment();";
		}
		else
		echo "var start_date = moment();";
	}
	?>

	if(screen.width > 767) {
		$('#datetimepicker').attr('type','hidden');
		$('#datetimepicker12').datetimepicker({
			timeZone: 'Canada/Eastern',
			inline: true,
			sideBySide: false,
  		format: 'MMMM DD, YYYY',
			minDate:start_date,

			<?php echo $str; ?>
		});
	}
	else {
		$('#datetimepicker').attr('type','text');
		$('#datetimepicker').datetimepicker({
			timeZone: 'Canada/Eastern',
  		format: 'MMMM DD, YYYY',
			minDate:start_date,
			ignoreReadonly: true,
			widgetPositioning:{
        horizontal: 'auto',
        vertical: 'bottom'
    	},
			<?php echo $str; ?>
		});
	}

	$('#datetimepicker12, #datetimepicker').on('dp.change', function(event) {
		var formatted_date = event.date.format('YYYY-MM-DD');
    $('#tour_date').val(formatted_date);
  });

	$('.today').prev().addClass('disabled');
});

var seniors = <?php echo $seniors; ?>;
var adults = <?php echo $adults; ?>;
var children = <?php echo $children; ?>;
var infants = <?php echo $infants; ?>;
$('.btn-number').click(function(e){
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');

	var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {

			<?php if($tour_detail->attend_allow) { ?>
			if(fieldName=='adults') {
				var id = 'adults_'+adults;
				adults--; //console.log(adults);
				$('#'+id).remove();
			}
			else if(fieldName=='children') {
				var id = 'children_'+children;
				children--;
				$('#'+id).remove();
			}
			else if(fieldName=='seniors') {
				var id = 'seniors_'+seniors;
				seniors--;
				$('#'+id).remove();
			}
			else if(fieldName=='infants') {
				var id = 'infants_'+infants;
				infants--;
				$('#'+id).remove();
			}
			<?php } ?>

			//console.log(id);
			
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            }
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
				
				<?php if($tour_detail->attend_allow) { ?>
				if(fieldName=='adults') {
					adults++; //console.log(adults);
					var id = 'adults_'+adults; //console.log(id);
					var lable = '<?=$tour_detail->price_type=='group'?$tour_detail->adults_text:$tour_detail->adults_label; ?> Traveler ' + adults;
					var str = '<div id="'+id+'" class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="pay_lable2">'+lable+'</label><input type="text" placeholder="Full Name" name="_'+fieldName+'[]" class="pickup_location" required /></div>';
					$('#attendees').append( str );
				}
				else if(fieldName=='children') {
					children++;
					var id = 'children_'+children;
					var lable = '<?php echo $tour_detail->children_label; ?> Traveler ' + children;
					var str = '<div id="'+id+'" class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="pay_lable2">'+lable+'</label><input type="text" placeholder="Full Name" name="_'+fieldName+'[]" class="pickup_location" required /></div>';
					$('#attendees').append( str );
				}
				else if(fieldName=='seniors') {
					seniors++;
					var id = 'seniors_'+seniors;
					var lable = '<?php echo $tour_detail->seniors_label; ?> Traveler ' + seniors;
					var str = '<div id="'+id+'" class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="pay_lable2">'+lable+'</label><input type="text" placeholder="Full Name" name="_'+fieldName+'[]" class="pickup_location" required /></div>';
					$('#attendees').append( str );
				}
				else if(fieldName=='infants') {
					infants++;
					var id = 'infants_'+infants;
					var lable = '<?php echo $tour_detail->infants_label; ?> Traveler ' + infants;
					var str = '<div id="'+id+'" class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><label class="pay_lable2">'+lable+'</label><input type="text" placeholder="Full Name" name="_'+fieldName+'[]" class="pickup_location" required /></div>';
					$('#attendees').append( str );
				}
				<?php } ?>

			}
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }

    } else {
        input.val(0);
    }
});

$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});

<?php if($error_id) { ?>
$('html, body').animate({ scrollTop: $("#<?=$error_id;?>").offset().top }, 1000);
<?php } ?>

$('.input-number').change(function() {

    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }

		<?php if($tour_detail->price_type=='group') { ?>
		var num = 0;
		$( ".each-input" ).each(function( index ) {
			num = num + parseInt( $(this).val());
		});
		if(num><?=$tour_detail->max_people;?>) {
			num = num-1;
			$(this).val(num);
			$('#quantity').addClass('error').html('Number of Guests cannot exceed <?=$tour_detail->max_people;?>.');
		}
		else {
			$('#quantity').removeClass('error').html('');
		}
		<?php } ?>

});

$(".input-number").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
				 // Allow: Ctrl+A
				(e.keyCode == 65 && e.ctrlKey === true) ||
				 // Allow: home, end, left, right
				(e.keyCode >= 35 && e.keyCode <= 39)) {
						 // let it happen, don't do anything
						 return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
		}
});
</script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>
