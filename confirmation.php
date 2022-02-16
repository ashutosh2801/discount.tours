<?php
require_once('includes/config.php');
require_once('includes/functions.php');
$sessionId = session();
$dataLayer = $item = $amt = $qty = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Confirmation | ToNiagara - Toronto to Niagara Falls Tours</title>
<meta name="description" content="Best Toronto to Niagara Falls Sightseeing Tours. Niagara Falls Tours &amp; Attractions With Special offers! Toll-Free +1 800-653-2242"/>
<meta name="keywords" content="Best Niagara Falls Sightseeing Tours, Tour Packages, Day Tour, Evening Tour, Small Group Custom Tour, Private Tour, Group Tours"/>
<link rel="canonical" href="<?=SITEURL;?>/confimation" />
<link href="<?php echo APPROOT; ?>css/payment.css" rel="stylesheet" />

<?php include 'inner_header.php';?>

<div class="reservation_wra">
  <div class="container">
  	<div class="row">
      <div class="col-lg-12">
        <h3 class="pay_head1">CONFIRMATION</h3>
        <div class="pay_step">
          <div class="pay_progress2">
          <div class="pay_step_box act"><span>1</span><br>Booking Detail</div>
          <div class="pay_step_box act"><span>2</span><br>Checkout</div>
          <div class="pay_step_box act"><span>3</span><br>Confirmation</div>
          </div>
        </div>      
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <?php
				$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.currency, t.price_type, t.gratuity, t.convenience_fee, t.category, t.price_type, t.adults_text, t.adults_label, t.children_label, t.seniors_label, t.infants_label FROM `tour_customers` c, `tour_customer_detail` cd, `tour_tours` t WHERE c.id=cd.user_id AND c.status=1 AND cd.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
				$query = $conn->query($sql);
				if($query->num_rows > 0 ) {
					echo '<h2 class="booking_head">Your booking request has been received.</h2>
          <p class="booking_txt">Your booking request has been received, but has not been confirmed. We will review the booking and confirm its status as soon as possible. Your credit card will not be charged until the booking is confirmed. The charge on your credit card statement will appear as "TONIAGARA".</p>';
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
            $dataLayer['items'][] = array(
                  'name'    => $model->title,
                  'id'      => $model->ID,
                  'price'   => $adults_price,
                  'category'=> $model->category,
                  'quantity'=> $adults,
            );                              
																						
				?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="booking_tbl">
          <thead>
          <tr>
            <td colspan="2"><?=$model->title; ?> <span><?=strtoupper(date('D d M',strtotime($model->tour_date))); ?> <?=$model->tour_time; ?></span></td>
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



          <?php
          $sql20 = "SELECT * FROM `tour_customer_attendees` WHERE sessionId = '".$sessionId."'"; 
          $query20 = $conn->query($sql20);
          if($query20->num_rows > 0 ) { ?>
            <tr style="border-top:1px solid #ccc;border-bottom:1px solid #ccc;">
              <td colspan="2" style="margin:0 0 10px 0; color:#0078de;">
              <h2 class="pay_head2">Guest Details</h2>
              </td>
            </tr>
            <tr>
                <td colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="2" style="text-align:left;" class="pay_price_tbl">
                <?php
                
                $k = 0;
                while($model20 = $query20->fetch_object()) {
                  $lable='';
                  if($model20->type=='adults') {
                    $lable = $model->price_type=='group'?$model->adults_text:$model->adults_label.' Traveler ' . $model20->num;
                  }
                  else if($model20->type=='children') {
                    $lable = $model->children_label.' Traveler ' .  $model20->num;
                  }
                  else if($model20->type=='seniors') {
                    $lable = $model->seniors_label.' Traveler ' .  $model20->num;
                  }
                  else if($model20->type=='infants') {
                    $lable = $model->infants_label.' Traveler ' .  $model20->num; 
                  }
                  ?>
                  <tr>
                        <td style="padding-right:20px; width:10%"><?php echo $lable; ?></td>
                        <td align="left"><?php echo $model20->name; ?></td>
                      </tr>
                      <?php 
                }
                ?>
                </table>
              </td>
            </tr>
            <?php
          }
          ?>


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
        
				<?php $dataLayer['subtotal'] = round($subtotal,2); ?>
        <?php list($whole, $decimal) = explode('.', number_format($subtotal,2) ); ?>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="booking_total_tbl">
          <tr>
            <td>Total</td>
            <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
          </tr>
          <?php $dataLayer['DISCOUNT'] = 0; $dataLayer['COUPON'] = ''; ?>
          <?php if(($discount>0)) { list($whole, $decimal) = explode('.', number_format($discount,2) );  ?>
          <?php $dataLayer['DISCOUNT'] = round($discount,2); ?>
          <?php $dataLayer['COUPON'] = $coupon; ?>
          <tr class="discount" style="color:#F00">
            <td>Discount</td>
            <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
          </tr>
        	<?php } if($tax>0) { list($whole, $decimal) = explode('.', number_format($tax,2) ); ?>
          <?php $dataLayer['tax'] = round($tax,2); ?>
          <tr>
            <td>Taxes & fees (13%)</td>
            <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
          </tr>
          <?php } if($gratuity_amt>0) { list($whole, $decimal) = explode('.', number_format($gratuity_amt,2) );  ?>
          <?php $dataLayer['gratuity'] = round($gratuity_amt,2); ?>
          <tr>
            <td>Gratuity (15%)</td>
            <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
          </tr>
          <?php } if($convenience_fee>0) { list($whole, $decimal) = explode('.', number_format($convenience_fee,2) );  ?>
          <?php $dataLayer['convenience_fee'] = round($convenience_fee,2); ?>
          <tr>
            <td>Convenience fee</td>
            <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
          </tr>
          <?php } ?>
          <?php if($tax>0 || $gratuity_amt>0 || $convenience_fee>0) { ?>
          <?php $total = ($subtotal + $tax + $gratuity_amt + $convenience_fee) - $discount; ?>
        	<?php list($whole, $decimal) = explode('.', number_format($total,2) ); ?>
          <?php $dataLayer['total'] = round($total,2); ?>
          <tr class="last_tr">
            <td>Grand Total</td>
            <td align="right">CA$<?=$whole; ?> <sup><?=$decimal; ?></sup></td>
          </tr>
          <?php } ?>
        </table>
        <div align="center"><a id="cmd" href="javascript::void();" onClick="window.print()"><i class="fa fa-print"></i> Print</a></div>
        <?php } else { ?>
        <script> window.location.href = '<?php echo APPROOT.'tours'; ?>' </script>
        <?php } ?>
      </div>
    </div> 
  </div>
</div>

<?php
$sql = "SELECT * FROM `tour_customers` WHERE sessionId='".$sessionId."';";
$query = $conn->query($sql);
if($query->num_rows > 0 ) {
	$subtotal = $sub_total = $tax = $total = 0;
	$model = $query->fetch_object();
 	$dataLayer['ORDERID'] = $model->order_id;
	$dataLayer['ITEM'] 		= implode(",",$item); 
	$dataLayer['AMT'] 		= implode(",",$amt); 
	$dataLayer['QTY'] 		= implode(",",$qty); 
	$dataLayer['CJEVENT'] = isset($_COOKIE['cjevent']) ? $_COOKIE['cjevent'] : 'undefined';  
?>


<script>
var dataLayer  = window.dataLayer || [];

dataLayer.push({
  'detail_id': '<?php echo $model->order_id; ?>',
  'detail_revenue' : '<?php echo $dataLayer['total']; ?>'
});

dataLayer.push({
  'event': 'transactionView',
  'ecommerce': {
    'purchase': {
      'actionField': {
        'id': '<?php echo $model->order_id; ?>',
        'affiliation': 'Online Store',
        'revenue': '<?php echo $dataLayer['total']; ?>',
        'tax':'<?php echo $dataLayer['tax']; ?>',
        'coupon': '4E1046'
      },
	  'products': <?php echo json_encode($dataLayer['items']); ?>
    }
  }
});
</script>


<script type="text/javascript">
dataLayer.push({
  <?php echo json_encode($dataLayer); ?>
});
/*dataLayer = [<?php echo json_encode($dataLayer, true); ?>];*/
</script>
<?php 
	unset($_COOKIE['cjevent']);
	unset($_COOKIE['batcheventID']);
	unset($_COOKIE['utm_campaign']);
	unset($_COOKIE['utm_medium']);
	unset($_COOKIE['utm_source']);
	setcookie('cjevent', '', time() - (86400 * 30));
	setcookie('batcheventID', '', time() - (86400 * 30));
	setcookie('url_string', '', time() - (86400 * 30));
	setcookie('utm_campaign', '', time() - (86400 * 30));
	setcookie('utm_medium', '', time() - (86400 * 30));
	setcookie('utm_source', '', time() - (86400 * 30));
} 
?>
<?php include 'footer.php'; ?>
<?php session(true); ?>
</body>
</html>
