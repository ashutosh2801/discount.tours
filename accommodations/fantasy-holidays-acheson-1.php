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
<link rel="canonical" href="<?=SITEURL;?>/fantasy-holidays-acheson-1" />
<title>Fallsview Family Home – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/fantasy-holidays-acheson-1.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Fantasy Holidays Acheson 1</h2>
    <h3><i class="fa fa-map-marker"></i> 4083 Acheson Avenue, Niagara Falls, ON L2E 3L8</h3>
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
        <h2>Fantasy Holidays Acheson 1</h2>
        <address><i class="fa fa-map-marker"></i> 4083 Acheson Avenue, Niagara Falls, ON L2E 3L8</address>
         <p>Do something different on your Niagara Falls vacation this year! Try renting this lovely apartment that has all the amenities and comfort of a home. It is just a short drive from the Falls viewing area and other attractions.</p>

<p>Located in a quiet and safe neighbourhood, this air-conditioned unit has a living room with flat-screen TV, dining area, fully equipped kitchen, 3 bedrooms and a bathroom.</p>

<p>The property offers free private parking and free WiFi in all areas of the apartment. </p>

<p>The closest landmarks to the apartment are Greyhound Canada, Whirlpool Aero Car, and Niagara Helicopters (15-20 minutes' walking distance).</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Extra beds are available and are chargeable on a per night basis.</li>
        </ul>
        
        <p>Please click on the button provided below for more details about Fantasy Holidays Acheson 1.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/fantasy-holidays-acheson-1.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
