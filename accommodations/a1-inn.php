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
<meta name="description" content="This family friendly inn in Lundy's Lane has an outdoor swimming pool, barbecue facilities and playground for children. Free WiFi, parking, morning coffee!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-airplane-tours" />
<title>A1 Inn – Affordable Accommodations in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/a1_inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>A1 Inn </h2>
    <h3><i class="	fa fa-map-marker"></i> 7895 Lundy's Lane, Niagara Falls, ON L2H 1H3</h3>
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
        <h2>A1 Inn</h2>
        <address><i class="fa fa-map-marker"></i> 7895 Lundy's Lane, Niagara Falls, ON L2H 1H3</address>
         <p>The A1 Inn is popular with families vacationing in Niagara Falls, Ontario, as it offers comfortable accommodations with free 
parking and a playground for children.</p>

<p>The rooms are provided with a mini fridge, microwave, TV, free Wi-Fi and private bathrooms. Some of the rooms also have a sitting area where guests can relax.</p>

<p>The inn has a garden, free parking area, barbecue and an outdoor swimming pool. There are many restaurants in the area, and the Falls area is just a short drive away.</p>

<p>The seasonal Red Line WEGO shuttle bus to the Falls stops near the A1 Inn.</p>

		<h3><i class="fa fa-star"></i> Facilities at A1 Inn</h3>
        <ul class="facilities2">
        <li>Free parking</li>
        <li>Free Wi-Fi</li>
        <li>Swimming pool</li>
        <li>Barbecue grills</li>
        <li>Playground</li>
        <li>Family suites</li>
        <li>Free morning coffee</li>
        </ul>
        
        <h3><i class="fa fa-cubes"></i> Rooms and Amenities</h3>
        <ul class="facilities">
        <li>Rooms with 1 queen bed</li>
        <li>Rooms with 2 queen beds</li>
        <li>Family suites with 3 queen beds and sitting area</li>
        <li>All rooms have a TV, mini fridge, microwave, air conditioning and heating, and private bathrooms</li>
        </ul>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets not allowed.</li>
        <li>All children are welcome.</li>
        <li>Additional children are charged per night when using existing or extra beds.</li>
        <li>One extra bed can be allowed in a room.</li>
        </ul>
        
        <p>Very moderately priced and designed for families!</p>
		<p>Please click on the button below for more details about A1 Inn.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/a1-motel.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
