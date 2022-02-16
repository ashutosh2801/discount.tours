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
<meta name="description" content="A 10-minute walk to Clifton Hill and Skylon Tower, this Days Inn offers clean, affordable rooms, an indoor pool, free WiFi, continental breakfast. Walking distance to Falls!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/days-inn-by-wyndham-niagara-falls" />
<title>Days Inn by Wyndham Niagara Falls Near The Falls – Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/days-inn-by-wyndham-niagara-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Days Inn By Wyndham Niagara Falls Near The Falls The Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 5943 Victoria Avenue, Niagara Falls, ON L2G 3L8</h3>
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
        <h2>Days Inn By Wyndham Niagara Falls Near The Falls The Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5943 Victoria Avenue, Niagara Falls, ON L2G 3L8</address>
         <p>Days Inn By Wyndham Niagara Falls Near The Falls is close to all the attractions, yet a very affordable place. It has spacious, classically furnished rooms with comfortable beds.</p>

<p>Its location, friendly staff and cleanliness make the hotel popular with guests. The hotel has a 24-hour front desk and hotel staff available all day. </p>

<p>All rooms are spacious with a TV, free WiFi, air conditioning, heating, sitting area, coffee maker and a hair dryer. Some of the rooms have a hot tub.</p>

<p>There is a continental buffet breakfast for guests every morning.</p>

<p>Guests can relax in the indoor pool, hot tub or sauna.</p>

<p>Skylon Tower, Niagara SkyWheel, Casino Niagara and Hornblower Niagara Cruises are just a 10-15 minute walk from the hotel. Guests can come back to the hotel and rest in between sightseeing.</p>

<p>Niagara Falls is about 20 minutes walking distance from the hotel. There is a WEGO bus stop close by (a shuttle that stops at various Niagara Falls attractions).</p>

<p>Paid parking, ATM on site, daily housekeeping, vending machines, and a business centre are some of the other services that the hotel offers.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in rooms.</li>
        </ul>
        
		<p>To check room availability, pricing and other amenities offered by Days Inn by Wyndham Niagara Falls Near The Falls, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/near-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
