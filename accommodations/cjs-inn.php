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
<meta name="description" content="Located close to Clifton Hill, CJS Inn offers air-conditioned rooms with TV, microwave and fridge. Free parking and WiFi. Just 1.5 km from Niagara Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>CJS Inn – Niagara Falls Canada Budget Accommodations | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/CJS-Inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>CJS Inn </h2>
    <h3><i class="	fa fa-map-marker"></i> 5334 Kitchener Street, Niagara Falls, ON L2G 1B5</h3>
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
        <h2>CJS Inn</h2>
        <address><i class="fa fa-map-marker"></i> 5334 Kitchener Street, Niagara Falls, ON L2G 1B5</address>
         <p>If you are planning a vacation to Niagara Falls, Canada, CJS Inn would be a great place to stay. It is located within 15-30 minutes walking distance from all Niagara Falls attractions.</p>

<p>The inn has family rooms and is moderately priced for its location. The inn offers onsite free private parking and free WiFi in all areas.</p>

<p>Clifton Hill, Hornblower Niagara Cruises and Rainbow Bridge are just a 15-20 minute walk from CJS Inn.</p>

<p>Rooms at the inn are non-smoking, have air conditioning, a flat-screen TV, microwave, refrigerator, table and chairs, and an ensuite bathroom with fresh towels, toiletries, and blow dryer.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children are welcome.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
		<p>Please click on the button provided below for room availability, pricing and other details about CJS Inn.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/cjs-inn.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
