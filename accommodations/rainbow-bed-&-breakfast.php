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
<meta name="description" content="Comfortable rooms at great rates, free parking and WiFi. Just 1.1 km from American Falls, rooms have a TV, radio, private entrance. Enjoy great breakfast every morning."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/rainbow-bed-&-breakfast" />
<title>Rainbow Bed & Breakfast | Niagara Falls Canada B&Bs | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/rainbow-bed-&-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Rainbow Bed & Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 4436 John Street, Niagara Falls, ON L2E 1A5</h3>
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
        <h2>Rainbow Bed & Breakfast </h2>
        <address><i class="fa fa-map-marker"></i> 4436 John Street, Niagara Falls, ON L2E 1A5</address>
         <p>With a location that is close to all attractions, Rainbow Bed & Breakfast in Niagara Falls, Canada, is a great place to stay.</p>

<p>The B&B features clean rooms with TV, radio and telephone; spacious balconies; breakfast; free parking, and free WiFi.</p>

<p>Freshly cooked breakfast is served in the dining area every morning. Owners prepare breakfast keeping in mind guests' preferences and dietary restrictions. The kitchen is open during the day for guests to use.</p>

<p>The closest attraction is Bird Kingdom at 0.2 km. Clifton Hill, Fallsview area and Hornblower Niagara Cruises are all within walking distance.</p>

<p>The B&B is 1.1 km from American Falls and 1.8 km from Horseshoe Falls.</p>

<p>Guests can have a good's night rest at the Rainbow Bed & Breakfast after a busy day of sightseeing. The surroundings are peaceful and the beds are comfortable.</p>

<p>The rooms are very affordable.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Extra guests are charged per night when using existing or extra beds.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>Please click on the button below for more information on Rainbow Bed & Breakfast.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/rainbow-bed.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
