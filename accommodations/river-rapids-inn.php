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
<meta name="description" content="Spacious, clean rooms with comfortable beds, TV, mini fridge, coffeemaker. River Rapids Inn offers Free WiFi, parking and breakfast. Low priced, 5-minute drive to Niagara Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/river-rapids-inn" />
<title>River Rapids Inn – Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/river-rapids-inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>River Rapids Inn</h2>
    <h3><i class="fa fa-map-marker"></i> 4029 River Road, Niagara Falls, ON L2E 3E5</h3>
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
        <h2>River Rapids Inn</h2>
        <address><i class="fa fa-map-marker"></i> 4029 River Road, Niagara Falls, ON L2E 3E5</address>
         <p>Offering spacious and clean rooms at reasonable prices, River Rapids Inn is a short drive from Niagara Falls and other popular attractions. It is about 4 km from Niagara Falls.</p>

<p>Guests enjoy free parking and free WiFi (only in public areas) too.</p>

<p>Each guest room has air conditioning, heating, a flat-screen TV, private bathroom, toiletries, and hairdryer. Some rooms have a sitting area too.</p>

<p>The hotel also offers car and bike hires. There are many restaurants and supermarkets within walking distance from the hotel. </p>

<p>Guests can relax in the clean and comfortable rooms after a long day out. Whirlpool Aero Car is only 0.5 km from the hotel.</p>

<p>Other services provided include a 24-hour front desk, daily housekeeping, indoor pool, sauna, and business centre.</p>

<p>Book a room at River Rapids Inn for a comfortable Niagara Falls stay.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>No extra beds or cribs are available.</li>
        </ul>
        
        <p>To know more about River Rapids Inn in Niagara Falls, Canada, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/river-rapids-inn.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
