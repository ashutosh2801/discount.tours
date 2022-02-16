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
<meta name="description" content="Stay at this luxury hotel just 0.5 km from the Falls. Offers rooms with views of the Falls, free WiFi, etc., at attractive rates. You can walk to all attractions!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/radisson-hotel-suites-fallsview" />
<title>Radisson Hotel & Suites Fallsview – Niagara Falls Canada Hotels |ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/radisson-hotel-suites-fallsview.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Radisson Hotel & Suites Fallsview</h2>
    <h3><i class="fa fa-map-marker"></i> 6733 Fallsview Boulevard, Niagara Falls, ON L2G 3W7</h3>
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
        <h2>Radisson Hotel & Suites Fallsview</h2>
        <address><i class="fa fa-map-marker"></i> 6733 Fallsview Boulevard, Niagara Falls, ON L2G 3W7</address>
         <p>Radisson Hotel & Suites Fallsview is located in Niagara Falls, Canada, and offers great views of Niagara Falls from select rooms, warm hospitality, luxurious and beautifully furnished rooms, proximity to tourist stops, and a host of amenities.</p>

<p>The comfortable and large rooms have a flat-screen TV, air conditioning, heating, sitting area and bathroom.</p>

<p>Other services provided include free WiFi in all areas, paid parking, onsite ATM, indoor pool, 2 onsite restaurants, gift shop, and more!</p>

<p>The two onsite restaurants, Tony Roma's and Outback Steakhouse, are open for lunch and dinner.</p>

<p>The hotel is within walking distance from Niagara Falls, Skylon Tower, and Niagara Falls IMAX Theatre. There are many restaurants and supermarkets in the area.</p>

<p>Guests love staying at Radisson Hotel & Suites Fallsview because of its attractive rates, wonderful rooms and service, and walkable distance to all the sights.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Any additional adults or children are charged per night for extra beds.
        <li>Only 1 extra bed can be placed in a room.</li>
        </ul>
        
        <p>To know more about the room rates, availability, and other details, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/rs-fallsview.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
