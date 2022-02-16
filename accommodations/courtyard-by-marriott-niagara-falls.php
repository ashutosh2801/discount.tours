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
<meta name="description" content="Enjoy spacious rooms with TV, fridge, free WiFi. Just 10-15 minutes' walk from Niagara Falls, it has an onsite restaurant, swimming pool & much more."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/courtyard-by-marriott-niagara-falls" />
<title>Courtyard by Marriott Niagara Falls – Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/courtyard-by-marriott-niagara-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Courtyard by Marriott Niagara Falls</h2>
    <h3><i class="	fa fa-map-marker"></i> 5950 Victoria Avenue, Niagara Falls, ON L2G 3L7</h3>
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
        <h2>Courtyard by Marriott Niagara Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5950 Victoria Avenue, Niagara Falls, ON L2G 3L7</address>
         <p>The Courtyard by Marriott Niagara Falls is located within walking distance from many attractions, and has rooms and suites suitable for couples, groups and families.</p>

<p>Skylon Tower is just a 6-minute walk from the hotel. Guests can easily walk down to Clifton Hill, where there are many tourist attractions such Niagara SkyWheel.</p>

<p>Horseshoe Falls is about 1.1 km away. The WEGO shuttle, a bus service that travels between various attractions, has a stop across the street.</p>

<p>All rooms have a flat-screen TV, a fridge, free WiFi, tea and coffee-making facilities, and ensuite bathroom. Other facilities at the hotel include a swimming pool, fitness centre, sauna, dry cleaning, laundry, etc.</p>

<p>There are a number of room types available at The Courtyard by Marriott. A breakfast buffet is available as well as paid parking.</p>

<p>There is also an onsite restaurant and bar, The Keg Steakhouse + Bar, which is open for lunch and dinner.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Up to 2 children below 18 years stay free of charge when using existing beds.</li>
        <li>Additional older children or adults are charged per person per night when using existing beds.</li>
        <li>Extra bed is charged per person per night.</li>
        <li>Only 1 extra bed is allowed per room.</li>
        </ul>
        
		<p>For more details regarding amenities, room rates and availability, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/courtyard-by-marriott-niagara-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
