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
<meta name="description" content="Located near the junction of Welland and Niagara Rivers, Two Rivers B&B offers rooms & suites. Enjoy free parking, WiFi and a wonderful breakfast every morning. 3 km to Niagara Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/two-rivers-bed-and-breakfast" />
<title>Two Rivers Bed and Breakfast – Niagara Falls Canada Accommodations | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/two-rivers-bed-and-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Two Rivers Bed and Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 8006 Norton Street, Niagara Falls, ON L2G 6R9</h3>
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
        <h2>Two Rivers Bed and Breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 8006 Norton Street, Niagara Falls, ON L2G 6R9</address>
         <p>Two Rivers Bed and Breakfast is a unique B&B that offers a choice of rooms, suites and a 3-bedroom apartment for your Niagara Falls vacation. Each of the rooms in this neatly maintained property is individually decorated with handmade linens and curtains.</p>

<p>The property is just 100 metres from Welland River and the nearest attraction is Marineland which is 1.4 km away. Niagara Falls and other attractions are a 10-minute drive away.</p>

<p>All rooms have TVs, air conditioning, heating and private bathrooms. Free WiFi and free onsite parking is available.</p>

<p>A full breakfast buffet is available every morning, prepared by the B&B's gracious hosts. Dietary restrictions and food preferences are accommodated on prior intimation.</p>

<p>The property has a lovely yard with a flower and vegetable garden, outdoor furniture and a gazebo where guests can relax and enjoy the outdoors. It also has a barbecue facility.</p>

<p>The Oaklands Golf Course is 3.2 km from the B&B. There are many restaurants, bars and markets within walking distance from the B&B. </p>

<p>Make a booking at Two Rivers Bed and Breakfast for a Niagara Falls vacation that is comfortable and refreshing.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Extra beds are provided when requested (charges apply).</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>For more information on Two Rivers Bed and Breakfast, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/two-rivers-bed-and-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
