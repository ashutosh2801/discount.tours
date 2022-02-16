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
<meta name="description" content="Centrally located and just a 10-minute walk to the Falls, The Oakes Hotel Overlooking the Falls offers spacious rooms with some overlooking the Falls, onsite restaurant, etc."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/the-oakes-hotel-overlooking-the-falls" />
<title>The Oakes Hotel Overlooking the Falls – Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/the-oakes-hotel-overlooking-the-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>The Oakes Hotel Overlooking the Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 6546 Fallsview Boulevard, Niagara Falls, ON L2G 3W2</h3>
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
        <h2>The Oakes Hotel Overlooking the Falls</h2>
        <address><i class="fa fa-map-marker"></i> 6546 Fallsview Boulevard, Niagara Falls, ON L2G 3W2</address>
         <p>A boutique style hotel located on Fallsview Boulevard, The Oakes Hotel Overlooking the Falls is just 400 metres from Niagara Falls. Guests can take the Falls Incline Railway located in front of the hotel for direct access to Table Rock Centre and reach Horseshoe Falls within 5 minutes.</p>

<p>Applebee's Neighbourhood Grill, the hotel's onsite restaurant, serves a wide range of American and Canadian cuisine. The hotel provides free shuttle service to Remington's of Niagara Restaurant for guests wishing to go out for dinner.</p>

<p>The Oakes Hotel Overlooking the Falls offers a wide range of rooms from luxury suites and rooms with a view of Niagara Falls to more traditional rooms.</p>

<p>Fallsview rooms and suites offer breathtaking views of Niagara Falls. Select rooms include a hot tub.</p>

<p>All rooms are spacious, luxuriously furnished and feature a 36-inch LED TV, sitting area, work desk, and coffeemaker. Paid parking and WiFi is available.</p>

<p>Niagara Fallsview Casino Resort is 0.3 km from the hotel. Guests are within 15-20 minutes' walking distance from most attractions, including Skylon Tower, Clifton Hill and Casino Niagara.</p>

<p>Facilities that guests enjoy include a swimming pool, fitness center, sauna, indoor pool, concierge service, onsite ATM, daily housekeeping, room service, vending machines, etc.</p>

<p>Make a booking online and get great rates at the luxurious Oakes Hotel Overlooking the Falls.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Up to 2 children under 12 years stay free of charge when using existing beds.</li>
        <li>One extra bed per room is allowed and is chargeable.</li>
        </ul>
        
        <p>To know more about The Oakes Hotel Overlooking the Falls, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/o-niagrara-falls-ontario.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
