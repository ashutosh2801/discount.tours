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
<meta name="description" content="Have the best family vacation in this 3-bedroom, 3-bathroom fully furnished detached home. Free WiFi, free parking, 20-minute walk to Niagara Falls. Lowest rates!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/fallsview-family-home" />
<title>Fallsview Family Home – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/fallsview-family-home.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Fallsview Family Home</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 4C6</h3>
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
        <h2>Fallsview Family Home</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 4C6</address>
         <p>Enjoy the comfort of a home on your Niagara Falls vacation! This lovely home is a 15-20 minute walk from the Horseshoe Falls. Most of the attractions are a 5-10 minute drive from the property.</p>

<p>Fallsview Family Home has a living room, fully equipped kitchen, dining area, 3 bedrooms, 3 bathrooms, spacious backyard and patio, and parking space on the property.</p>

<p>The kitchen has a microwave, coffeemaker, fridge, utensils, etc. Families renting the house can sometimes stay in and cook their own meals.</p>

<p>There are many restaurants and supermarkets in the area. Niagara Fallsview Casino Resort (1 km) and Skylon Tower (1.4 km) are also within walking distance from the Falls.</p>

<p>The house can accommodate up to 10 persons, has free parking and free WiFi.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Prior permission is required for pets. Charges may apply.</li>
        <li>There is no room for extra beds in the house.</li>
        <li>Service charges/security deposit will be collected at the time of booking. It will be refunded after checkout pending a damage inspection.</li>
        </ul>
        
        <p>To know more about pricing, availability and other details, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/fallsview-family-home.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
