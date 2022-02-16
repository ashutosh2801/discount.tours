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
<meta name="description" content="Nonsmoking hotel, 20-minute walk from Niagara Falls. Affordable rooms with free WiFi, fridge, microwave. Has indoor pool, hot tub, restaurant. Close to Clifton Hill."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/travelodge-hotel-by-wyndham-niagara-falls-by-the-falls" />
<title>Travelodge Hotel by Wyndham Niagara Falls by the Falls – Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/travelodge-hotel-by-wyndham-niagara-falls-by-the-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Travelodge Hotel by Wyndham Niagara Falls by the Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 5257 Ferry Street, Niagara Falls, ON L2G 1R6</h3>
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
        <h2>Travelodge Hotel by Wyndham Niagara Falls by the Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5257 Ferry Street, Niagara Falls, ON L2G 1R6</address>
         <p>With a location that is within walking distance from Niagara Falls, Clifton Hill, and other attractions in Niagara Falls, Canada, Travelodge Hotel by Wyndham Niagara Falls by the Falls is affordable and offers many amenities.</p>

<p>This nonsmoking hotel offers rooms with a TV, sitting area, tea/coffeemaker, mini fridge, microwave and a private bathroom. Some of the rooms have a jacuzzi/hot tub.</p>

<p>Also featured are an indoor pool, hot tub, sauna, a ladies boutique, gift/souvenir shop, onsite restaurant, paid parking and onsite ATM.</p>

<p>All rooms have air conditioning and heating. Baggage storage, concierge service, vending machines, and banquet facilities are some of the other services provided by the hotel.</p>

<p>This hotel is a guest favourite as it is within walkable distance from Hornblower Niagara Cruises and other attractions. There are also many restaurants, diners and supermarkets in the vicinity of the hotel.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Upto 2 children under 16 years stay free of charge when using existing beds.</li>
        <li>Extra beds are not available.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
        <p>To read guest reviews, find room rates and make a booking, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/travelodge-by-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
