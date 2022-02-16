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
<meta name="description" content="A home away from home! Great location, within walking distance from all attractions. Accommodates 7 persons, has free parking and WiFi."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/clifton-hill-condos-2b" />
<title>Clifton Hill Condos 2B - Niagara Falls Vacation Rental, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/clifton-hill-condos-2b.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Clifton Hill Condos 2B</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 3R7</h3>
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
        <h2>Clifton Hill Condos 2B</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 3R7</address>
         <p>Instead of staying in a hotel, visitors to Niagara Falls, Canada, can rent this condo which is within walking distance from the Falls and other attractions.</p>

<p>Clifton Hill Condos 2B has amenities like free parking, free WiFi, and a flat-screen TV. It has a living area, kitchen with dining area, 2 bedrooms and a bathroom. The kitchen is fully equipped with stovetop, microwave, dishwasher, fridge, kitchenware, coffeemaker and dining table.</p>

<p>Guests can walk down to Niagara Falls, which is just 1.4 km away. Clifton Hill and other attractions like Bird Kingdom are all within a 1 km radius (15-20 minutes by walk). </p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are allowed on request. Charges may apply.</li>
        <li>Children are welcome.</li>
        <li>Extra beds cannot be accommodated in the rooms.</li>
        </ul>
        
        <p>Please click on the button provided below for more information regarding the condo, availability and pricing.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/clifton-hill-condos-2b.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
