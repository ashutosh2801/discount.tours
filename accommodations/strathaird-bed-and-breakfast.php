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
<meta name="description" content="A 5-minute drive from Niagara Falls, Strathaird B&B is a cosy little place providing guests free WiFi, parking, and breakfast. Neat, affordable. Casino Niagara 1.3 km away."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/strathaird-bed-and-breakfast" />
<title>Strathaird Bed and Breakfast – B&Bs in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/strathaird-bed-and-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Strathaird Bed and Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 4372 Simcoe Street, Niagara Falls, ON L2E 1T6</h3>
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
        <h2>Strathaird Bed and Breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 4372 Simcoe Street, Niagara Falls, ON L2E 1T6</address>
         <p>Strathaird Bed and Breakfast is a quaint house with a beautiful garden and front porch. It is within walking distance from attractions like Bird Kingdom, Fallsview Indoor Waterpark, and Casino Niagara.</p>

<p>The property is located in a quiet neighbourhood about 2.7 km (5-minute drive) from Niagara Falls.</p>

<p>Each guest room has air conditioning, heating, a ceiling fan and a private bathroom. The B&B has a common lounge/TV area and a dining room.</p>

<p>Guests are treated to a free hot breakfast every morning. Free public parking is available on site.</p>

<p>Free WiFi is available in all areas. Bicycle rentals are also available.</p>

<p>This property is one of the top-rated locations! Guests feel they are getting their money's worth at this B&B. </p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children older than 13 years are welcome.</li>
        <li>Extra beds are not available.</li>
        <li>The maximum number of guests in a room is 2.</li>
        </ul>
        
		<p>Please click on the button provided below for more information on Strathaird Bed and Breakfast.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/strathaird-bed-and-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
