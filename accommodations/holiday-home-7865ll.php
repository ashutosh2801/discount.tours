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
<meta name="description" content="Book this spacious 4-bedroom house that sleep 10 persons. It offers free private parking, free WiFi. A 10-minute drive from Niagara Falls. Close to restaurants."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/holiday-home-7865ll" />
<title>Holiday Home 7865 LL – Niagara Falls CA Vacation Rental | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/holiday-home-7865ll.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Holiday Home 7865LL</h2>
    <h3><i class="fa fa-map-marker"></i> 7865 Lundy's Lane, Niagara Falls, ON L2H 1H3</h3>
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
        <h2>Holiday Home 7865LL</h2>
        <address><i class="fa fa-map-marker"></i> 7865 Lundy's Lane, Niagara Falls, ON L2H 1H3</address>
         <p>This detached property on historic Lundy's Lane provides free onsite private parking and free WiFi. Just a 10-minute drive from Niagara Falls and other attractions, the holiday home has a living area with flat-screen TV, dining area, a fully equipped kitchen, 4 bedrooms and private bathrooms.</p>

<p>Guests can enjoy a seasonal outdoor swimming pool that is shared with another property. Located in a quiet neighbourhood, it also has outdoor BBQ facilities and furniture.</p>

<p>There are some restaurants in the area. Guests can explore Lundy's Lane in the evening after a day of sightseeing. Lundy's Lane has many shopping outlets, restaurants and entertainment venues.</p>

<p>Niagara Fallsview Casino Resort and Skylon Tower are approximately 4 km from the house. Horseshoe Falls is 4.4 km away.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>There is no room for extra beds in the house.</li>
        </ul>
        
        <p>To check room availability, pricing and other details, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/holiday-home-7865ll.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
