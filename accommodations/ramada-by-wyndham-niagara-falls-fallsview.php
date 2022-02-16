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
<meta name="description" content="Large, luxurious rooms. Located in Fallsview area, this premier hotel is close to the Falls, Clifton Hill. It offers free WiFi, indoor pool, clean premises, room service."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/ramada-by-wyndham-niagara-falls-fallsview" />
<title>Ramada by Wyndham Niagara Falls/Fallsview – Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/ramada-by-wyndham-niagara-falls-fallsview.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Ramada by Wyndham Niagara Falls/Fallsview</h2>
    <h3><i class="fa fa-map-marker"></i> 6045 Stanley Avenue, Niagara Falls, ON L2G 3Y3</h3>
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
        <h2>Ramada by Wyndham Niagara Falls/Fallsview</h2>
        <address><i class="fa fa-map-marker"></i> 6045 Stanley Avenue, Niagara Falls, ON L2G 3Y3</address>
         <p>Ramada by Wyndham Niagara Falls/Fallsview is a premier property just outside of the Fallsview district in Niagara Falls, Ontario, Canada. Guests can walk to all the popular attractions from the hotel, making it a popular place to stay at in Niagara Falls, Canada.</p>

<p>Skylon Tower and Niagara Fallsview Casino are just 15 minutes walking distance from the hotel. Clifton Hill is 1 km away and Niagara Falls 1.2 km.</p>

<p>The hotel features an indoor swimming pool, free in-room WiFi, a gift shop, fitness centre, business centre, onsite IHOP restaurant and 24-hour front desk. Paid private parking is available on site.</p>

<p>All rooms are spacious and have a flat-screen TV, sitting area, coffee maker, hair dryer and an iron. Select rooms have a spa bath.</p>

<p>The hotel provides a lot of services to its guests. It has an onsite ATM, room service, and meeting/banquet facilities.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed in the hotel.</li>
        <li>Up to 2 children under 18 years can stay free of charge when using existing beds.</li>
        <li>Older children or adults are charged per person per night when using existing or extra beds.</li>
        <li>Only 1 extra bed per room is allowed.</li>
        </ul>
        
        <p>For more information on Ramada by Wyndham Niagara Falls/Fallsview, please use the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/c-president.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
