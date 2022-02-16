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
<meta name="description" content="Holiday apartment with 4 bedrooms in Niagara Falls Canada, 5 km from Falls area. Free parking and WiFi, sleeps 12, 24-hour front desk, daily housekeeping."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-holiday-apartment" />
<title>Niagara Holiday Apartment | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-holiday-apartment.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Holiday Apartment</h2>
    <h3><i class="fa fa-map-marker"></i> 7895 Lundy's Lane, Niagara Falls, ON L2H 1H3</h3>
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
        <h2>Niagara Holiday Apartment</h2>
        <address><i class="fa fa-map-marker"></i> 7895 Lundy's Lane, Niagara Falls, ON L2H 1H3</address>
         <p>This apartment has 4 bedrooms with 2 of the bedrooms having 2 queen beds in each room. The apartment can accommodate 12 persons. It would be ideal for large families or a group. Children can have their own space without disturbing the adults.</p>

<p>The apartment has a 24-hour front desk to assist guests if they have any queries or requests. There is a playground - families with kids will like this.</p>

<p>The closest landmarks are Lundy's Lane Cemetery and Canada One Factory Outlet, which are a 20-minute walk (0.7 km) away. The Falls area and other sights are a short drive from the apartment.</p>

<p>The apartment has a living room, dining area, kitchen and 2 bathrooms. The kitchen has a stove, microwave and refrigerator.</p>

<p>Other amenities include air conditioning, heating, a barbecue, garden, free parking and free WiFi.</p>

<p>Feel like you are at home! This property offers best value for money spent.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Extra guests (children or adults) will be charged per night for extra beds.</li>
        <li>Maximum of 2 extra beds per bedroom is permitted.</li>
        </ul>
        
        <p>Please click on the button given below for more information on Niagara Holiday Apartment.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/holiday-apartment.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
