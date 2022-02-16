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
<meta name="description" content="Experience Victorian-era grandeur at Redwood Bed and Breakfast – tranquil, close to the Falls, overlooking Niagara Gorge. Enjoy free WiFi, parking and delicious breakfast."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/redwood-bed-and-breakfast" />
<title>Redwood Bed and Breakfast | B&Bs in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/redwood-bed-and-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Redwood Bed and Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 5227 River Road, Niagara Falls, ON L2E 3G9</h3>
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
        <h2>Redwood Bed and Breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 5227 River Road, Niagara Falls, ON L2E 3G9</address>
         <p>Located on Niagara Parkway, Redwood Bed and Breakfast features individually decorated rooms with beautiful traditional furniture and décor, a beautiful front garden with driveway, and front porch and balconies overlooking the Niagara River and Gorge.</p>

<p>The property is just a 2-minute drive to Niagara Falls. Some of the places within walking distance are Bird Kingdom, Fallsview Indoor Waterpark, Casino Niagara and Rainbow Bridge (all within 1 km/20-minute walk).</p>

<p>Each guest room has air conditioning, heating, a sitting area, cable TV, Victorian style furniture, free WiFi, and a private bathroom. </p>

<p>The hosts serve a hot breakfast every morning in the dining room. Homemade jams and croissants are also served, along with tea, coffee or juice.</p>

<p>Guests love the quiet neighbourhood and the view from the balconies. Book a room here to experience Niagara Falls hospitality at its very best.</p>

<p>Free parking is available at the bed & breakfast.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children cannot be accommodated at the B&B. </li>
        <li>Extra bed can be provided upon request.</li>
        </ul>
        
		<p>To know more about Redwood Bed and Breakfast and its facilities, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/redwood-bed-and-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
