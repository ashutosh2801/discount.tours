<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
$sessionId = session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Booking Confirmation :: <?php echo SITENAME; ?></title>
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
              <ul>
                <li><a href="index.php">Dashboard</a><span>«</span></li>
                <li><a href="add_new_booking.php">New Booking</a><span>«</span></li>
                <li>Confirmation</li>
              </ul>
            </div>
          </div>
          <!-- //breadcrumbs -->
          
					<div class="inner_content_w3_agile_info two_in">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" autocomplete="off">
            
					  <h2 class="w3_inner_tittle text-center">Confirmation</h2>
            <?php 
						if(!empty($_SESSION['msg'])) { 
							echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
							$_SESSION['msg']='';
						}
						?>
            <div class="forms-main_agileits">
              <div class="row set-1_w3ls">
                <div class="col-md-12 button_set_one agile_info_shadow graph-form">
                  <div class="grid-1">
                    <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <?php
      $sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.currency, t.price_type, t.gratuity, t.convenience_fee, t.category FROM `tour_customers` c, `tour_customer_detail` cd, `tour_tours` t WHERE c.id=cd.user_id AND c.status=1 AND cd.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
      $query = $conn->query($sql);
      if($query->num_rows > 0 ) {
        echo '<h2 class="booking_head">Your booking request has been received.</h2>
      <p class="booking_txt">Your booking request has been received, but has not been confirmed. We will review the booking and confirm its status as soon as possible. Your credit card will not be charged until the booking is confirmed. The charge on your credit card statement will appear as "TONIAGARA".</p>
';
        $subtotal = $sub_total = $tax = $total = 0;
        while($model = $query->fetch_object()) {
          $sub_total = $cnt = 0;
          
          if($model->add_ons_price) { $sub_total+= $model->add_ons_price; }
          
          if($model->currency=='US') { $cflag=1; }
      
          $adults_price 	= $adults = 0;
          $children_price = $children = 0;
          $seniors_price 	= $seniors = 0;
          $infants_price 	= $infants = 0;
          
          if($model->adults) { $adults = $model->adults; $adults_price = $model->adults_price; $cnt+=$model->adults; }
          if($model->children) { $children = $model->children; $children_price = $model->children_price; $cnt+=$model->children; }
          if($model->seniors) { $seniors = $model->seniors; $seniors_price = $model->seniors_price; $cnt+=$model->seniors; }
          if($model->infants) { $infants = $model->infants; $infants_price = $model->infants_price; $cnt+=$model->infants; }
          
          if($model->price_type=='person') {
            $sub_total+= ($adults * $adults_price) + ($children * $children_price) + ($seniors * $seniors_price) + ($infants * $infants_price);
          }
          else if($model->price_type=='group') {
            $sub_total+= $adults_price;
          }
          
          $dataLayer['products'][] = array(
                                            'productTitle' => $model->title, 
                                            'productType' => 'activities',
                                            'productSku' => rand(50,99),
                                            'productPrice' => $adults_price,
                                            'productQuantity' => $adults,
                                            'productCategory' => $model->category
                                          );
                                          
      ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="booking_tbl">
        <thead>
        <tr>
          <td colspan="2"><?=$model->title; ?> <span><?=strtoupper(date('D d M',strtotime($model->tour_date))); ?></span></td>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td width="40%">
          <h3>CUSTOMER DETAILS</h3>
          <ul>
          <li><strong><?=$model->name; ?></strong></li>	 
          <li><i class="fa fa-envelope"></i> <?=$model->email; ?></li>
          <li><i class="fa fa-phone"></i> <?=$model->phone; ?></li>
          <li><i class="fa fa-users"></i> <?=$cnt; ?> Reserved</li>	 
          </ul>
          </td>
          <td width="60%">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
              <?php if($model->adults) { ?>
              <?php if($model->price_type=='person') { ?>
              <?php $item[] = $model->ID."_sku_adults"; $amt[] = round($model->adults_price,2); $qty[] = $model->adults; ?>
              <tr>
                <td>Adults (<?php echo $model->adults; ?> × CA$<?php echo $model->adults_price; ?>)</td>
                <td align="right">CA$<?php echo number_format(($model->adults * $model->adults_price),2); ?></td>
              </tr>
              <?php } else if($model->price_type=='group') { ?>
              <?php $item[] = $model->ID."_sku_group"; $amt[] = round($model->adults_price,2); $qty[] = $model->adults; ?>
              <tr>
                <td>Number of Guests (<?php echo $model->adults; ?>)</td>
                <td align="right">CA$<?php echo number_format($model->adults_price,2); ?></td>
              </tr>
              <?php }
              } if($model->children) { ?>
              <?php $item[] = $model->ID."_sku_children"; $amt[] = round($model->children_price,2); $qty[] = $model->children; ?>
              <tr>
                <td>Children (<?php echo $model->children; ?> × CA$<?php echo $model->children_price; ?>)</td>
                <td align="right">CA$<?php echo number_format(($model->children * $model->children_price),2); ?></td>
              </tr>
              <?php } if($model->seniors) { ?>
              <?php $item[] = $model->ID."_sku_seniors"; $amt[] = round($model->seniors_price,2); $qty[] = $model->seniors; ?>
              <tr>
                <td>Seniors (<?php echo $model->seniors; ?> × CA$<?php echo $model->seniors_price; ?>)</td>
                <td align="right">CA$<?php echo number_format(($model->seniors * $model->seniors_price),2); ?></td>
              </tr>
              <?php } if($model->infants) { ?>
              <?php $item[] = $model->ID."_sku_infants"; $amt[] = 0; $qty[] = $model->infants; ?>
              <tr>
                <td>Infants (<?php echo $model->infants; ?>)</td>
                <td align="right">Free</td>
              </tr>
              <?php } if($model->add_ons_price) { ?>
              <tr>
                <td>Add-Ons</td>
                <td align="right">CA$<?php echo number_format($model->add_ons_price,2); ?></td>
              </tr>
              <?php } ?>
              </tbody>
              <?php list($whole, $decimal) = explode('.', number_format($sub_total,2) ); ?>
              <tfoot>
              <tr>
                <td>Total</td>
                <td align="right">CA$<?php echo $whole; ?> <sup><?=$decimal; ?></sup></td>
              </tr>
              </tfoot>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <h3>ADD-ONS PURCHASED</h3>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="booking_addon_tbl">
              <?php
              $sql2 = "SELECT * FROM `tour_add_ons` WHERE addons_id IN (".$model->add_ons.");";
              $query2 = $conn->query($sql2);
              if($query2->num_rows > 0 ) {
                $k = 0;
                $add_ons_nom = explode(",",$model->add_ons_nom);
                while($model2 = $query2->fetch_object()) {
                  $sub_total+= ($add_ons_nom[$k]*$model2->addons_price);
                  $item[] = $model->ID."_sku_addons_".$model2->addons_id; 
                  $amt[] = $model2->addons_price; 
                  $qty[] = $add_ons_nom[$k];
              ?>
              <tr>
                <td><?php echo $model2->addons_title; ?></td>
                <td align="right">Qty	<?php echo $add_ons_nom[$k++]; ?></td>
              </tr>
              <?php } ?>
              <?php } ?>
            </table>
          </td>
        </tr>
        </tbody>  
      </table>
      <?php $subtotal+= ($sub_total - $model->add_ons_price); ?>
			<?php $discount+= $model->discount; ?>
      <?php $tax+= $model->tax; ?>
      <?php $gratuity_amt+= $model->gratuity_amt; ?>
      <?php $convenience_fee+= $model->convenience_fee; ?>
			<?php $coupon = $model->coupon;  ?>
      <?php } ?>
      <?php list($whole, $decimal) = explode('.', number_format($subtotal,2) ); ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="booking_total_tbl">
        <tr>
          <td>Total</td>
          <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
        </tr>
				<?php if(($discount>0)) { list($whole, $decimal) = explode('.', number_format($discount,2) );  ?>
        <tr class="discount" style="color:#F00">
          <td>Discount</td>
          <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
        </tr>
        <?php } if($tax>0) { list($whole, $decimal) = explode('.', number_format($tax,2) ); ?>
        <tr>
          <td>Taxes & fees (13%)</td>
          <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
        </tr>
        <?php } if($gratuity_amt>0) { list($whole, $decimal) = explode('.', number_format($gratuity_amt,2) );  ?>
        <tr>
          <td>Gratuity (15%)</td>
          <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
        </tr>
        <?php } if($convenience_fee>0) { list($whole, $decimal) = explode('.', number_format($convenience_fee,2) );  ?>
        <tr>
          <td>Convenience fee</td>
          <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
        </tr>
        <?php } ?>
        <?php if($tax>0 || $gratuity_amt>0 || $convenience_fee>0) { ?>
        <?php $total = ($subtotal + $tax + $gratuity_amt + $convenience_fee) - $discount;; ?>
        <?php list($whole, $decimal) = explode('.', number_format($total,2) ); ?>
        <tr class="last_tr">
          <td>Grand Total</td>
          <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
        </tr>
        <?php } ?>
      </table>
      <div align="center"><a id="cmd" href="javascript::void();" onClick="window.print()"><i class="fa fa-print"></i> Print</a></div>
      <?php } else { ?>
      <?php /*?><script> window.location.href = '<?php echo APPROOT.'tours'; ?>' </script><?php */?>
      <?php } ?>
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
<?php session(true); ?>
</body>
</html>