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
<meta name="description" content="Get personalized service at this small B&B overlooking the Niagara River & Gorge and 1.7 km from American Falls. Enjoy free breakfast, WiFi and parking."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/trillium-bed-&-breakfast" />
<title>Trillium Bed & Breakfast – B&Bs in Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/trillium-bed-&-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Trillium Bed & Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 5151 River Road, Niagara Falls, ON L2E 3G8</h3>
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
        <h2>Trillium Bed & Breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 5151 River Road, Niagara Falls, ON L2E 3G8</address>
         <p>This quiet and beautiful bed and breakfast on River Road (Niagara Parkway) is roughly 1.5 from Rainbow Bridge. Its rooms are cosy with comfortable beds, free WiFi, alarm clocks and private bathrooms.</p>

<p>Enjoy freshly prepared homemade breakfast and great coffee every morning in a dining room overlooking Niagara Gorge. You can relax on the front porch which also overlooks Niagara Gorge. </p>

<p>Bird Kingdom, Whirlpool State Park, Fallsview Indoor Waterpark and Casino Niagara are all within 1 km from the B&B. </p>

<p>Free private parking is available onsite. Niagara Falls is about a 5-minute drive from the B&B (American Falls 1.7 km and Horseshoe Falls 2.4 km).</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children cannot be accommodated at this B&B. </li>
        <li>There is no space for extra beds in the guest rooms.</li>
        </ul>
        
		<p>For more on Trillium Bed & Breakfast, room availability and other details, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/trillium-bed.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
