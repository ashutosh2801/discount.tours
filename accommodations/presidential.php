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
<meta name="description" content="Two-bedroom condo with kitchen, living area, TV & 1 bathroom. Free WiFi & free parking. 25-minute walk to the Falls; close to restaurants, Skylon Tower. Sleeps 6 persons!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/presidential" />
<title>Presidential – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/presidential.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Presidential</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 4N1</h3>
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
        <h2>Presidential</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 4N1</address>
         <p>A home away from home! The Presidential is a clean, well-kept condo just 1.3 km from Skylon Tower and about 2 km from Niagara Falls.</p>

<p>This 2-bedroom condo has 2 queen beds and 2 twin beds, 1 bathroom, a fully equipped kitchen with dining area and a living room with a flat-screen TV.</p>

<p>It has all the amenities of a home – washer/dryer, kitchen with all appliances, free WiFi, free parking, air conditioning, heating and a terrace.</p>

<p>Guests at Presidential will be within walking distance from Clifton Hill, Niagara Fallsview Casino Resort, and Skylon Tower (about 1.5 km).</p>

<p>There are many restaurants in the area where guests can dine.</p>

<p>This condo is in a safe neighbourhood, is clean and well maintained. The vacation rental is perfect for a family vacation.</p>

<p>Enjoy more space than you would get in a hotel room and more amenities too!</p>

<p>Book this place that is neat, comfortable, affordable and close to all attractions.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are allowed. Prior request has to be made and charges may apply.</li>
        <li>There is no space for extra beds in the condo.</li>
        <li>The minimum age for check-in is 21.</li>
        </ul>
        
        <p>For more information on the condo Presidential, availability and to make a booking, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/presidential-drummond-condo.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
