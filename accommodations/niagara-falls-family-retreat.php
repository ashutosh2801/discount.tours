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
<meta name="description" content="Relax in this beautiful modern home in Niagara Falls Ontario with 4 bedrooms, kitchen, free private parking and free WiFi. It is 5 km from Niagara Falls. Sleeps 10 persons."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-falls-family-retreat" />
<title>Niagara Falls Family Retreat | Niagara Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-falls-family-retreat.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Falls Family Retreat</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2H 0M9</h3>
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
        <h2>Niagara Falls Family Retreat</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2H 0M9</address>
         <p>Enjoy total freedom and great amenities at this vacation rental with all the comforts of a home. The 4-bedroom house can accommodate 10 persons and is within walking distance to a few restaurants.</p>

<p>The nearest landmarks are Lundy's Lane Cemetery and Canada One Factory Outlet about 1.3 km away. The Falls, Clifton Hill and other tourist areas are about a 10-minute drive from the house.</p>

<p>The house has a living room, dining room, kitchen with all appliances, and bathroom. A washing machine, ironing facilities, and barbecue are available for use.</p>

<p>There is free private parking and free WiFi too! This detached property gives you privacy and is in a beautiful neighbourhood.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
        <p>For more details about Niagara Falls Family Retreat, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-falls-family-retreat.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
