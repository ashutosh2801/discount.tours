<?php
require_once('includes/config.php');
require_once('includes/functions.php');
$sessionId = session_id();
session_regenerate_id();
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
<link rel="canonical" href="<?=SITEURL;?>/cart" />
<link href="<?php echo APPROOT; ?>css/payment.css" rel="stylesheet" />
<?php include 'inner_header.php';?>

<div class="reservation_wra">
  <div class="container">
  	<div class="row">
      <div class="col-lg-12">
        <h3 class="pay_head1">CONFIRMATION</h3>
        <div class="pay_step">
          <div class="pay_progress1">
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
				$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb FROM `tour_customers` c, `tour_customer_detail` cd, `tour_tours` t WHERE c.id=cd.user_id AND cd.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
				$query = $conn->query($sql);
				if($query->num_rows > 0 ) {
					echo '<h2 class="booking_head">Your booking request has been received.</h2>
        <p class="booking_txt">Your booking request has been received, but has not been confirmed. We will review the booking and confirm its status as soon as possible. Your credit card will not be charged until the booking is confirmed. The charge on your credit card statement will appear as "TONIAGARA".</p>
';
					$subtotal = $sub_total = $tax = $total = 0;
					while($model = $query->fetch_object()) {
						//$url = tour_urlMap('tours', $model->slug);
						//$thumb = tour_thumb($model->tour_thumb);
						$sub_total = $cnt = 0;
						
						if($model->adults) { $sub_total+= ($model->adults * $model->adults_price); $cnt+=$model->adults; }
						if($model->children) { $sub_total+= ($model->children * $model->children_price); $cnt+=$model->children; }
						if($model->seniors) { $sub_total+= ($model->seniors * $model->seniors_price); $cnt+=$model->seniors; }
						if($model->infants) { $sub_total+= ($model->infants * $model->infants_price); $cnt+=$model->infants; }
						if($model->add_ons_price) { $sub_total+= $model->add_ons_price; }
				?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="booking_tbl">
          <thead>
          <tr>
            <td colspan="2"><?=$model->title; ?> <span><?=strtoupper(date('D d M',strtotime($model->tour_date))); ?></span></td>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>
            <h3>CUSTOMER DETAILS</h3>
            <ul>
            <li><i class="fa fa-users"></i> <?=$cnt; ?> Reserved</li>	 
            <li><i class="fa fa-envelope"></i> <?=$model->email; ?></li>
            <li><i class="fa fa-phone"></i> <?=$model->phone; ?></li>
            </ul>
            </td>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <?php if($model->adults) { ?>
                <tr>
                  <td>Adults (<?php echo $model->adults; ?> × CA$<?php echo $model->adults_price; ?>)</td>
                  <td align="right">CA$<?php echo number_format(($model->adults*$model->adults_price),2); ?></td>
                </tr>
                <?php } if($model->children) { ?>
                <tr>
                  <td>Children (<?php echo $model->children; ?> × CA$<?php echo $model->children_price; ?>)</td>
                  <td align="right">CA$<?php echo number_format(($model->children*$model->children_price),2); ?></td>
                </tr>
                <?php } if($model->seniors) { ?>
                <tr>
                  <td>Seniors (<?php echo $model->seniors; ?> × CA$<?php echo $model->seniors_price; ?>)</td>
                  <td align="right">CA$<?php echo number_format(($model->seniors*$model->seniors_price),2); ?></td>
                </tr>
                <?php } if($model->infants) { ?>
                <tr>
                  <td>Infants (<?php echo $model->infants; ?> × CA$<?php echo $model->infants_price; ?>)</td>
                  <td align="right">CA$<?php echo number_format(($model->infants*$model->infants_price),2); ?></td>
                </tr>
                <?php } if($model->add_ons_price) { ?>
                <tr>
                  <td>Add-Ons</td>
                  <td align="right">CA$<?php echo number_format($model->add_ons_price,2); ?></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <td>Total</td>
                  <td align="right">CA$<?php echo number_format($sub_total); ?> <sup><?=substr(number_format($sub_total,2),-2); ?></sup></td>
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
				<?php } ?>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="booking_total_tbl">
          <tr>
            <td>Total</td>
            <td align="right">CA$<?=number_format($subtotal); ?> <sup><?=substr(number_format($subtotal,2),-2); ?></sup></td>
          </tr>
          <?php $tax = ($subtotal*13)/100; ?>
          <tr>
            <td>Taxes & fees (13%)</td>
            <td align="right">CA$<?=number_format($tax); ?> <sup><?=substr(number_format($tax,2),-2); ?></sup></td>
          </tr>
          <?php $total = ($subtotal + $tax); ?>
          <tr>
            <td>Grand Total</td>
            <td align="right">CA$<?=number_format($total,2); ?></td>
          </tr>
          
        </table>
        <div align="center"><a id="cmd" href="javascript::void();" onClick="window.print()"><i class="fa fa-print"></i> Print</a></div>
        <?php } else { ?>
        <script> window.location.href = '<?php echo APPROOT.'tours'; ?>' </script>
        <!--<div class="error">Invalid</div>-->
        <?php } ?>
      </div>
    </div> 
  </div>
</div>


<?php include 'footer.php'; ?>

</body>
</html>
