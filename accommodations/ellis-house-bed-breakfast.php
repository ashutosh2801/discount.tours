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
<meta name="description" content="Ellis House Bed & Breakfast is ideal for couples. Featuring cozy rooms, it provides free breakfast, private parking and WiFi. Moderately priced and walkable to many attractions! 2.2 km from American Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/ellis-house-bed- breakfast" />
<title>Ellis House Bed & Breakfast, Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/ellis-house-bed-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Ellis House Bed & Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 4284 Ellis Street, Niagara Falls, ON L2E 1H1</h3>
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
        <h2>Ellis House Bed & Breakfast </h2>
        <address><i class="fa fa-map-marker"></i> 4284 Ellis Street, Niagara Falls, ON L2E 1H1</address>
         <p>Ellis House Bed & Breakfast is located in a quiet residential neighbourhood and within walking distance from many Niagara Falls attractions.</p>

<p>This adults-only B&B has cozy rooms with many amenities. All the units have a fireplace, private bathroom and air conditioning. Some of the rooms have a spa bath.</p>

<p>Shared facilities include a lounge/TV, dining area, kitchenette, a garden and 3 outdoor patios. </p>

<p>Guests are provided a complimentary breakfast every morning. Pancakes, waffles, eggs, baked goods, yogurt, cereals, and coffee are some of the items usually served. Any other requests or dietary restrictions are also accommodated.</p>

<p>The B&B is just 10 minutes (walking) from Greyhound Canada and the train station. Most of the other attractions are at 20-30 minutes walking distance.</p>

<p>Free private parking and street parking is available. Free WiFi is available in all areas of the B&B. </p>

<p>American Falls is 2.2 km and Horseshoe Falls is 2.9 km from Ellis House Bed & Breakfast.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children cannot be accommodated.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
		<p>Please click on the button provided below to know more about Ellis House Bed & Breakfast.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/ellis house-bed-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
