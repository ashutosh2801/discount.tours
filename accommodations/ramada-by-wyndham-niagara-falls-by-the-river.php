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
<meta name="description" content="Overlooking Niagara Gorge, the hotel has affordable, clean rooms 4 km from Horseshoe Falls, free WiFi. Close to Whirlpool State Park."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/ramada-by-wyndham-niagara-falls-by-the-river" />
<title>Ramada by Wyndham Niagara Falls by the River | Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/ramada-by-wyndham-niagara-falls-by-the-river.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Ramada by Wyndham Niagara Falls by the River</h2>
    <h3><i class="fa fa-map-marker"></i> 4357 River Road, Niagara Falls, ON L2E 3E8</h3>
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
        <h2>Ramada by Wyndham Niagara Falls by the River</h2>
        <address><i class="fa fa-map-marker"></i> 4357 River Road, Niagara Falls, ON L2E 3E8</address>
         <p>Located 0.8 km from Whirlpool State Park and overlooking Niagara River Gorge, Ramada by Wyndham Niagara Falls by the River in Ontario, Canada, is both affordable and clean.</p>

<p>Places within walking distance are Devil's Hole State Park, Whirlpool Aero Car and Niagara Helicopters.</p>

<p>Niagara Falls and other attractions are a short drive from the hotel.</p>

<p>Guest rooms are clean and include a TV, work desk, coffee maker and ironing facilities.</p>

<p>Other facilities include a gym, business centre, indoor pool, an onsite IHOP restaurant, vending machines, onsite ATM, free WiFi and paid onsite parking.</p>

<p>Families and couples will like the hotel. It is well maintained, clean, has modern facilities, comfortable beds and friendly staff. Couples can book a room with a jacuzzi.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>All children and adults are charged per night for extra beds.</li>
        <li>One extra bed is permitted per room.</li>
        </ul>
        
        <p>For more details and to make a booking at Ramada by Wyndham Niagara Falls by the River, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/ramada-niagara-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
