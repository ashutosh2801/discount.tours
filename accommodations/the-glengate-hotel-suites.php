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
<meta name="description" content="Affordable accommodations with free WiFi, parking and daily breakfast. Short drive to Niagara Falls, 20-minute walk to Clifton Hill & other attractions."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/the-glengate-hotel-suites" />
<title>The Glengate Hotel & Suites | Niagara Falls Canada Hotels |ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/the-glengate-hotel-suites.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>The Glengate Hotel & Suites</h2>
    <h3><i class="fa fa-map-marker"></i> 5534 Stanley Avenue, Niagara Falls, ON L2G 3X2</h3>
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
        <h2>The Glengate Hotel & Suites</h2>
        <address><i class="fa fa-map-marker"></i> 5534 Stanley Avenue, Niagara Falls, ON L2G 3X2</address>
         <p>With clean rooms and well-maintained property, Glengate Hotel & Suites is a safe and affordable place for visitors to Niagara Falls, Canada.</p>

<p>It is within walking distance from Clifton Hill, Skylon Tower and Hornblower Niagara Cruises. Niagara Falls is a short drive (1.8 km) from the hotel.</p>

<p>All guest rooms are nonsmoking and feature flat-screen TVs and a sitting area. Some of the rooms have an in-room spa bath.</p>

<p>Continental breakfast is served in the dining area every morning from 7:00 am to 10:00 am. There are many restaurants within 10-15 minutes walking distance from the hotel.</p>

<p>In addition to low-priced rooms, the hotel also provides its guests free onsite parking and free WiFi in all areas of the hotel.</p>

<p>Other amenities provided include daily housekeeping, vending machine, and onsite ATM.</p>

<p>The staff is courteous and helpful in suggesting restaurants and tourist sights.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Additional children or adults are charged per night when using existing or extra beds.</li>
        <li>Maximum number of extra beds in a room is 1.</li>
        </ul>
        
        <p>Please click on the button provided below for more details on The Glengate Hotel & Suites.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/glengate.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
