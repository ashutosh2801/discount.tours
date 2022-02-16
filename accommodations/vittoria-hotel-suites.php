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
<meta name="description" content="Short walk to Niagara Falls, Clifton Hill, many tourist sights and restaurants. Vittoria Hotel & Suites offers spacious, clean rooms, free WiFi. Enjoy great rates!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/vittoria-hotel-suites" />
<title>Vittoria Hotel & Suites | Hotels in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/vittoria-hotel-suites.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Vittoria Hotel & Suites</h2>
    <h3><i class="fa fa-map-marker"></i> 5851 Victoria Avenue, Niagara Falls, ON L2G 3L6</h3>
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
        <h2>Vittoria Hotel & Suites</h2>
        <address><i class="fa fa-map-marker"></i> 5851 Victoria Avenue, Niagara Falls, ON L2G 3L6</address>
         <p>Vittoria Hotel & Suites, located 0.9 km from American Falls, is modern, exceptionally clean, and provides many amenities to its guests. Onsite paid parking is available.</p>

<p>Friendly staff attends to your concerns and queries immediately.</p>

<p>Hotel rooms are spacious, clean, modern with comfortable beds, flat-screen TVs, free WiFi and ensuite bathrooms.</p>

<p>Guests are within walking distance from Clifton Hill (0.3 km), Hornblower Niagara Cruises and Casino Niagara (0.5 km), and the Falls area (1 km).</p>

<p>Amenities at Vittoria Hotel & Suites include an indoor heated pool, jacuzzi, fitness center, ATM, onsite restaurant, vending machines, laundry facilities and much more!</p>

<p>A stay at Vittoria Hotel & Suites provides great value for money spent! It is well maintained, has friendly staff and is walking distance to all attractions in the Falls area.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Additional children or adults are charged $15 CAD per night for extra beds.</li>
        <li>Two extra beds are allowed in a room.</li>
        </ul>
        
        <p>For more information about facilities, location, room rates, and availability at Vittoria Hotel & Suites in Niagara Falls, Canada, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/imperial-suites.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
