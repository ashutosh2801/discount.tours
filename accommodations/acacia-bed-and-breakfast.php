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
<meta name="description" content="This property offers all the comforts of a home and is within walking distance from Niagara Falls, Clifton Hill. Enjoy delicious hot breakfast every morning! Free parking, free WiFi."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/acacia-bed-and-breakfast" />
<title>Acacia Bed and Breakfast, Niagara Falls, Ontario | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/acacia-bed-and-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Acacia Bed and Breakfast </h2>
    <h3><i class="fa fa-map-marker"></i>  4485 Hiram Street, Niagara Falls, ON L2E 1A2</h3>
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
        <h2>Acacia Bed and Breakfast </h2>
        <address><i class="fa fa-map-marker"></i>  4485 Hiram Street, Niagara Falls, ON L2E 1A2</address>
         <p>Acacia Bed and Breakfast is located close to many Niagara Falls attractions. You are within easy walking distance (5-10-minute) from Clifton Hill, Bird Kingdom, Niagara Falls, Rainbow Bridge, Skylon Tower, and other attractions. Casino Niagara is just 0.4 km from the B&B.</p>

<p>There are 5 guest rooms and guests get complete privacy. There is free parking and free Wi-Fi too. The property is in a quiet neighbourhood with lots of trees and greenery.</p>

<p>It takes just 10 minutes by foot to reach Clifton Hill, the entertainment district of Niagara Falls.</p>

<p>Breakfast is provided every morning. The hosts go out of their way to accommodate guests.</p>

<h3><i class="fa fa-sticky-note"></i> Rooms and Amenities</h3>
        <ul class="facilities">
        <li>All guest rooms have a microwave, flat screen TV, electric teapot and a private bathroom.</li>
		<li>Air conditioning/heating in rooms.</li>
        </ul>
 
        <h3><i class="fa fa-sticky-note"></i> Other Facilities</h3>
        <ul class="facilities">
        <li>Free Wi-Fi</li>
        <li>Free on site private parking</li>
        <li>Snack bar</li>
        <li>American, vegan or gluten-free breakfast is available every morning.</li>
        </ul>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children cannot be accommodated at this bed and breakfast.</li>
        <li>Minimum age for check-in is 18.</li>
        <li>Availability of extra beds depends on the room you choose.</li>
        <li>CAD 30 is charged per person per night for an extra bed.</li>
        </ul>
        
		<p>Please click on the button provided below to know more about Acacia Bed and Breakfast.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/acacia-bed-and-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
