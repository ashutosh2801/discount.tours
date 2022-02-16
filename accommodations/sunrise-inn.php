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
<meta name="description" content="Free parking, free WiFi, 5-minute drive to Niagara Falls. Clean rooms with AC, cable TV. Close to restaurants, bus stop to the Falls. Affordable rates."/>
<meta name="keywords" content="budget hotels in Niagara Falls Canada. Hotels with free parking, free WiFi"/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Sunrise Inn | Budget Hotels in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Sunrise-Inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Sunrise Inn</h2>
    <h3><i class="	fa fa-map-marker"></i> 6267 Lundy's Lane, Niagara Falls, ON L2G 1T5</h3>
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
        <h2>Sunrise Inn</h2>
        <address><i class="fa fa-map-marker"></i> 6267 Lundy's Lane, Niagara Falls, ON L2G 1T5</address>
         <p>Located in one of the most popular neighbourhoods in Niagara Falls, Canada – Lundy's Lane – Sunrise Inn offers affordable and comfortable rooms. Standard rooms and family suites are available.</p>

<p>Skylon Tower and Niagara Fallsview Casino Resort are at a walkable distance of 1.6 km (1 mile) from the inn. Niagara Falls is about 3 km (10-minute drive) from the inn.</p>

<p>The property offers free onsite private parking and free WiFi. There are many restaurants and markets within 300 metres from Sunrise Inn, so guests do not have to go far for meals.</p>

<p>Each guest room has air conditioning, heating, a flat-screen TV with cable channels. A mini fridge and microwave are available on request. Some rooms have a private balcony, where people can relax and enjoy street views.</p>

<p>From Victoria Day until Thanksgiving Day, Sunrise Inn serves complimentary breakfast every morning.</p>

<p>Public transport taking tourists to the main attractions in Niagara Falls makes a stop at the front of the inn.</p>

<p>Couples can book a room with a jacuzzi.</p>

<p>Sunrise Inn is very conveniently located close to restaurants and a short drive to Niagara Falls and other attractions.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>One child under 12 years can stay free of charge when using existing beds.</li>
        <li>Extra beds are not available.</li>
        <li>Minimum age for check-in is 18.</li>
        </ul>
        
		<p>Please click on the button below to know more about Sunrise Inn in Niagara Falls, Canada.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/bonanza-motel.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
