<?php
require_once('includes/config.php');
require_once('includes/functions.php');
$dataLayer = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Enjoy the scenic beauty of Niagara Falls with our Toronto to Niagara Falls Day Tour that is run every day. Know more about the tour schedule &amp; itinerary."/>
<meta name="keywords" content="Best Niagara Falls Sightseeing Tours, Tour Packages, Day Tour, Evening Tour, Small Group Custom Tour, Private Tour, Group Tours"/>
<link rel="canonical" href="<?=SITEURL;?>/thank-you" />
<title>Thank You | ToNiagara</title>
<?php include 'inner_header.php';?>
<!--thank u banner-->
<div class="thanku_banner">
  <img src="/images/thanku.png" alt="thanku.png" class="img-res">
  <h2>For contacting us. We will reply soon.</h2>
  <h3>You might want to checkout our most popular tours listed below.</h3>
</div>
<!--end thank u banner-->
<!--matter more-->
<div class="book_tours_wra">
  <div class="container"> 
    <div class="row">
    	<div class="col-lg-12">
        <h4 class="popul">Our Most Popular ToNiagara Tours</h4>
       <?php
       $condition = "status=1";
       $order = '`tour_count` DESC';
       
       $limit  = 9;
       $page 	 = isset($_GET['page']) ? $_GET['page'] : 1;
       $offset = ($page - 1) * $limit;
       
       tour_list($conn, $condition, "$order", "$offset, $limit");
       ?>
       </div>
    </div>
   </div>
</div>
<!--end matter more-->

<?php
/*if( !empty($_COOKIE['CJEVENT']) ) {
	$dataLayer['CJEVENT'] = $_COOKIE['CJEVENT'];  
	$dataLayer['ORDERID'] = 'ABCD1234';  
?>
<script type="text/javascript">
dataLayer = [<?php echo json_encode($dataLayer, true); ?>];
</script>
<?php 
	setcookie('CJEVENT', "", time() - (86400 * 30 * 2), "/");
	setcookie('batcheventID', "", time() - (86400 * 30 * 2), "/");
	unset($_COOKIE['CJEVENT']);
	unset($_COOKIE['batcheventID']);
	
	//echo '<pre>'; print_r($_COOKIE); echo '</pre>'; 
} */
?>

<?php include 'footer.php'; ?>
</body>
</html>
