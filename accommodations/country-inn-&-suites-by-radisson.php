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
<meta name="description" content="Guests can walk to all the attractions from Country Inn & Suites by Radisson. Enjoy wonderful service, free breakfast and free WiFi. With swimming pool, gym and onsite ATM."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/country-inn-&-suites-by-radisson" />
<title>Country Inn & Suites by Radisson, Niagara Falls, ON | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/country-inn-&-suites-by-radisson.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Country Inn & Suites by Radisson, Niagara Falls, ON</h2>
    <h3><i class="	fa fa-map-marker"></i> 5525 Victoria Avenue, Niagara Falls, ON L2G 3L3</h3>
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
        <h2>Country Inn & Suites by Radisson, Niagara Falls, ON</h2>
        <address><i class="fa fa-map-marker"></i> 5525 Victoria Avenue, Niagara Falls, ON L2G 3L3</address>
         <p>Located within walking distance from Niagara Falls viewing area, Country Inn & Suites by Radisson in Niagara Falls, Ontario, offers spacious rooms and many other modern amenities for its guests.</p>

<p>The hotel offers free WiFi and complimentary breakfast. Casino Niagara is just a 5-minute walk from the hotel. The hotel is near Clifton Hill attractions (10-20 minutes' walking distance), Niagara Falls (30-minute walk), and many restaurants.</p>

<p>The hotel is a completely smoke-free zone and has rooms and suites with different amenities. Some of the rooms have jaccuzis.</p>

<p>Other facilities include a business centre, fitness centre/gym, onsite ATM, library, indoor swimming pool, vending machines, convenience store, daily housekeeping, laundry and more.</p>

<p>Paid public parking is available. Guests love the hotel's location, comfortable rooms, family and couples' rooms, friendly staff and cleanliness.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>One child below 2 years can stay in a crib free of charge.</li>
        <li>One child under 18 years can stay free of charge when using existing beds.</li>
        <li>Additional children 18 years or above and adults are charged per person per night when using existing beds.</li>
        </ul>
        
		<p>Please click on the button provided below to know more about Country Inn & Suites by Radisson, Niagara Falls, Ontario.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/l2g-3l3-5525victoria.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
