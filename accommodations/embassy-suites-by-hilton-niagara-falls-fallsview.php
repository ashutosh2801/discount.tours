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
<meta name="description" content="Overlooking Horseshoe Falls and just a 10-minute walk from it, Embassy Suites by Hilton has luxurious suites with spectacular views and amenities. Book online!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/embassy-suites-by-hilton-niagara-falls-fallsview" />
<title>Embassy Suites by Hilton Niagara Falls/Fallsview – Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/embassy-suites-by-hilton-niagara-falls-fallsview.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Embassy Suites by Hilton Niagara Falls/Fallsview</h2>
    <h3><i class="fa fa-map-marker"></i> 6700 Fallsview Boulevard, Niagara Falls, ON L2G 3W6</h3>
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
        <h2>Embassy Suites by Hilton Niagara Falls/Fallsview</h2>
        <address><i class="fa fa-map-marker"></i> 6700 Fallsview Boulevard, Niagara Falls, ON L2G 3W6</address>
         <p>Embassy Suites by Hilton Niagara Falls/Fallsview is in the busy Fallsview tourist area and is just a short walk from the American and Horseshoe Falls.</p>

<p>The hotel is an all luxury suites hotel. It offers spacious two-room suites with a bedroom and a living room. The ambience and the service provided are impeccable.</p>

<p>All suites are air conditioned and non-smoking with a TV, refrigerator, microwave, coffee maker, alarm clock, chairs, desk, a safe and ensuite bathroom. Some of the rooms have a view of Niagara Falls and the summertime fireworks display.</p>

<p>Included with every stay is a full buffet cooked to order breakfast as well as evening reception including alcoholic beverages and free snacks. Tea, coffee, fresh fruit, and many other choices are available (breakfast). </p>

<p>Horseshoe Falls and Table Rock Welcome Centre are just 10 minutes walking distance (0.3 km) from the hotel. The Falls Incline Railway, which takes you to Table Rock Centre, is just outside the hotel.</p>

<p>Onsite paid private parking and paid WiFi in all areas of the hotel are available.</p>

<p>There is a gym, hot tub, indoor pool and business centre.</p>

<p>The hotel is right next to Niagara Fallsview Casino Resort. Skylon Tower is 0.8 km and Casino Niagara is 1.6 km from the hotel.</p>

<p>Starbucks, T.G.I. Fridays Restaurant, and Keg Steakhouse & Bar are the onsite restaurants at the Embassy Suites. Room service is also available.</p>

<p>Guests can walk down to most of the attractions around the Niagara Falls tourist area or take the WEGO bus to farther destinations.</p>

<p>This luxury hotel is a great place to stay if you are not budget conscious.</p>

        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>One child under 16 years stays free of charge when using existing beds.</li>
        <li>Extra beds cannot be accommodated.</li>
        </ul>
        
		<p>To know more about the hotel's room rates, room availability, package deals and other details, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/embassy-suites-niagara-falls-fallsview.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
