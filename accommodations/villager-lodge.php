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
<meta name="description" content="Affordable rooms, free parking and WiFi, complimentary breakfast. Perfect for families! Has a swimming pool, playground. Short drive to Falls (5 km) & other tourist sights."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Villager Lodge Niagara Falls – Affordable Hotels in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Villager-Lodge-Niagara-Falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Villager Lodge Niagara Falls</h2>
    <h3><i class="	fa fa-map-marker"></i> 8054 Lundy's Lane, Niagara Falls, ON L2H 1H1</h3>
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
        <h2>Villager Lodge Niagara Falls</h2>
        <address><i class="fa fa-map-marker"></i>  8054 Lundy's Lane, Niagara Falls, ON L2H 1H1</address>
         <p>This Niagara Falls Canada lodge is about 5 km (10-minute drive) from Niagara Falls. It offers reasonably priced accommodations, free parking space, and free WiFi in the rooms.</p>

<p>The closest landmarks from the hotel are Lundy's Lane Cemetery and Canada One Factory Outlet, which are about 1 km from the lodge.</p>

<p>The rooms at Villager Lodge are spacious and include comfortable beds, air conditioning, heating, a flat-screen TV, microwave, fridge, and private bathroom. Guests also get free WiFi and free long distance calls in North America.</p>

<p>Some of the rooms have a hot tub.</p>

<p>Families will like this place as there is an outdoor swimming pool, kids' playground, a deck and barbecue facilities.</p>

<p>Some of the other facilities at this lodge include daily housekeeping, 24-hour front desk, and vending machines.</p>

<p>The shuttle service to Niagara Falls and other attractions passes by the lodge every 30 minutes. </p>

<p>A good place to stay as it provides free breakfast, free WiFi and free parking.</p>

        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Up to 2 children below 12 years can stay free of charge when using existing beds.</li>
        <li>Extra beds are not available.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>For more information on Villager Lodge Niagara Falls in Niagara Falls, Canada, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/villager-lodge.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
