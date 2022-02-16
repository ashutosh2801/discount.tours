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
<meta name="description" content="Stay at Holiday Inn Niagara Falls for a comfortable vacation. Free parking and free WiFi, onsite restaurants, proximity to many attractions and great service are some of the hotel's advantages."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/holiday-inn-niagara-falls" />
<title>Holiday Inn Niagara Falls – by the Falls | Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/holiday-inn-niagara-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Holiday Inn Niagara Falls – by the Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 5339 Murray Street, Niagara Falls, ON L2G 2J3</h3>
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
        <h2>Holiday Inn Niagara Falls – by the Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5339 Murray Street, Niagara Falls, ON L2G 2J3</address>
         <p>Located just 15 minutes' walking distance from Horseshoe Falls and Skylon Tower, Holiday Inn Niagara Falls has rooms for every type of guest – honeymooners, couples, single or group travellers, corporate travellers and families.</p>

<p>The hotel has large rooms and suites with a flat-screen TV, ironing facilities, coffee maker and ensuite bathroom with toiletries and hairdryer. Some of the rooms have a spa bath.</p>

<p>It takes 15-20 minutes to walk to Queen Victoria Park and Clifton Hill from the hotel.</p>

<p>The hotel has many modern amenities – an indoor and outdoor pool, fitness centre, onsite ATM, restaurants, room service, daily housekeeping, gift shop and more.</p>

<p>Coco Terrace Steakhouse and Mr. Coco's Pizza Bar and Lounge are the two onsite dining options and are open for breakfast, lunch and dinner. Room service is available at a surcharge.</p>

<p>Guests love the many services the hotel provides.</p>

        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Additional children under 18 years stay free of charge when using existing beds.</li>
        <li>Children 18 years or above and adults are charged per person per night when using existing beds.</li>
        <li>There is no space for extra beds in rooms.</li>
        </ul>
        
		<p>To see the types of rooms available, pricing and other details, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/holiday-inn-niagara-falls-by-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
