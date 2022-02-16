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
<meta name="description" content="Hotel with spacious rooms, free WiFi, indoor pool. 0.6 km from Clifton Hill & 1.7 km from Horseshoe Falls. Affordable rates."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/travelodge-by-wyndham-niagara-falls-fallsview" />
<title>Travelodge by Wyndham Niagara Falls Fallsview – Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/travelodge-by-wyndham-niagara-falls-fallsview.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Travelodge by Wyndham Niagara Falls Fallsview</h2>
    <h3><i class="fa fa-map-marker"></i> 5599 River Road, Niagara Falls, ON L2E 3H3</h3>
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
        <h2>Travelodge by Wyndham Niagara Falls Fallsview</h2>
        <address><i class="fa fa-map-marker"></i> 5599 River Road, Niagara Falls, ON L2E 3H3</address>
         <p>The Travelodge by Wyndham Niagara Falls Fallsview is in an ideal location, just a 10-minute walk from Clifton Hill and a 15-minute walk from American Falls.</p>

<p>This well-maintained property has a sauna, hot tub, fitness center, indoor pool and onsite restaurant. All rooms enjoy free WiFi, floor-to-ceiling windows, a work desk, a flat-screen TV, a coffeemaker and ensuite bathroom.</p>

<p>Private parking at the hotel is available and is chargeable per day. For guests' convenience, there is an onsite restaurant.</p>

<p>Spacious rooms, comfortable beds and clean surroundings are liked by guests. Casino Niagara, Rainbow Bridge, Skylon Tower and many restaurants are within walking distance from the hotel.</p>

<p>Amenities provided by the hotel include vending machines, onsite ATM, daily housekeeping, and 24-hour front desk.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>One child below 16 years can stay free of charge when using existing beds.</li>
        <li>There is no space for extra beds in guest rooms.</li>
        </ul>
        
        <p>For more details on Travelodge by Wyndham Niagara Falls Fallsview, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/michaels-inn-niagara.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
