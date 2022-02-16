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
<meta name="description" content="Located 1.5 km from Niagara Falls, Ramada by Wyndham Niagara Falls near the Falls offers affordable rooms & suites with free WiFi, swimming pool and more! Clean and well maintained hotel."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/ramada-by-wyndham-niagara-falls-near-the-falls" />
<title>Ramada by Wyndham Niagara Falls near the Falls – Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/ramada-by-wyndham-niagara-falls-near-the-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Ramada by Wyndham Niagara Falls near the Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 5706 Ferry Street, Niagara Falls, ON L2G 1S7</h3>
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
        <h2>Ramada by Wyndham Niagara Falls near the Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5706 Ferry Street, Niagara Falls, ON L2G 1S7</address>
         <p>Within walking distance from the attractions in Clifton Hill and Niagara Falls (1.5 km), the rooms at Ramada by Wyndham Niagara Falls near the Falls are very reasonably priced.</p>

<p>The hotel's many amenities include indoor and outdoor swimming pools, a business centre, gym, onsite IHOP restaurant, onsite ATM and meeting/banquet facilities.</p>

<p>Additional services include laundry services, daily housekeeping, vending machines, and paid parking.</p>

<p>All guest rooms have flat-screen TVs, individually controlled heating and air conditioning, free local calling and WiFi, ensuite bathrooms, free toiletries, and a hairdryer.</p>

<p>There is also a seasonal shuttle service to local attractions including Hornblower Niagara Cruises.</p>

<p>The hotel provides great value for money!</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>One extra bed can be accommodated in a room.</li>
        </ul>
        
        <p>For more information on the hotel, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/s-8.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
