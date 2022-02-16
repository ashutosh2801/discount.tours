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
<meta name="description" content="This Days Inn is family friendly, very affordable, and a short drive from the Falls area. Lots of entertainment, shopping and events in Lundy's Lane to explore."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/days-inn-by-wyndham-niagara-falls-lundy-s-lane" />
<title>Days Inn By Wyndham Niagara Falls Lundy's Lane | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/days-inn-by-wyndham-niagara-falls-lundy-s-lane.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Days Inn By Wyndham Niagara Falls Lundy's Lane</h2>
    <h3><i class="	fa fa-map-marker"></i> 7280 Lundy's Lane, Niagara Falls, ON L2G 1W2</h3>
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
        <h2>Days Inn By Wyndham Niagara Falls Lundy's Lane</h2>
        <address><i class="fa fa-map-marker"></i> 7280 Lundy's Lane, Niagara Falls, ON L2G 1W2</address>
         <p>This Days Inn in Lundy's Lane is near Canada One Factory Outlet Mall and historic Lundy's Lane Cemetery and offers rooms and suites suitable for families, couples and touring groups.</p>

<p>All guest rooms have a TV, WiFi, coffee maker, and a sitting area. Some of the rooms have a spa bath. Fridges are provided upon request at a surcharge.</p>

<p>Niagara Falls and other attractions are just a short drive from the hotel.</p>

<p>Guests can eat at the onsite restaurant, The Potato Factory Bar & Grill, or explore the many restaurants and eateries in Lundy's Lane.</p>

<p>Amenities at the hotel include an indoor pool, paid parking, paid WiFi, daily housekeeping, vending machines and onsite ATM.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Children under 2 years are charged per night for the use of a crib.</li>
        <li>All children under 16 years can stay free of charge in an extra bed.</li>
        <li>Any additional older children or adults are charged per night for extra beds.</li>
        <li>There is space for only 1 extra bed in a room.</li>
        </ul>
        
		<p>Please click on the button provided below to know more about Days Inn By Wyndham Niagara Falls Lundy's Lane.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/lundy-s-lane.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
