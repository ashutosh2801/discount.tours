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
<meta name="description" content="Clifton Hill Condos 4A is a 2-bedroom apartment that can sleep 7 persons. A 15-30 minute walk from all attractions. Free parking! Enjoy the comfort of home while on vacation."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/clifton-hill-luxury-condo-4b" />
<title>Clifton Hill Condos 4A - Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/clifton-hill-luxury-condo-4b.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Clifton Hill Luxury Condo 4B</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 3R4</h3>
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
        <h2>Clifton Hill Luxury Condo 4B</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 3R4</address>
         <p>This Clifton Hill luxury condo has a great location – it is within walking distance from restaurants, Clifton Hill attractions and Niagara Falls.</p>

<p>The property provides free parking and free WiFi. Families will love this place. It has 2 bedrooms, living area with a flat-screen TV, kitchen area with dining table, and a bathroom.</p>

<p>For guests who have driven down to Niagara Falls, the Falls is just a 5-minute drive from the condo. Skylon Tower is just 0.6 km from the condo.</p>

<p>Enjoy total privacy in the condo. Other facilities include air conditioning, heating, dishwasher, washing machine, stove, microwave, refrigerator and more.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children are welcome.</li>
        <li>Pets are allowed upon request. Charges may apply.</li>
        <li>There is no room for extra beds in the condo. </li>
        </ul>
        
        <p>For information regarding availability, pricing and other details, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/clifton-hill-condos-4b.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
