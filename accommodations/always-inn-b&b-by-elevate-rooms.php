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
<meta name="description" content="Elegantly designed, Always Inn B&B provides world class service. This Victorian house is immaculate. Spacious rooms, modern facilities, free parking & WiFi."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/always-inn-b&b-by-elevate-rooms" />
<title>Always Inn B&B by Elevate Rooms | Niagara Falls Canada Accommodations | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/always-inn-b&b-by-elevate-rooms.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Always Inn B&B by Elevate Rooms</h2>
    <h3><i class="fa fa-map-marker"></i> 4327 Simcoe Street, Niagara Falls, ON L2E 1T5</h3>
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
        <h2>Always Inn B&B by Elevate Rooms</h2>
        <address><i class="fa fa-map-marker"></i> 4327 Simcoe Street, Niagara Falls, ON L2E 1T5</address>
         <p>Set in a beautiful, restored Victorian-era house built in 1878, Always Inn offers a comfortable and homely atmosphere to its visitors.</p>

<p>Complimentary homemade breakfast with a variety of cereals, fresh fruit, pastries, tea and coffee is served every morning. Special diet meals are prepared upon request.</p>

<p>Free WiFi is available in all areas of the house. Free private parking is also available.</p>

<p>There is a game room, pool table and ping-pong for guests' entertainment. Guests can lounge around in the parlour decorated with antiques and stained glass windows or sit on the front porch.</p>

<p>The house is a non-smoking zone. Rooms have a TV, fireplace, air conditioning and private bathroom. Children are welcome.</p>

<p>Great restaurants within 10 minutes walking distance. The property's location provides easy access to all attractions. The Falls area is about 2.5 km away.</p>

<p>The hosts are very helpful and provide assistance with transport, ticket bookings, sightseeing tips, etc. Past guests have liked this a lot.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>There is no space for extra beds in the rooms.</li>
        <li>Children are welcome.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>Please click on the button below for more information about Always Inn B&B by Elevate Rooms.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/always-inn-bed-and-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
