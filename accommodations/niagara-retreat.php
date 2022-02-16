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
<meta name="description" content="Niagara Retreat is a vacation rental with 4 bedrooms, a short drive from Niagara Falls. Has free WiFi and free onsite parking. Modern, very neat, has a yard."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-retreat" />
<title>Niagara Retreat – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-retreat.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Retreat</h2>
    <h3><i class="fa fa-map-marker"></i> Saint Paul Avenue, Niagara Falls, ON L2J 2L6</h3>
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
        <h2>Niagara Retreat</h2>
        <address><i class="fa fa-map-marker"></i> Saint Paul Avenue, Niagara Falls, ON L2J 2L6</address>
         <p>For your next Niagara Falls Canada vacation, try staying in a vacation rental instead of a hotel.</p>

<p>Niagara Retreat in Niagara Falls, Canada, is a modern, fully furnished 4-bedroom vacation rental house with all amenities required for a relaxing, perfect vacation.</p>

<p>The property has fairly large grounds with trees, outdoor furniture, barbecue facilities, a living room with TV, dining room, bathrooms and a kitchen.</p>

<p>Guests can stay in and prepare their own meals in the fully equipped kitchen that comes with a microwave, refrigerator and other appliances.</p>

<p>Niagara Falls and other attractions are about a 5-minute drive from the house. Botanical Gardens is 3.8 km from Niagara Retreat.</p>

<p>The house can accommodate 8 persons. The place is clean with lots of seating space and comfortable beds.</p>

<p>Free WiFi and free private parking at the property is provided.</p>

<p>Book this beautiful property with large front and backyards today! </p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are allowed on request. Charges may apply.</li>
        <li>Extra beds cannot be accommodated in the house.</li>
        </ul>
        
        <p>For other details with respect to Niagara Retreat, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-retreat.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
