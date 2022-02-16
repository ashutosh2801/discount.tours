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
<meta name="description" content="5-bedroom holiday rental in Niagara Falls, Canada. Free parking & WiFi. A 10-minute drive (2 km) to Niagara Falls. Sleeps 12 persons. Modern home with lots of amenities."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/luxurious-executive-family-retreat" />
<title>Luxurious Executive Family Retreat | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/luxurious-executive-family-retreat.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Luxurious Executive Family Retreat</h2>
    <h3><i class="fa fa-map-marker"></i> Lionshead Avenue, Niagara Falls, ON L2G 7S4</h3>
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
        <h2>Luxurious Executive Family Retreat</h2>
        <address><i class="fa fa-map-marker"></i> Lionshead Avenue, Niagara Falls, ON L2G 7S4</address>
         <p>Why stay in a hotel room when you can have a whole house to yourself?</p>

<p>Luxurious Executive Family Retreat is located in a quiet neighbourhood that is 1.8 km from Horseshoe Falls in Niagara Falls, Canada.</p>

<p>The property is fully furnished with 5 bedrooms, bathrooms, dining room, living room with flat-screen TV and a fully equipped modern kitchen. This house is ideal for a large family or group.</p>

<p>This holiday retreat has spacious rooms. Other facilities include air conditioning, non-smoking rooms, linens and towels.</p>

<p>It is a 10-minute drive or a 25-minute walk from the property to Horseshoe Falls and Marineland. Niagara Fallsview Casino Resort is 1.9 km from the property.</p>

<p>The property has onsite parking, which is free. WiFi is available in all areas of the house and is also free.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are allowed, though charges may apply.</li>
        <li>All children are welcome.</li>
        <li>Extra beds cannot be accommodated.</li>
        </ul>
        
        <p>To know more about Luxurious Executive Family Retreat, pricing and availability, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/luxurious-executive-family-retreat.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
