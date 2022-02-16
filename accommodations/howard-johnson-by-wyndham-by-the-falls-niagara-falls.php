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
<meta name="description" content="Great location; short walk to Niagara Falls, casinos, restaurants, waterparks, shopping and more! Has nonsmoking rooms, free WiFi, paid parking, onsite ATM, and other services. Family friendly hotel."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/howard-johnson-by-wyndham-by-the-falls-niagara-falls" />
<title>Howard Johnson by Wyndham by the Falls Niagara Falls – Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/howard-johnson-by-wyndham-by-the-falls-niagara-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Howard Johnson by Wyndham by the Falls Niagara Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 5905 Victoria Avenue, Niagara Falls, ON L2G 3L8</h3>
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
        <h2>Howard Johnson by Wyndham by the Falls Niagara Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5905 Victoria Avenue, Niagara Falls, ON L2G 3L8</address>
         <p>Located in the centre of Niagara Falls, Canada and a 20-minute walk to the famous Falls, Howard Johnson Hotel by Wyndham by the Falls Niagara Falls has spacious and clean rooms and family suites.</p>

<p>Guest rooms have free WiFi, a safe, TV, coffee maker, mini fridge, hairdryer and ironing facilities. Some of the rooms have a jacuzzi.</p>

<p>Howard Johnson Hotel by Wyndham by the Falls has both an indoor and outdoor swimming pool. There is also a hot tub/sauna.</p>

<p>There are four onsite eatery options available for guests – Denny's, Pizza Hut, Baskin Robbins, and KFC.</p>

<p>The hotel offers many amenities for a comfortable stay. It has an onsite ATM, fitness centre, vending machines, daily housekeeping, laundry & dry cleaning services, shuttle service, disabled access and more.</p>

<p>The hotel is located in the centre of Clifton Hill tourist area, so attractions like Niagara SkyWheel, Casino Niagara, and Hornblower Niagara Cruises are all within 10-15 minutes' walking distance.</p>

<p>Skylon Tower is 0.4 km and Horseshoe Falls is 1.2 km from the hotel.</p>

<p>Howard Johnson Hotel by Wyndham by the Falls Niagara Falls offers great prices and a great location! Staff is friendly and helpful.</p>

        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Up to 2 children under 16 years are allowed to stay free of charge when using existing beds.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
		<p>For more details regarding Howard Johnson Hotel by Wyndham by the Falls Niagara Falls, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/hj-by-the-falls-niagara-falls-ontario.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
