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
<meta name="description" content="Rooms at great prices, short drive to Falls. Neat rooms with comfortable beds, air conditioning, TV. Free parking & WiFi. Free breakfast!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-s-emerald-falls-bed-&-breakfast" />
<title>Niagara's Emerald Falls Bed & Breakfast, Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-s-emerald-falls-bed-&-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara's Emerald Falls Bed & Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 4291 Simcoe Street, Niagara Falls, ON L2E 1T5</h3>
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
        <h2>Niagara's Emerald Falls Bed & Breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 4291 Simcoe Street, Niagara Falls, ON L2E 1T5</address>
         <p>Located in a quiet neighbourhood of Niagara Falls, Ontario, Niagara's Emerald Falls Bed & Breakfast has guest rooms with TV, comfortable beds, chairs and a private bathroom.</p>

<p>It is 0.6 km from Greyhound Canada and the train station. Whirlpool State Park, Bird Kingdom, Casino Niagara and Rainbow Bridge are at a walkable distance of 0.7-1.5 km from the B&B. </p>

<p>A free continental breakfast consisting of a lot of choices is served every morning.</p>

<p>The B&B provides good service, clean rooms with air conditioning/heating, free private parking and free WiFi.</p>

<p>Skylon Tower is 2.2 km and Horseshoe Falls is 2.8 km from the B&B. Niagara's Emerald Falls Bed & Breakfast is in a great location and is also moderately priced.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children cannot be accommodated at the B&B. </li>
        <li>There is no space for extra beds in the guest rooms.</li>
        </ul>
        
		<p>Please click on the button below for more information on location, pricing and room availability at Niagara's Emerald Falls Bed & Breakfast.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-39-s-emerald-falls-bed-amp-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
