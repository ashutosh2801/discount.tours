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
<meta name="description" content="The Crowne Plaza Niagara Falls Hotel offers rooms with a Fallsview & has indoor connections to Casino Niagara and Fallsview Indoor Waterpark. Enjoy spacious rooms, breakfast buffet, free WiFi."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/crowne-plaza-hotel-niagara-falls" />
<title>Crowne Plaza Hotel-Niagara Falls/Fallsview – Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/crowne-plaza-hotel-niagara-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Crowne Plaza Hotel-Niagara Falls/Fallsview</h2>
    <h3><i class="	fa fa-map-marker"></i> 5685 Falls Avenue, Niagara Falls, ON L2E 6W7</h3>
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
        <h2>Crowne Plaza Hotel-Niagara Falls/Fallsview</h2>
        <address><i class="fa fa-map-marker"></i> 5685 Falls Avenue, Niagara Falls, ON L2E 6W7</address>
         <p>This beautiful, historic and ornate hotel in Niagara Falls, Ontario, is just a short walk from the Falls and has rooms and suites with a view of Niagara Falls.</p>

<p>The Crowne Plaza Hotel is an upscale hotel overlooking Horseshoe Falls and has indoor connections to Casino Niagara and Fallsview Indoor Waterpark.</p>

<p>There are different types of rooms and suites available. All rooms have a TV, wooden furniture, work desk, chair, CD player, and coffee maker. Local calling is free. Two complimentary bottles of water are provided each day.</p>

<p>The hotel also has meeting/banquet facilities, adults' and children's pool, sauna, hot tub, full-service business centre, ATM, and a gym.</p>

<p>Services offered are daily housekeeping, dry cleaning, concierge service, room service, baggage storage, and currency exchange.</p>

<p>The hotel also has 2 onsite restaurants – Prime Steakhouse which is open for dinner and the Rainbow Room which is open for breakfast and lunch. Both the restaurants offer amazing views of Niagara Falls. There is also a Starbucks Coffee Shop on site.</p>

<p>Crowne Plaza Hotel is popular with tourists as it is within walking distance from all the attractions. It takes around 20 minutes to reach Horseshoe Falls by foot. Hornblower Niagara Cruises and Clifton Hill are even closer.</p>

<p>Paid parking is available at the hotel.</p>

<p>Enjoy a view of Niagara Falls from your room by booking a Fallsview room.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed. Service animals are allowed.</li>
        <li>All children are welcome.</li>
        <li>Up to 2 children under 19 years can stay free of charge when using existing beds.</li>
        <li>Up to 2 older children or adults will be charged per person per night when using existing beds.</li>
        <li>Only 1 extra bed can fit in a room.</li>
        </ul>
        
		<p>To know more about the hotel's facilities, room availability and pricing, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/crowne-plaza.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
