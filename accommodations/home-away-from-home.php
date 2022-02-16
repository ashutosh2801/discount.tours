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
<meta name="description" content="This home offers accommodations at low prices, free WiFi and free parking. A 5-minute drive (1.7 km) to Niagara Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/home-away-from-home" />
<title>Home away from Home – Budget Guest Rooms, Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/home-away-from-home.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Home Away from Home</h2>
    <h3><i class="fa fa-map-marker"></i> 5183 River Road, Niagara Falls, ON L2E 3G9</h3>
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
        <h2>Home Away from Home </h2>
        <address><i class="fa fa-map-marker"></i> 5183 River Road, Niagara Falls, ON L2E 3G9</address>
         <p>This home offers rooms at very affordable rates. It is just 1 km from Greyhound Canada and Casino Niagara. There is also free parking at the property and free WiFi in the rooms.</p>

<p>Horseshoe Falls is about 2.5 km from the property. Bird Kingdom, Fallsview Indoor Water Park, Casino Niagara and Rainbow Bridge are a walkable distance (20 minutes/1 km) from the house.</p>

<p>There is a shared lounge area and dining area/kitchen. Breakfast and daily housekeeping is provided at extra cost.</p>

<p>The host is very helpful in guiding guests on places to see in Niagara Falls.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
		<p>For more information regarding rooms and availability, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/home-away-from-home-niagara-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
