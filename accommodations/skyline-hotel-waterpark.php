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
<meta name="description" content="Excellent hotel for families with kids. It features comfortable rooms, free WiFi, spa facilities, easy access to Fallsview Indoor Waterpark. Short walk to Niagara Falls, Clifton Hill."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/skyline-hotel-waterpark" />
<title>Skyline Hotel & Waterpark | Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/skyline-hotel-waterpark.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Skyline Hotel & Waterpark</h2>
    <h3><i class="fa fa-map-marker"></i> 4800 Bender Hill, Niagara Falls, ON L2G 3K1</h3>
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
        <h2>Skyline Hotel & Waterpark</h2>
        <address><i class="fa fa-map-marker"></i> 4800 Bender Hill, Niagara Falls, ON L2G 3K1</address>
         <p>Just minutes from Casino Niagara (0.2 km) and Clifton Hill (0.4 km), Skyline Hotel & Waterpark has been a family favourite for a long time. It is also within walking distance from Niagara Falls (1.6 km/20-minute walk).</p>

<p>The hotel offers reasonably priced rooms that are comfortable, free WiFi in all areas, spa facilities, onsite ATM, onsite paid parking, and a garden.</p>

<p>The hotel features a climate-controlled skywalk to the Fallsview Indoor Waterpark. Movie Nights, onsite restaurant, and vending machines make it very entertaining for kids.</p>

<p>Guests can walk to most tourist attractions from Skyline Hotel & Waterpark. </p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Children or adults are charged per person per night when using extra beds.</li>
        </ul>
        
        <p>Please follow the button below to know more about Skyline Hotel & Waterpark.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/skyline-hotel-and-waterpark.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
