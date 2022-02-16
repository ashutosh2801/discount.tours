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
<meta name="description" content="Overlooking Niagara Gorge and Whirlpool, this hotel has rooms for every type of guest. Free parking, WiFi and breakfast. Spacious rooms, outdoor pool."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/super-8-by-wyndham-niagara-falls-north" />
<title>Super 8 by Wyndham Niagara Falls North – Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/super-8-by-wyndham-niagara-falls-north.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Super 8 by Wyndham Niagara Falls North</h2>
    <h3><i class="fa fa-map-marker"></i> 4009 River Road, Niagara Falls, ON L2E 3E4</h3>
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
        <h2>Super 8 by Wyndham Niagara Falls North</h2>
        <address><i class="fa fa-map-marker"></i> 4009 River Road, Niagara Falls, ON L2E 3E4</address>
         <p>Super 8 by Wyndham Niagara Falls North is a reasonably priced hotel located near Great Wolf Lodge Waterpark. It overlooks Niagara Gorge and Whirlpool.</p>

<p>Rooms at the hotel have air conditioning, heating, TV, and coffeemaker. Refrigerators are available on request at a fee.</p>

<p>Amenities offered by the hotel include an outdoor swimming pool, free onsite parking, free continental breakfast every morning in the dining area, and free WiFi in all public areas.</p>

<p>Niagara Falls and other attractions are about a 10-minute drive from the hotel.</p>

<p>Some of the rooms feature in-room jacuzzis. Family suites are available as well.</p>

<p>Guests have liked the clean rooms and great prices.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Up to 3 children under 16 years are charged CAD 20 per night when using existing beds.</li>
        <li>Extra beds are not available.</li>
        </ul>
        
        <p>To know more about Super 8 by Wyndham Niagara Falls North, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/water-s-edge-inn-north-of-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
