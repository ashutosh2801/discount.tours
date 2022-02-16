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
<meta name="description" content="Clean, comfortable rooms with TV, coffee maker, fridge and free WiFi. Quality Inn and Suites is about 1.6 km from the Falls and even closer to other sights."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/quality-inn-and-suites" />
<title>Quality Inn and Suites | Niagara Falls Canada Hotels |ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/quality-inn-and-suites.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Quality Inn and Suites</h2>
    <h3><i class="fa fa-map-marker"></i> 5234 Ferry Street, Niagara Falls, ON L2G 1R5</h3>
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
        <h2>Quality Inn and Suites</h2>
        <address><i class="fa fa-map-marker"></i> 5234 Ferry Street, Niagara Falls, ON L2G 1R5</address>
         <p>Quality Inn and Suites is located about 1.6 km from Horseshoe Falls and 0.9 km from American Falls. It is a well-maintained property with amenities like free WiFi in all areas, paid onsite parking, onsite restaurant, indoor pool, sauna, whirlpool, and a fitness centre.</p>

<p>The guest rooms are clean, with comfortable beds, a TV, coffee maker, and refrigerator.</p>

<p>It is just a 4-minute walk to the Greg Frewin Theatre from the hotel. Clifton Hill, which has a lot of amusement activities for kids and families, is just 0.5 km from the hotel.</p>

<p>Continental breakfast is available every morning and is served in the breakfast lounge.</p>

<p>With friendly staff, wonderful amenities, closeness to Falls and other attractions, and comfortable rooms, Quality Inn and Suites is the best place to stay for families, business travelers and couples.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>There are extra charges for extra guests and extra beds.</li>
        <li>Only 1 extra bed is allowed per room.</li>
        </ul>
        
        <p>For more information on Quality Inn and Suites, room availability and to make a booking, please click the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/lodge-inn-suites.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
