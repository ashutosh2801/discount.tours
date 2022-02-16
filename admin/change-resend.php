<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

$error_id = '';
$_SESSION['msg'] = '';
if(isset($_POST['update']) || isset($_POST['resend']))
{
	extract($_POST);

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

  if( empty($tour_date) ) {
		$date_msg = '<div class="error">Select a valid date.</div>';
		$error_id = 'date_qty';
		$flag=1;
	}

	if(	$flag == 0 )
	{
		$sql4 = "UPDATE `tour_customer_detail` SET `name`='".addslashes($name)."', `email`='".addslashes($email)."', `phone`='".addslashes($phone)."', `tour_date`='".$tour_date."' WHERE cid=".$_GET['id'].";";
		$conn->query($sql4);
		$affected_rows = $conn->affected_rows;
		
		$sq2 = "SELECT * FROM `tour_customer_detail` WHERE cid=".$_GET['id'].";";
		$query2 = $conn->query($sq2);
		$result2 = $query2->fetch_object();
		
		$sql3 = "UPDATE `tour_customers` SET `name`='".addslashes($name)."', `email`='".addslashes($email)."', `phone`='".addslashes($phone)."' WHERE id=".$result2->user_id.";";
		$conn->query($sql3);
		
		
		$sq20 = "SELECT * FROM `tour_customers` WHERE id=".$result2->user_id.";";
		$query20 = $conn->query($sq20);
		$result20 = $query20->fetch_object();
		
		if(isset($_POST['resend']))
		{
			$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.price_type FROM `tour_customers` c, `tour_customer_detail` cd, tour_tours t WHERE c.id=cd.user_id AND c.order_id='".$result20->order_id."' AND cd.tour_id=t.ID limit 1;";
			$query = $conn->query($sql);
			if($query->num_rows > 0 ) 
			{
				$subtotal = $tax = $cnt = $total = 0;
				$tour_title = array();
	
				$HTML.= '<table width="100%" border="0" cellspacing="0" cellpadding="4" style="background:url(https://www.toniagara.com/images/w_mark.png); border:1px solid #ccc; margin:15px 0; padding:15px;font-size:13px;">';
				while($model = $query->fetch_object()) 
				{
					$adults_price 	= $adults = 0;
					$children_price = $children = 0;
					$seniors_price 	= $seniors = 0;
					$infants_price 	= $infants = 0;
	
					if($model->adults) { $adults = $model->adults; $adults_price = $model->adults_price; $cnt+=$model->adults; }
					if($model->children) { $children = $model->children; $children_price = $model->children_price; $cnt+=$model->children; }
					if($model->seniors) { $seniors = $model->seniors; $seniors_price = $model->seniors_price; $cnt+=$model->seniors; }
					if($model->infants) { $infants = $model->infants; $infants_price = $model->infants_price; $cnt+=$model->infants; }
	
					if($model->price_type=='person') {
						$subtotal+= ($adults * $adults_price) + ($children * $children_price) + ($seniors * $seniors_price) + ($infants * $infants_price);
					}
					else if($model->price_type=='group') {
						$subtotal+= $adults_price;
					}
	
					//$tour_title[]= $model->title;
					$departure_date	= strtoupper(date('F d 2019',strtotime($model->tour_date)));
					$phone = $model->phone ? $model->phone : 'NA';
					$customer_info = '<div style="font-size:13px; color:#999;">Customer Name</div>
					<div style="font-size:16px; color:#000; font-weight:600; margin:5px 0 10px 0;">'.$model->name.'</div>
					<div style="font-size:13px; color:#00569f;">'.$model->email.'</div>
					<div style="font-size:13px; margin:10px 0;"><strong>Phone:</strong> '.$phone.'</div>
					<div style="font-size:13px;"><strong>'.$cnt.'</strong> Reserved</div>';
	
					if($model->adults) {
						if($model->price_type=='person') {
							$HTML.= '<tr>
								<td rowspan="9" valign="top">'.$customer_info.'</td>
								<td>Adults ('.$model->adults.' × CA$'. $model->adults_price.')</td>
								<td>CA$'. number_format(($model->adults * $model->adults_price),2).'</td>
							</tr>';
						}
						else if($model->price_type=='group') {
							$HTML.= '<tr>
								<td rowspan="9" valign="top">'.$customer_info.'</td>
								<td>Number of Guests ('.$model->adults.')</td>
								<td>CA$'. number_format($model->adults_price,2).'</td>
							</tr>';
						}
					} if($model->children) {
					$HTML.= '<tr>
						<td>Children ('. $model->children.' × CA$'. $model->children_price.')</td>
						<td>CA$'. number_format(($model->children*$model->children_price),2).'</td>
					</tr>';
					} if($model->seniors) {
					$HTML.= '<tr>
						<td>Seniors ('. $model->seniors.' × CA$'. $model->seniors_price.')</td>
						<td>CA$'. number_format(($model->seniors*$model->seniors_price),2).'</td>
					</tr>';
					} if($model->infants) {
					$HTML.= '<tr>
						<td>Infants ('. $model->infants.' × CA$'. $model->infants_price.')</td>
						<td>CA$'. number_format(($model->infants*$model->infants_price),2).'</td>
					</tr>';
					}
	
					$HTML.= '<tr>
						<td colspan="2" style="border-bottom:1px solid #ccc;"></td>
					</tr>';
	
					$sub_total+= $subtotal;
					$tax+= $model->tax;
					$gratuity+= $model->gratuity_amt;
					$convenience_fee+= $model->convenience_fee;
	
					/*$HTML.= '<tr>
										 <td><strong>Total</strong></td>
										 <td><strong>CA$'. number_format($subtotal,2).'</strong></td>
									 </tr>';*/
	
					//$sub_total+= $subtotal;
				}
	
				$total = ($sub_total + $tax + $gratuity + $convenience_fee);
	
				list($whole, $decimal) = explode('.', number_format($sub_total,2));
				$HTML.= '
						<tr>
							<td><strong>Total</strong></td>
							<td><strong>CA$ '. $whole.' <sup><u>'. $decimal .'</u></sup></strong></td>
						</tr>';
				if($tax) {
					list($whole, $decimal) = explode('.', number_format($tax,2));
					$HTML.= '<tr>
							<td>Taxes & fees (13%)</td>
							<td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
						</tr>';
				}
				if($gratuity) {
					list($whole, $decimal) = explode('.', number_format($gratuity,2));
					$HTML.= '<tr>
							<td>Gratuity</td>
							<td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
						</tr>';
				}
				if($convenience_fee) {
					list($whole, $decimal) = explode('.', number_format($convenience_fee,2));
					$HTML.= '<tr>
							<td>Convenience fee</td>
							<td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
						</tr>';
				}
				$HTML.= '<tr>
					<td colspan="2" style="border-bottom:1px solid #ccc;"></td>
				</tr>';
				list($whole, $decimal) = explode('.', number_format($total,2));
				$HTML.= '<tr>
							<td><strong>Grand Total</strong></td>
							<td><strong>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></strong></td>
						</tr></table>';
	
				$sql3 = "SELECT * FROM `tour_customers` WHERE order_id='".$orderId."' LIMIT 1;";
				$query3 = $conn->query($sql3);
				if($query3->num_rows > 0 ) {
					$model3 = $query3->fetch_object();
					$name 			= $model3->name;
					$email 			= $model3->email;
					$phone 			= $model3->phone;
					$auth_id		= $model3->auth_id;
				}
			}
	
			$htmlContent = file_get_contents("emails/helicopter-ticket.html");

			$message = str_replace("{{customer_tour_info}}", $HTML, $htmlContent);
			$message = str_replace("{{departure_date}}", $departure_date, $message);
			$message = str_replace("{{name}}", $name, $message);

			$subject = 'ToNiagara - Your booking request has been confirmed. Order ID - '.$orderId;

			sendMail( array($email, $name), $subject, $message);
			sendMail( array('info@toniagara.com', $name), $subject, $message);
			$_SESSION['msg'] = 'Mail has been sent!';				
			
		}
	}
}

$user_result = array();
$user_sql = "SELECT * FROM `tour_customer_detail` WHERE cid=".$_GET['id'];
$user_query = $conn->query($user_sql);
if($user_query->num_rows > 0 )
$user_result = $user_query->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Booking Update :: <?php echo SITENAME; ?></title>
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
              <span style="float:right"><strong><span>«</span> <a href="customers_confirm.php">Back to Confirm Booking</a></strong></span>
              <ul>
                <li><a href="index.php">Dashboard</a><span>«</span></li>
                <li><a href="customers_confirm.php">Confirm Booking</a><span>«</span></li>
                <li>Update Customer Information</li>
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

                        <h3 class="pay_form_head text-center">Update Customer Information</h3>
												<?php $name = ($user) ? $user->name : $user_result->name; ?>
                        <?php $email = ($user) ? $user->email : $user_result->email; ?>
                        <?php $phone = ($user) ? $user->phone : $user_result->phone; ?>
                        <?php $tour_date = ($user) ? $user->tour_date : $user_result->tour_date; ?>

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
                          <label for="created_on" class="col-sm-3 col-xs-12 control-label">Tour Date</label>
                          <div class="col-sm-9 col-xs-12 ">
                            <input type="text" class="form-control1" name="tour_date" id="tour_date" placeholder="tour date" value="<?php echo ($tour_date) ? $tour_date : $_POST['tour_date']; ?>" autocomplete="off">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="status" class="col-sm-3 col-xs-12 control-label"> </label>
                          <div class="col-sm-9 col-xs-12 ">
                            <button type="submit" name="update" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Update</button>
                            <button type="submit" name="resend" class="btn btn-success"><i class="fa fa-envelope" aria-hidden="true"></i> Resend</button>
                          </div>
                        </div>

                        </div>
                    </div>
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

	$('#tour_date').datetimepicker({
		timeZone: 'Canada/Eastern',
		format: 'YYYY-MM-DD',
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
