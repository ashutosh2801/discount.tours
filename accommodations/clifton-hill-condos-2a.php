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
<meta name="description" content="Feel at home in this vacation rental 10 minutes walking distance from Skylon Tower. Free parking and WiFi, acccommodates up to 7 persons. Two bedrooms, kitchen and dining area."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/clifton-hill-condos-2a" />
<title>Clifton Hill Condos 2A – Niagara Falls, CA | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/clifton-hill-condos-2a.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Clifton Hill Condos 2A</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 3R6</h3>
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
        <h2>Clifton Hill Condos 2A</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 3R6</address>
         <p>Located about 400 metres from Niagara Skywheel, this condo offers comfortable accommodations for a group of up to 7 persons.</p>

<p>In addition to free private parking, guests can utilize free WiFi.</p>

<p>There are 2 bedrooms, a living area, kitchen-dining area, and a private bathroom in the condo. Other amenities include a flat-screen TV, wardrobes, alarm clock, air conditioning, heating, and a fully equipped kitchen.</p>

<p>Niagara Falls is just a 30-minute walk from the condo. Other attractions like Casino Niagara and Skylon Tower are even closer. Guests can walk or drive to attractions and come back for a break in between seeing sights.</p>

<p>Past guests have admired the cleanliness, facilities at the condo, and its proximity to the various tourist sights in Niagara Falls, Canada.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are allowed on request. Charges may apply.</li>
        <li>Children are welcome.</li>
        <li>Extra beds cannot be accommodated in the rooms.</li>
        </ul>
        
        <p>Please click on the button provided below for more information regarding the condo, availability and pricing.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/clifton-hill-condos-2a.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
