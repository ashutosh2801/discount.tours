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
<meta name="description" content="Enjoy total freedom in this 3-bedroom rental property. With free parking and proximity to Niagara Falls, this is a great place for a family or a group of friends. Sleeps 6-8 people."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/black-opal-simcoe-niagara" />
<title>Rent a House – Black Opal Simcoe Niagara | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/black-opal-simcoe-niagara.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Black Opal Simcoe Niagara</h2>
    <h3><i class="fa fa-map-marker"></i> 4405 Simcoe Street, Niagara Falls, ON L2E 1T7</h3>
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
        <h2>Black Opal Simcoe Niagara</h2>
        <address><i class="fa fa-map-marker"></i> 4405 Simcoe Street, Niagara Falls, ON L2E 1T7</address>
         <p>This 3-bedroom apartment is close to a WEGO bus stop (the WEGO buses are a shuttle service to the Niagara Falls tourist area).</p>

<p>Some of the closest landmarks are the train station, Greyhound Canada, Devil's Hole State Park, Bird Kingdom, Casino Niagara and Niagara Skywheel, all of which are within a walking distance of 15-30 minutes (0.6-1.5 km).</p>

<p>Niagara Falls and other attractions are just a 5-minute drive from the house. There are many restaurants near the property – The Moose and Pepper Bistro (1 km) and a supermarket – Lococo's Fruit and Vegetables (1.9 km).</p>

<p>The property has a living room with a flat-screen TV, dining room, 3 bedrooms, a fully functioning kitchen, and a laundry room. There is also a backyard with a back porch and grill that guests can use.</p>

<p>Free parking and free WiFi is also available, making it a favourite with guests.</p>

<p>After a day of sightseeing, the house is the perfect place to relax. Instead of being cooped up in a room or a suite at a hotel, you have a whole house to yourself. There is a grill/barbecue in the backyard too that guests can use.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Extra beds are not available.</li>
        <li>Children are welcome.</li>
        <li>Children below 12 years of age stay free of charge when using existing beds.</li>
        </ul>
        
        <p>Please click on the button below for more information on Black Opal Simcoe Niagara.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/4405-simcoe-street-unit-1.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
