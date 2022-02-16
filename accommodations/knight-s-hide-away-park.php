<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/knight-s-hide-away-park" />
<title>Knight's Hide-Away Park | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/knight-s-hide-away-park.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Knight's Hide-Away Park</h2>
    <h3><i class="fa fa-map-marker"></i> 1154 Gorham Road, Ridgeway, ON L0S 1N0</h3>
    </div>
    
  </div>  
</div>
</div>
</div>
</div>

<!--inn thumb-->
<div class="inn_detail_wra">
  <div class="container">    
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
        <h2>Knight's Hide-Away Park</h2>
        <address><i class="fa fa-map-marker"></i> 1154 Gorham Road, Ridgeway, ON L0S 1N0</address>
        
         <p>Knight's Hide-Away Park is located south of Niagara Falls, Ontario, in historic Ridgeway. This camping site is far from major highways and gives you a true country camping experience.</p>
         <h3><i class="fa fa-star"></i> The camp is a very affordable place for families. Facilities at the site include:</h3>
         <ul class="facilities2">
         <li>Clean washrooms and free hot showers</li>
        <li>On-site store</li>
        <li>Heated pool</li>
        <li>Laundry facilities</li>
        <li>Bike rentals</li>
        <li>Games room</li>
        <li>Free WiFi</li>
         </ul>
         
         <p>You can visit Fort Erie, which is a short drive away.</p>

        <h3><i class="fa fa-phone"></i> Phone:</h3>
<p><strong>Local:</strong> <a href="tel:+1 905-894-1911">+1 905-894-1911</a></p>
        
		<p class="aco_site">Visit the <a href="http://knightsfamilycamping.com/" target="_blank">website</a> to know more.</p>
        
        
        <p><strong>Disclaimer:</strong> This may not be the most updated information. Please click on more details to find out the latest information.</p>

      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <div id="sidebar2">
                  <div class="sidebar__inner">
                    <?php include '../most_popular_tours.php';?>
                  </div>
                </div>
      </div>
    </div>
    
  </div>
</div>
<!--end inn thumb-->


<?php include '../footer.php';?>
<script>
$(function(){
	$('#search').click(function(){
		$('#page').val( 1 );
	});
	$('#sortby').change(function(){
		$('#page').val( 1 );
		$('#sort_by').val( $(this).val() );
		$('#search_form').submit();
	});
	$('#load_more_products').click(function(){
		get_loadmore_tours('#products', '#search_form', '/ajax/tours');
		return false;
	});
});
</script>
</body>
</html>
