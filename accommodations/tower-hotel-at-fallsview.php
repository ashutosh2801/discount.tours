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
<meta name="description" content="Hotel offering Fallsview rooms, American breakfast. A 10-minute walk to Niagara Falls. Has a swimming pool, fitness centre, restaurant, paid parking and WiFi."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/tower-hotel-at-fallsview" />
<title>Tower Hotel at Fallsview | Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/tower-hotel-at-fallsview.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Tower Hotel at Fallsview</h2>
    <h3><i class="fa fa-map-marker"></i> 6732 Fallsview Boulevard, Niagara Falls, ON L2G 3W6</h3>
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
        <h2>Tower Hotel at Fallsview</h2>
        <address><i class="fa fa-map-marker"></i> 6732 Fallsview Boulevard, Niagara Falls, ON L2G 3W6</address>
         <p>At 0.5 km (10 minutes walking distance) from Horseshoe Falls and Niagara Fallsview Casino Resort, Tower Hotel at Fallsview offers air-conditioned rooms with some having a view of Niagara Falls, an American breakfast every morning and many other facilities.</p>

<p>Guests can easily walk to a number of attractions – Journey Behind the Falls, IMAX Theatre, Skylon Tower, and American Falls – all within 1 km from the hotel. There are many restaurants within walking distance from the hotel.</p>

<p>All rooms in the hotel have a flat-screen TV, air conditioning, heating and a private bathroom.</p>

<p>Private parking is available on site and costs $45 CAD per day. WiFi is chargeable.</p>

<p>There is an onsite restaurant serving American cuisine. Other facilities that guests enjoy are an indoor pool, hot tub, fitness centre, swimming pool, vending machines, onsite ATM, baggage storage, daily housekeeping and 24-hour front desk.</p>

<p>Tower Hotel at Fallsview is rated high by guests because of its proximity to Niagara Falls and other attractions, comfortable rooms, affordable pricing, onsite restaurant and other facilities.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children cannot be accommodated at the hotel.</li>
        <li>Pets are not allowed.</li>
        <li>Extra beds are not available.</li>
        </ul>
        
        <p>For more details on Tower Hotel at Fallsview, room rates and availability, and to make a booking, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/r-plaza-fallsview.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
