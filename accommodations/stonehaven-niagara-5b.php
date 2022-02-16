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
<meta name="description" content="5-bedroom vacation home with free parking, free WiFi, kitchen with dining area, washer/dryer. Sleeps 12. A 10-minute drive to Niagara Falls, other attractions."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/stonehaven-niagara-5b" />
<title>Stonehaven Niagara 5B – Vacation Rentals in Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/stonehaven-niagara-5b.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Stonehaven Niagara 5B</h2>
    <h3><i class="fa fa-map-marker"></i> Cropp Street, Niagara Falls, ON L2E 5J8</h3>
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
        <h2>Stonehaven Niagara 5B</h2>
        <address><i class="fa fa-map-marker"></i> Cropp Street, Niagara Falls, ON L2E 5J8</address>
         <p>Located very close to Canada One Factory Outlet and Lundy's Lane Cemetery (1.7 km), Stonehaven Niagara 5B is a spacious vacation home offering many amenities.</p>

<p>Relax in the home's big living room watching TV, prepare your own meals in the fully equipped kitchen and dine together at the dining table.</p>

<p>With 5 bedrooms, children and adults can have their own bedrooms and enjoy privacy. The house also has a washing machine and dryer; this is a feature that guests really appreciate as hotels charge you for any laundry services.</p>

<p>This property is a newer modern home with new furniture and furnishings. It is clean and comfortable.</p>

<p>Niagara Falls and other attractions are just a 10-15 minute drive from the property. There are restaurants too nearby.</p>

<p>Free WiFi is available in all areas of the house. There are flat-screen TVs in the living room and some bedrooms. Free private parking is available onsite.</p>

<p>You can bring along your family and friends to the very affordable Stonehaven Niagara 5B for a great vacation in Niagara Falls, Canada.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are allowed on request (charges may apply).</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
        <p>Please click on the button below for more information on Stonehaven Niagara 5B, a vacation rental home in Niagara Falls, Canada.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/stonehaven-niagara-5b.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
