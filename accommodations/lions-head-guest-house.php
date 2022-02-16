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
<meta name="description" content="Experience old world charm at this century-old property. Overlooking Niagara River, Lion's Head B&B offers free parking, WiFi and breakfast. Walking distance to Falls, casinos and other attractions."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/lions-head-guest-house" />
<title>Lion's Head Guest House – Niagara Falls Canada B&Bs | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/lions-head-guest-house.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Lion's head guest house </h2>
    <h3><i class="fa fa-map-marker"></i> 5239 River Road, Niagara Falls, ON L2E 3G9</h3>
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
        <h2>Lion's head guest house</h2>
        <address><i class="fa fa-map-marker"></i> 5239 River Road, Niagara Falls, ON L2E 3G9</address>
         <p>Experience a bit of history at Lion's Head Bed and Breakfast, a century old property overlooking Niagara River and Gorge.</p>

<p>Queen Victoria Park is 2 km from the B&B. Horseshoe Falls is 2.3 km away. Casino Niagara is a 4-minute drive from the property.</p>

<p>This charming property has a lovely porch from where the Niagara River and Gorge are visible.</p>  

<p>Guests enjoy free WiFi, free onsite parking, and free breakfast. An American breakfast prepared fresh every morning is served in the dining area.</p>

<p>The house is filled with antique furniture and decorative items. Each room has a clock radio, ironing facilities and a private bathroom.</p>

<p>The B&B offers bike rentals; guests can explore Niagara Falls on these bikes.</p>

<p>Clifton Hill, Bird Kingdom, Skylon Tower and Casino Niagara are all 15-30 minutes' walking distance from the B&B.</p>

<p>After a day of sightseeing, guests can relax in the common lounge area which has a TV.</p>

<p>Guests love this place as it is on Niagara Parkway and close to Niagara River.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children cannot be accommodated at this guesthouse.</li>
        <li>Extra beds are not available.</li>
        </ul>
        
		<p>Please click on the button provided below to know more about Lion's Head Guest House, room availability and rates.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/lion-s-head-bed.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
