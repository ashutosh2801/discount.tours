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
<meta name="description" content="Your home away from home! This 3-bedroom house is great for a family or group. Fully furnished, modern and spacious. The house is a short drive from the Falls area."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/angie-house" />
<title>Angie House | Vacation Rentals, Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/angie-house.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Angie House</h2>
    <h3><i class="fa fa-map-marker"></i> Angie Drive, Niagara Falls, ON L2H 0E7 Canada </h3>
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
        <h2>Angie House</h2>
        <address><i class="fa fa-map-marker"></i> Angie Drive, Niagara Falls, ON L2H 0E7 Canada </address>
         <p>This lovely modern house is located in Niagara Falls near Canada One Factory Outlet. This self-catering detached property is 5 km from Horseshoe Falls.</p>

<p>This 3-bedroom house is a great property to rent as a vacation home. Great for families or a group of friends driving into Niagara Falls! </p>

<p>The house is spacious with a small backyard where kids can play. It has private parking, a fully equipped kitchen, air conditioning, free WiFi, cable TV and more.</p>

<p>The house has 3 bedrooms, a living room, 2 bathrooms, kitchen and dining area. It is spacious and comfortably sleeps 8 persons.</p>

<p>There are closets, ironing facilities, and other amenities.</p>

<p>There are markets close to the house, so you can make your own meals in the house.</p>

<p>Lundy's Lane is just 1.5 km from here. Niagara Falls' famous Boston Pizza is about 1 km away.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Minimum age for check-in is 21.</li>
        <li>There is no space for extra beds in the house.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
        <p>Please click below for more details about the property, availability and price.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/angie-house.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA#policies" target="_blank">More Details</a></div>
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
