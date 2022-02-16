<?php
require_once('includes/config.php');
require_once('includes/functions.php');
require_once('includes/Mobile_Detect.php');
$Mobile_Detect = new Mobile_Detect;
$sessionId = session_id();

$tour_detail = array();
if(!empty($_GET['id']))
{
	$tour_detail = tour_detail($conn, (int)$_GET['id']);
	if ( !$tour_detail->ID) {
		header('Location: /error');
		exit;
	}
} 
else {
	header('Location: /tours');
	exit;
}

if(!empty($_POST['id']))
{
	extract($_POST);
	
	//echo '<pre>'; print_r($addons); print_r($addons_price); exit;
	
	$max_people = $adults + $children + $seniors + $infants; 
	$flag=0;
	if( empty($tour_date) ) {
		$date_msg = '<div class="error">Select a valid date!</div>';
		$flag=1;
	}
	if( empty($adults) && empty($children) && empty($seniors) && empty($infants) ) {
		$qty_msg = '<div class="error">Quantity must be at least 1!</div>';
		$flag=1;
	}
	else if( $max_people>$tour_detail->max_people && $tour_detail->price_type=='group' ) {
		$qty_msg = '<div class="error">Quantity cannot exceed max. '.$tour_detail->max_people.'!</div>';
		$flag=1;
	}
	/*if( empty($pickup_location) ) {
		$pc_msg = '<div class="error">Pickup location is required!</div>';
		$flag=1;
	}*/
	$name = test_input($name);
	if( empty($name) ) {
		$name_msg = '<div class="error">Name is required!</div>';
		$flag=1;
	}
	else if (!preg_match("/^[a-zA-Z. ]*$/",$name)) {
		$name_msg = '<div class="error">Invalid name format.</div>';
		$flag=1;
	}
	
	$email = test_input($email);
	if( empty($email) ) {
		$email_msg = '<div class="error">Email address is required!</div>';
		$flag=1;
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
		$email_msg = '<div class="error">Invalid email address!</div>';
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
			$sql = "INSERT INTO `tour_customers` (`sessionId`, `order_id`, `name`, `email`, `phone`, `status`, `created_date`) VALUES ('".$sessionId."', '".$order_id."', '".addslashes($name)."', '".addslashes($email)."', '".addslashes($phone)."', '0', '".date('Y-m-d H:i:s')."');";
			$conn->query($sql);
			$user_id = $conn->insert_id;
		}
		
		if ($user_id) 
		{
			$_ids = $_memb = array();
			$addons_ids = $add_ons_nom = '';
			$addons_sum = 0;
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
			
			$adults_price 	= $adults ? $tour_detail->adults_price : 0;
			$children_price = $children ? $tour_detail->children_price : 0;
			$seniors_price 	= $seniors ? $tour_detail->seniors_price : 0;
			$infants_price 	= $infants ? $tour_detail->infants_price : 0;
			
			if($tour_detail->price_type=='person') {
				$subtotal = $addons_sum + ($adults * $adults_price) + ($children * $children_price) + ($seniors * $seniors_price) + ($infants * $infants_price);
			}
			else if($tour_detail->price_type=='group') {
				$subtotal = $addons_sum + $adults_price;
			}
			
			$tax 			= ($subtotal * 13)/100;
			$total 		= ($subtotal + $tax);
			
			$sq2 = "SELECT * FROM `tour_customer_detail` WHERE sessionId='".$sessionId."' AND tour_id=".$tour_detail->ID;
			$query2 = $conn->query($sq2);
			if( $query2->num_rows > 0 )
			{
				$result2 = $query2->fetch_object();
				$sql2 = "UPDATE `tour_customer_detail` SET `user_id`='".$user_id."', `tour_id`='".$tour_detail->ID."', `sessionId`='".$sessionId."', `name`='".addslashes($name)."', `email`='".addslashes($email)."', `phone`='".addslashes($phone)."', `adults`='".(int)$adults."', `adults_price`='".(float)$adults_price."', `children`='".(int)$children."', `children_price`='".(float)$children_price."', `seniors`='".(int)$seniors."', `seniors_price`='".(float)$seniors_price."', `infants`='".(int)$infants."', `infants_price`='".(float)$infants_price."', `add_ons`='".addslashes($addons_ids)."', `add_ons_nom`='".addslashes($add_ons_nom)."', `add_ons_price`='".(float)$addons_sum."', `pickup_location`='".addslashes($pickup_location)."', `subtotal`='".(float)$subtotal."', `tax`='".(float)$tax."', `total`='".(float)$total."', `tour_date`='".addslashes($tour_date)."' WHERE cid=".$result2->cid.";";
			}
			else 
			{
				$sql2 = "INSERT INTO `tour_customer_detail` (`user_id`, `tour_id`, `sessionId`, `name`, `email`, `phone`, `adults`, `adults_price`, `children`, `children_price`, `seniors`, `seniors_price`, `infants`, `infants_price`, `add_ons`, `add_ons_nom`, `add_ons_price`, `pickup_location`, `subtotal`, `tax`, `total`, `tour_date`) VALUES ('".$user_id."', '".$tour_detail->ID."', '".$sessionId."', '".addslashes($name)."', '".addslashes($email)."', '".addslashes($phone)."', '".(int)$adults."', '".(float)$adults_price."', '".(int)$children."', '".(float)$children_price."', '".(int)$seniors."', '".(float)$seniors_price."', '".(int)$infants."', '".(float)$infants_price."', '".addslashes($addons_ids)."', '".addslashes($add_ons_nom)."', '".(float)$addons_sum."', '".addslashes($pickup_location)."', '".(float)$subtotal."', '".(float)$tax."', '".(float)$total."', '".addslashes($tour_date)."');";
			}
			
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
<?php /*?><link href="<?php echo APPROOT; ?>js/select2/select2.min.css" rel="stylesheet">
<link href="<?php echo APPROOT; ?>js/select2/s2-docs.css" rel="stylesheet"><?php */?>
<?php include 'inner_header.php';?>
<!--banner-->
<div class="day_banner_wra" style="background: url(<?php echo tour_banner($tour_detail->banner_image); ?>) 0 0 no-repeat; background-size: cover;">
<div class="detail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">

    <h2><?php echo $tour_detail->title; ?> <span></span></h2>
    <div class="hour">
        <?php if(trim($tour_detail->duration)) { ?><i class="fa fa-clock-o"></i> <?php echo $tour_detail->duration; ?><?php } ?>  
        <i class="fa fa-comment-o"></i> <a><?php echo $tour_detail->no_reviews; ?> Reviews</a>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
    </div>
    <div class="price2"><?php echo $tour_detail->currency."$".($tour_detail->adults_price); ?></div>
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
    <div class="row">
      
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-push-6 col-md-push-6 col-sm-push-6">
        <h3 class="pay_form_head">Quantity</h3>
        <?php echo $qty_msg; $qty_msg=''; ?>
        <div id="quantity"></div>
        <div class="row">
        	<?php if($tour_detail->adults_price) { ?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<?php 
            if( $user_result->adults ) $adults = $user_result->adults;
            else if( $_POST['adults'] ) $adults = $_POST['adults'];
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
            <input type="text" name="adults" id="adults" class="form-control input-number valid each-input" value="<?php echo $adults;?>" min="0" max="50" aria-invalid="false" readonly>
            <input type="hidden" name="adults_price" value="<?php echo $tour_detail->adults_price; ?>" id="adults_price">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="adults">
            <span class="glyphicon glyphicon-plus"></span>
            </button>
            </span>
            </div>
		    	</div>
          </div>
          <?php } if($tour_detail->seniors_price) { ?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<?php 
            if( $user_result->children ) $children = $user_result->children;
            else if( $_POST['children'] ) $children = $_POST['children'];
            else $children = 0;
            ?>
            <label>Children (Age 4-12 years)</label>
            <div class="form-group pay_adult">
            <div class="input-group">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" <?php echo $children==0 ? 'disabled="disabled"' : '';?> data-type="minus" data-field="children">
              <span class="glyphicon glyphicon-minus"></span>
            </button>
            </span>
            <input type="text" name="children" id="children" class="form-control input-number valid each-input" value="<?php echo $children;?>" min="0" max="50" aria-invalid="false" readonly>
            <input type="hidden" name="children_price" value="<?php echo $tour_detail->children_price; ?>" id="children_price">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="children">
            <span class="glyphicon glyphicon-plus"></span>
            </button>
            </span>
            </div>
		    	</div>
            
            
          </div>
          <?php } if($tour_detail->children_price) { ?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<?php 
            if( $user_result->seniors ) $seniors = $user_result->seniors;
            else if( $_POST['seniors'] ) $seniors = $_POST['seniors'];
            else $seniors = 0;
            ?>
            <label>Seniors (Age 60+)</label>
            <div class="form-group pay_adult">
            <div class="input-group">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" <?php echo $seniors==0 ? 'disabled="disabled"' : '';?> data-type="minus" data-field="seniors">
              <span class="glyphicon glyphicon-minus"></span>
            </button>
            </span>
            <input type="text" name="seniors" id="seniors" class="form-control input-number valid each-input" value="<?php echo $seniors;?>" min="0" max="50" aria-invalid="false" readonly>
            <input type="hidden" name="seniors_price" value="<?php echo $tour_detail->seniors_price; ?>" id="seniors_price">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="seniors">
            <span class="glyphicon glyphicon-plus"></span>
            </button>
            </span>
            </div>
		    	</div>
            
            
          </div>
          <?php } if($tour_detail->price_type=='person') { //if($tour_detail->infants_price) { ?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<?php 
            if( $user_result->infants ) $infants = $user_result->infants;
            else if( $_POST['infants'] ) $infants = $_POST['infants'];
            else $infants = 0;
            ?>
            <label>Infants (Age 0-3 Years Free)</label>
            <div class="form-group pay_adult">
            <div class="input-group">
            <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number" <?php echo $infants==0 ? 'disabled="disabled"' : '';?> data-type="minus" data-field="infants">
              <span class="glyphicon glyphicon-minus"></span>
            </button>
            </span>
            <input type="text" name="infants" id="infants" class="form-control input-number valid each-input" value="<?php echo $infants;?>" min="0" max="50" aria-invalid="false" readonly>
            <input type="hidden" name="infants_price" value="<?php echo $tour_detail->infants_price; ?>" id="infants_price">
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
        <h3 class="pay_form_head">Pickup Location <span>(optional)</span></h3>
        <?php echo $pc_msg; $pc_msg=''; ?>
				<?php 
        if( $user_result->pickup_location ) $pickup_location = $user_result->pickup_location;
        else if( $_POST['pickup_location'] ) $pickup_location = $_POST['pickup_location'];
        else $pickup_location = '';
        ?>
				<input class="pickup_location" name="pickup_location" type="text" id="autocomplete" placeholder="Enter your hotel name/pickup address" value="<?php echo $pickup_location; ?>" autocomplete="off">
        <div class="t_tip_txt">Example: Enter your hotel name or address. If you don't know your pickup location yet, enter "none" & update us later.</div>
        <?php } ?>
      </div>
      
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-pull-6 col-md-pull-6 col-sm-pull-6">
        <h3 class="pay_form_head">Select Tour Date</h3>
        <div class="form-group1">
            <div class="row">
                <div class="col-md-8">
                    <?php echo $date_msg; $date_msg=''; ?>
                    <input type="hidden" name="tour_date" id="tour_date" value="<?php echo $user_result->tour_date ? $user_result->tour_date : $_POST['tour_date'];?>" class="pickup_location" placeholder="Pick a date" autocomplete="off" readonly>
                    <input type="hidden" name="datetimepicker" id="datetimepicker" value="<?php echo $user_result->tour_date ? $user_result->tour_date : $_POST['tour_date'];?>" class="pickup_location" placeholder="Pick a date" autocomplete="off" readonly>
                    <div id="datetimepicker12"></div>
                </div>
            </div>
        </div>
      </div>
      
    </div>
    
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:<?=(!empty($user_result->name) && $user_result->tour_id!=$tour_detail->ID)?'none':'block'; ?>">
        <h3 class="pay_form_head">Contact Info</h3>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label class="pay_lable2">Name</label>
            <?php echo $name_msg; $name_msg=''; ?>
            <input type="text" name="name" placeholder="Full Name" class="pickup_location" value="<?php echo ($user_result->name) ? $user_result->name : $_POST['name']; ?>" autocomplete="off">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label class="pay_lable2">Email</label>
            <?php echo $email_msg; $email_msg=''; ?>
            <input type="email" name="email" placeholder="Email Address" class="pickup_location" value="<?php echo ($user_result->email) ? $user_result->email : $_POST['email']; ?>" autocomplete="off">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label class="pay_lable2">Phone (optional)</label>
            <input type="tel" name="phone" placeholder="Phone Number" class="pickup_location" value="<?php echo ($user_result->phone) ? $user_result->phone : $_POST['phone']; ?>" autocomplete="off">
          </div>
        </div>
        
        
        <?php if( $Mobile_Detect->isMobile() ) { ?>
        <h3 class="pay_form_head">Pickup Location <span>(optional)</span></h3>
        <?php echo $pc_msg; $pc_msg=''; ?>
				<?php 
        if( $user_result->pickup_location ) $pickup_location = $user_result->pickup_location;
        else if( $_POST['pickup_location'] ) $pickup_location = $_POST['pickup_location'];
        else $pickup_location = '';
        ?>
				<input class="pickup_location" name="pickup_location" type="text" id="autocomplete" placeholder="Enter your hotel name/pickup address" value="<?php echo $pickup_location; ?>" >
        <div class="t_tip_txt">Example: Enter your hotel name or address. If you don't know your pickup location yet, enter "none" & update us later.</div>
        <?php } ?>
        
        
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      	<?php
				$add_ons = explode(",",$user_result->add_ons);
				$add_ons_nom = explode(",",$user_result->add_ons_nom);
				
				$add_ons_ids = $tour_detail->add_ons_ids ? $tour_detail->add_ons_ids : 0;
				$condition = "status=1 AND addons_id IN (".$add_ons_ids.")";
				$result = query_all($conn, "tour_add_ons", $condition, '`addons_price` DESC');
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
          <label class="pay_lable"><?php echo $model->addons_title; ?> <span class="addon_price">(CA$<?php echo $model->addons_price; ?> / add-on)</span> </label>
          <div class="form-group pay_adult">
            <div class="input-group">
            	<?php
							$value = 0;
							if(!empty($add_ons)) {
              	if(in_array($model->addons_id, $add_ons)) {
									$value =  $add_ons_nom[$k++];
								}
							}
							?>
              <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" <?php echo $value==0 ? 'disabled="disabled"' : '';?> data-type="minus" data-field="addons[<?php echo $model->addons_id; ?>]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
              </span>              
              <input type="text" name="addons[<?php echo $model->addons_id; ?>]" id="<?php echo "addons_".$model->addons_id; ?>" class="form-control input-number valid" value="<?php echo $value; ?>" min="0" max="50" aria-invalid="false" readonly>
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
        <button class="pay_continue" type="submit">Continue</button>
        </div>
      </div>
    </div>
    </form>
    
  </div>
</div>
<!--end payment detail-->

<?php include 'footer.php';?>
<?php /*?><script src="<?php echo APPROOT; ?>/js/select2/select2.full.js"></script>
<script>
$("#pickup_location").select2({
	escapeMarkup: function (markup) { return markup; },
	minimumInputLength: 1,
});
</script><?php */?>
<?php /*?><script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvVSR6Mo6O2YE6ZbieoN7EiJOZjT3qyHM&libraries=places" type="text/javascript"></script><?php */?>
<script src="<?php echo APPROOT; ?>js/moment-with-locales.js"></script>
<script src="<?php echo APPROOT; ?>js/bootstrap-datetimepicker.js"></script>
<script>
<?php /*?>var autocomplete;
var form = { 
	street_number: 'short_name', 
	route: 'long_name', 
	locality: 'long_name', 
	administrative_area_level_1: 'short_name', 
	country: 'long_name', 
	postal_code: 'short_name' 
};

function initAutocomplete() {
	var options = { types: ['geocode'], componentRestrictions: {country: "ca"} };
	autocomplete = new google.maps.places.Autocomplete( (document.getElementById('autocomplete')), options );	
	google.maps.event.addListener(autocomplete, 'place_changed');
}<?php */?>

$(function () {
	
	//initAutocomplete();
	
  //$('[data-toggle="tooltip"]').tooltip();
	if(screen.width > 767) {
		$('#datetimepicker').attr('type','hidden');
		$('#datetimepicker12').datetimepicker({
			inline: true,
			sideBySide: false,
  		format: 'MMMM DD, YYYY',
			minDate:new Date(),
			useCurrent: false,
			<?php 
			if( $user_result->tour_date ) echo "defaultDate:'".$user_result->tour_date."'";
			else if( $_POST['tour_date'] ) echo "defaultDate:'".$_POST['tour_date']."'";
			?>
		});
	}
	else {
		$('#datetimepicker').attr('type','text');
		$('#datetimepicker').datetimepicker({
  		format: 'MMMM DD, YYYY',
			useCurrent: false,
			minDate:new Date(),
			ignoreReadonly: true,
			widgetPositioning:{
        horizontal: 'auto',
        vertical: 'bottom'
    	},
			<?php 
			if( $user_result->tour_date ) echo "defaultDate:'".$user_result->tour_date."'";
			else if( $_POST['tour_date'] ) echo "defaultDate:'".$_POST['tour_date']."'";
			?>
		});
	}
	
	$('#datetimepicker12, #datetimepicker').on('dp.change', function(event) {
		var formatted_date = event.date.format('YYYY-MM-DD');
    $('#tour_date').val(formatted_date);
  });
	
});

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
			$('#quantity').addClass('error').html('Quantity cannot exceed max.<?=$tour_detail->max_people;?>!');
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
</body>
</html>
