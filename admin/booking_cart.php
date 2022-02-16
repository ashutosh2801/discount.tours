<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
$agent_id = $sessionId = 0;

$_sql = "SELECT * FROM `tour_customers` WHERE id=".$_GET['user_id'].";";
$_query = $conn->query($_sql);
if($_query->num_rows > 0 ) {
	$_model = $_query->fetch_object();
	$agent_id = $_model->agent_id;
	$sessionId = $_model->sessionId;
}

$tour_detail = array();
if(!empty($_GET['id']))
{
	$tour_detail = tour_detail($conn, (int)$_GET['id']);
	if ( $tour_detail->ID ) {
		$adults_price 	= currency($conn, $tour_detail->adults_price, $tour_detail->currency);
		$children_price = currency($conn, $tour_detail->children_price, $tour_detail->currency);
		$seniors_price 	= currency($conn, $tour_detail->seniors_price, $tour_detail->currency);
		$infants_price 	= currency($conn, $tour_detail->infants_price, $tour_detail->currency);
	}
	else {
		header('Location: '.APPROOT.'admin/error?url='.$_SESSION['page_url']);
		exit;
	}
} 
else {
	header('Location: '.APPROOT.'admin/');
	exit;
}

$error_id = '';
if(!empty($_POST['id']))
{
	extract($_POST);
	
	//echo '<pre>'; print_r($addons); print_r($addons_price); exit;
	
	$max_people = $adults + $children + $seniors + $infants; 
	$flag=0;
	if( empty($tour_date) ) {
		$date_msg = '<div class="error">Select a valid date.</div>';
		$error_id = 'date_qty';
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
			$order_id 	= orderId();

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
			
			$gratuity = $tour_detail->gratuity ? ($subtotal * $tour_detail->gratuity)/100 : 0;
			$convenience_fee = $tour_detail->convenience_fee;
			$tax 			= $tour_detail->tax_allow ? ($subtotal * 13)/100 : 0;
			$total 		= ($subtotal + $tax + $gratuity);
			
			$sq2 = "SELECT * FROM `tour_customer_detail` WHERE sessionId='".$sessionId."' AND tour_id=".$tour_detail->ID;
			$query2 = $conn->query($sq2);
			if( $query2->num_rows > 0 )
			{
				$result2 = $query2->fetch_object();
				$sql2 = "UPDATE `tour_customer_detail` SET `user_id`='".$user_id."', `tour_id`='".$tour_detail->ID."', `sessionId`='".$sessionId."', `name`='".addslashes($name)."', `email`='".addslashes($email)."', `phone`='".addslashes($phone)."', `adults`='".(int)$adults."', `adults_price`='".(float)$adults_price."', `children`='".(int)$children."', `children_price`='".(float)$children_price."', `seniors`='".(int)$seniors."', `seniors_price`='".(float)$seniors_price."', `infants`='".(int)$infants."', `infants_price`='".(float)$infants_price."', `add_ons`='".addslashes($addons_ids)."', `add_ons_nom`='".addslashes($add_ons_nom)."', `add_ons_price`='".(float)$addons_sum."', `pickup_location`='".addslashes($pickup_location)."', `subtotal`='".(float)$subtotal."', `gratuity_amt`='".(float)$gratuity."', `convenience_fee`='".(float)$convenience_fee."', `tax`='".(float)$tax."', `total`='".(float)$total."', `tour_date`='".addslashes($tour_date)."', `tour_time`='".addslashes($tour_time)."' WHERE cid=".$result2->cid.";";
				
				$sql3 = "UPDATE `tour_customers` SET `name`='".addslashes($name)."', `email`='".addslashes($email)."', `phone`='".addslashes($phone)."', agent_id='".$agent_id."', url_string='".$url_string."' WHERE id=".$user_id.";";
				$conn->query($sql3);
				
				$sql4 = "UPDATE `tour_customer_detail` SET `name`='".addslashes($name)."', `email`='".addslashes($email)."', `phone`='".addslashes($phone)."' WHERE user_id=".$user_id.";";
				$conn->query($sql4);
				
				$sq6 = "SELECT * FROM `tour_customer_detail_copy` WHERE cid=".$result2->cid;
				$query6 = $conn->query($sq6);
				if( $query6->num_rows == 0 )
				{
					$sql5 = "INSERT INTO tour_customer_detail_copy (`cid`, `user_id`, `tour_id`, `sessionId`, `name`, `email`, `phone`, `adults`, `adults_price`, `children`, `children_price`, `seniors`, `seniors_price`, `infants`, `infants_price`, `add_ons`, `add_ons_nom`, `add_ons_price`, `pickup_location`, `subtotal`, `gratuity_amt`, `convenience_fee`, `tax`, `total`, `tour_date`, `tour_time`) SELECT `cid`, `user_id`, `tour_id`, `sessionId`, `name`, `email`, `phone`, `adults`, `adults_price`, `children`, `children_price`, `seniors`, `seniors_price`, `infants`, `infants_price`, `add_ons`, `add_ons_nom`, `add_ons_price`, `pickup_location`, `subtotal`, `gratuity_amt`, `convenience_fee`, `tax`, `total`, `tour_date`, `tour_time` FROM tour_customer_detail WHERE cid=".$result2->cid.";";
					$conn->query($sql5);
				} 
			}
			else 
			{
				$sql2 = "INSERT INTO `tour_customer_detail` (`user_id`, `tour_id`, `sessionId`, `name`, `email`, `phone`, `adults`, `adults_price`, `children`, `children_price`, `seniors`, `seniors_price`, `infants`, `infants_price`, `add_ons`, `add_ons_nom`, `add_ons_price`, `pickup_location`, `subtotal`, `gratuity_amt`, `convenience_fee`, `tax`, `total`, `tour_date`, `tour_time`) VALUES ('".$user_id."', '".$tour_detail->ID."', '".$sessionId."', '".addslashes($name)."', '".addslashes($email)."', '".addslashes($phone)."', '".(int)$adults."', '".(float)$adults_price."', '".(int)$children."', '".(float)$children_price."', '".(int)$seniors."', '".(float)$seniors_price."', '".(int)$infants."', '".(float)$infants_price."', '".addslashes($addons_ids)."', '".addslashes($add_ons_nom)."', '".(float)$addons_sum."', '".addslashes($pickup_location)."', '".(float)$subtotal."', '".(float)$gratuity."', '".(float)$convenience_fee."', '".(float)$tax."', '".(float)$total."', '".addslashes($tour_date)."', '".addslashes($tour_time)."');";
			}
			
			$conn->query($sql2);
			header('Location: '.APPROOT.'admin/booking_checkout.php?id='.$_GET['user_id']);
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
<title>Booking Cart :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<link href="<?php echo APPROOT; ?>css/payment.css" rel="stylesheet" />
<link href="<?php echo APPROOT; ?>css/bootstrap-datetimepicker.css" rel="stylesheet">
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
              <span style="float:right"><strong><span>«</span> <a href="booking_checkout.php?id=<?php echo $_GET['user_id']; ?>">Back to Checkout</a></strong></span>
              <ul>
                <li><a href="index.php">Dashboard</a><span>«</span></li>
                <li><a href="customers_unconfirm.php">New Booking</a><span>«</span></li>
                <li>Cart</li>
              </ul>
              
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" autocomplete="off">
            
					  <h2 class="w3_inner_tittle"><?php echo $tour_detail->title.' '.$tour_detail->sub_title; ?></h2>
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
						?>
            <div class="forms-main_agileits">
              <div class="row set-1_w3ls">
                <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                  <div class="grid-1">
                      <div class="form-body">
                      
                      <input type="hidden" name="id" id="tour_id" value="<?php echo $_GET['id']; ?>">
                      
                       <div class="row1">
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
                        </div>
                        
                        <h3 class="pay_form_head">Contact Info</h3>
												<?php $name = ($user) ? $user->name : $user_result->name; ?>
                        <?php $email = ($user) ? $user->email : $user_result->email; ?>
                        <?php $phone = ($user) ? $user->phone : $user_result->phone; ?>

                        <div class="form-group">
                        	
													<?php 
                          $datetimepicker = '';
                          $tour_date = '';
                          if( $user_result->tour_date ) {
                            $tour_date = strtotime($user_result->tour_date);
                            $datetimepicker = date('F d, Y',$tour_date);
                            $tour_date = date('Y-m-d', $tour_date);
                          } else if( isset($_POST['tour_date']) ) {
                            $tour_date = strtotime($_POST['tour_date']);
                            $datetimepicker = date('F d, Y',$tour_date);
                            $tour_date = date('Y-m-d', $tour_date);
                          } else {
                            if( $tour_detail->today_allow ) {
                              $tour_date = strtotime('now');
                              $datetimepicker = date('F d, Y',$tour_date);
                              $tour_date = date('Y-m-d', $tour_date);
                            }
                            else if( $tour_detail->date_allow ) {
                              $date = explode(" - ",$tour_detail->date_allow);
                              $datetimepicker = date('F d, Y',strtotime($date[0]));
                              $tour_date = date('Y-m-d', strtotime($date[0]));
                            }
                            else {
                              $datetimepicker = date('F d, Y',strtotime('now'));
                              $tour_date = date('Y-m-d', strtotime('now'));
                            }
                          }
                          ?>
                          <label for="name" class="col-sm-3 col-xs-12 control-label">Pick a Date</label>
                          <div class="col-sm-9 col-xs-12">
                            <input type="hidden" name="tour_date" id="tour_date" value="<?php echo $tour_date; ?>" class="pickup_location" placeholder="Pick a date" autocomplete="off" readonly>
                            <input type="text" required="true" class="form-control1" name="datetimepicker" id="datetimepicker" placeholder="Pick a Date" autocomplete="off">
                            <?php echo $date_msg; $date_msg=''; ?>
														
                            <?php if($tour_detail->time_slot) { ?>
														<br>
														<?php $time_slot = explode(",",$tour_detail->time_slot); ?>
                            <ul class="time-slot">
                              <?php foreach($time_slot as $ts) { ?>
                              <li title="<?=trim($ts); ?>" class="<?php if($tour_time==$ts) echo 'act'; ?>"><?=trim($ts); ?></li>
                              <?php } ?>
                            </ul>
                            <?php } ?>
                            <input type="hidden" name="tour_time" id="tour_time" value="<?php echo $tour_time; ?>" />
                          </div>
                          
                        </div>
                        
                        <div class="form-group">
                          <label for="name" class="col-sm-3 col-xs-12 control-label">Full Name</label>
                          <div class="col-sm-9 col-xs-12">
														<?php echo $name_msg; $name_msg=''; ?>
                            <input type="text" required="true" class="form-control1" name="name" id="name" placeholder="Full Name" value="<?php echo ($name) ? $name : $_POST['name']; ?>" autocomplete="off">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="created_on" class="col-sm-3 col-xs-12 control-label">Email Address</label>
                          <div class="col-sm-9 col-xs-12 ">
                          	<?php echo $email_msg; $email_msg=''; ?>
                            <input type="text" required="true" class="form-control1" name="email" id="email" placeholder="Email Address" value="<?php echo ($email) ? $email : $_POST['email']; ?>" autocomplete="off">
                          </div>
                        </div> 
                        <div class="form-group">
                          <label for="created_on" class="col-sm-3 col-xs-12 control-label">Phone (Optional)</label>
                          <div class="col-sm-9 col-xs-12 ">
                            <input type="text" class="form-control1" name="phone" id="phone" placeholder="Mobile number recommended" value="<?php echo ($phone) ? $phone : $_POST['phone']; ?>" autocomplete="off">
                          </div>
                        </div> 
                        
                        <div class="form-group">
                          <label for="status" class="col-sm-3 col-xs-12 control-label"> </label>
                          <div class="col-sm-9 col-xs-12 ">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Continue</button>
                          </div>  
                        </div>
                        
                        </div>
                    </div>
                </div> 
                
                <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                
                
                	<div style="display:<?php echo $tour_detail->allow_pickup_location ? 'block' : 'none'; ?>">
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
            </div>
            </form>
          </div>  
        <!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->

<?php require_once('includes/footer.php'); ?>
<script type="text/javascript" src="<?php echo APPROOT; ?>js/moment-with-locales.js"></script>
<script type="text/javascript" src="<?php echo APPROOT; ?>js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo APPROOT; ?>js/moment-timezone-with-data.js"></script>
<script type="text/javascript" >
$(document).ready(function() {
	
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
			if( strtotime($explode[0]) <= strtotime(date('Y-m-d')) )
			$str.="defaultDate:'".date('Y-m-d', strtotime('+1 day'))."',";
			else
			$str.="defaultDate:'".$explode[0]."',";
		}
		else {
			if($tour_detail->today_allow==0) {
				$str.="defaultDate:'".date('Y-m-d', strtotime('+1 day'))."',";
			}
			else {
				$str.="defaultDate:'".date('Y-m-d', strtotime('+1 day'))."',";
			}
		}
		/*if($tour_detail->today_allow==0) {
			$str.="defaultDate:'".date('Y-m-d', strtotime('+1 day'))."',";
		}*/
	}
	if(!empty($tour_detail->date_allow)) {
		$explode = explode(" - ",$tour_detail->date_allow);
		$date = strtotime($explode[1]) + 86400;
		$str.="enabledDates: [";
		for($d=strtotime($explode[0]); $d<=$date; $d=$d+86400) {
			if(strtotime('now')<=$d) 
			$en.= '"'.date('Y-m-d',$d).'",'; 
		}
		$str.=substr($en,0,-1);
		$str.="],";
	}
	
	if($tour_detail->today_allow==0) {
		//$str.="useCurrent:false";
		echo "var tomorrow = moment();";
	}
	else { 
		echo "var tomorrow = moment();";
	}
	?>
	var b = moment.tz("Canada/Eastern").format();
	$('#datetimepicker').datetimepicker({
		timeZone: 'Canada/Eastern',
		format: 'MMMM DD, YYYY',
		minDate:tomorrow,
		ignoreReadonly: true,
		widgetPositioning:{
			horizontal: 'auto',
			vertical: 'bottom'
		},
		<?php echo $str; ?>
	});
	
	$('#datetimepicker').on('dp.change', function(event) {
		var formatted_date = event.date.format('YYYY-MM-DD');
    $('#tour_date').val(formatted_date);
  });
	
	//$('.form-horizontal').valida();
	
	$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
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

});
</script>
<script type="text/javascript" src="js/valida.2.1.6.min.js"></script>
<script type="text/javascript" src="js/validator.min.js"></script>
</body>
</html>