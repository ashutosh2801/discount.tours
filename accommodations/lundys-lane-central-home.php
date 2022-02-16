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
<meta name="description" content="Luxury 2-bedroom vacation rental in Niagara Falls, Ontario. Free parking, free WiFi, sleeps 6. Niagara Falls is 25 km away."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/lundys-lane-central-home" />
<title>Lakeview Luxury Retreat | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/lundys-lane-central-home.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Lundy's Lane Central Home</h2>
    <h3><i class="fa fa-map-marker"></i> Byng Avenue, Niagara Falls, ON L2G 5C6</h3>
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
        <h2>Lundy's Lane Central Home</h2>
        <address><i class="fa fa-map-marker"></i> Byng Avenue, Niagara Falls, ON L2G 5C6</address>
         <p>Located off Lundy's Lane, this 4-bedroom house with modern furnishings and amenities is a great place to stay in on your Niagara Falls vacation.</p>

<p>It is close to many restaurants and just a 5-minute drive to Niagara Falls.</p>

<p>The property provides free parking and free WiFi. It also has an outdoor pool. It is one of the few pet friendly vacation rental properties in Niagara Falls, Canada.</p>

<p>After a day of sightseeing, guests can explore Lundy's Lane's restaurants, shops, pubs and theatre.</p>

<p>The house has a living area with flat-screen TV, dining table, fully equipped kitchen and bathroom. There is a front porch where guests can relax.</p>

<p>Clifton Hill, Skylon Tower, Queen Victoria Park and other tourist sights are a short 5-10 minute drive (2-3 km) from the property.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are permitted, though charges may apply.</li>
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in the house.</li>
        </ul>
        
        <p>Please click on the button below to find out more about this vacation rental property.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/lundy-39-s-lane-central-home.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
