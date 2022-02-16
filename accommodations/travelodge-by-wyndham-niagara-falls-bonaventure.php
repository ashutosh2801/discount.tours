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
<meta name="description" content="Affordable rooms with free WiFi, cable TV, private bathroom. Niagara Falls is a 10-minute walk from Travelodge by Wyndham Niagara Falls Bonaventure. Free parking."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/travelodge-by-wyndham-niagara-falls-bonaventure" />
<title>Travelodge by Wyndham Niagara Falls Bonaventure – Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/travelodge-by-wyndham-niagara-falls-bonaventure.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Travelodge by Wyndham Niagara Falls Bonaventure</h2>
    <h3><i class="fa fa-map-marker"></i> 7737 Lundy's Lane, Niagara Falls, ON L2H 1H3</h3>
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
        <h2>Travelodge by Wyndham Niagara Falls Bonaventure</h2>
        <address><i class="fa fa-map-marker"></i> 7737 Lundy's Lane, Niagara Falls, ON L2H 1H3</address>
         <p>Travelodge by Wyndham Niagara Falls Bonaventure is a complete hotel with clean air-conditioned rooms, indoor and outdoor pools, onsite restaurant, fitness center and 24-hour front desk.</p>

<p>The nearest landmarks are Lundy's Lane Cemetery and Canada One Factory Outlet, which are approximately 0.4 km from the hotel. Niagara Falls and other sights are a 10-15 minute drive away.</p>

<p>All rooms have air conditioning, heating, a TV, desk and private bathroom. Tea and coffee-making facilities are offered in each room.</p>

<p>The lodge offers free WiFi and free onsite private parking. Guests can relax in the indoor or outdoor swimming pool. There is also a hot tub and a fitness center.</p>

<p>The onsite restaurant serves American cuisine and is open for breakfast and lunch. Other facilities offered include vending machines, onsite ATM, room service and more!</p>

<p>Guests love the affordable rates, free parking, and friendly staff.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Up to 2 children below 12 years stay free of charge when using existing beds.</li>
        <li>Additional older children and adults are charged per night for extra beds.</li>
        <li>Only 1 extra bed is allowed per room.</li>
        </ul>
        
        <p>Please click on the button below to know more about Travelodge by Wyndham Niagara Falls Bonaventure.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/bonaventure-travelodge.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
