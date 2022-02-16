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
<meta name="description" content="Family-friendly lodge with spacious rooms, comfortable beds, free WiFi, 20-minute walk to Niagara Falls. 5-minute walk to Clifton Hill attractions. Affordable lodge!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/travelodge-by-wyndham-niagara-falls-at-the-falls" />
<title>Travelodge by Wyndham Niagara Falls at the Falls – Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/travelodge-by-wyndham-niagara-falls-at-the-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Travelodge by Wyndham Niagara Falls at the Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 4943 Clifton Hill, Niagara Falls, ON L2G 3N5</h3>
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
        <h2>Travelodge by Wyndham Niagara Falls at the Falls</h2>
        <address><i class="fa fa-map-marker"></i> 4943 Clifton Hill, Niagara Falls, ON L2G 3N5</address>
         <p>With clean, spacious rooms, comfortable beds, and quiet surroundings, Travelodge by Wyndham Niagara Falls at the Falls is perfect for families and travelers looking for a budget stay in Niagara Falls, Canada.</p>

<p>The hotel is located in Clifton Hill, the dining and entertainment district of Niagara Falls, Canada. It is only a 5-minute walk from the lodge to Niagara SkyWheel, Casino Niagara, and Fallsview Indoor Waterpark.</p>

<p>Enjoy amenities such as free WiFi, heated outdoor pool, onsite restaurant, business center, and 24-hour front desk. Onsite public parking is available and charges apply.</p>

<p>All the popular attractions are within walking distance from the lodge.</p>

<p>Stay here for a wonderful and affordable experience in Niagara Falls, Canada.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Up to 2 children under 16 years stay free of charge when using existing beds.</li>
        <li>Pets are not allowed.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
        
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/tl-at-the-falls-niagra-falls-ontario.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
