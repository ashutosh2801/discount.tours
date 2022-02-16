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
<meta name="description" content="A 2-bedroom house with private parking, playground and free WiFi. Includes a kitchen, dining and living rooms. Short drive from the Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/cozy-vacation-home" />
<title>Cozy Vacation Home, Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/cozy-vacation-home.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Cozy Vacation Home</h2>
    <h3><i class="fa fa-map-marker"></i> 4112 Martin Avenue, Niagara Falls, ON L2E 3K9</h3>
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
        <h2>Cozy Vacation Home</h2>
        <address><i class="fa fa-map-marker"></i> 4112 Martin Avenue, Niagara Falls, ON L2E 3K9</address>
         <p>This lovely home is a 10-minute drive from the Falls area and 15-20 minutes' walk from Whirlpool Aero Car and Niagara Helicopters.</p>

<p>The place is perfect for couples or families. The house has a spacious living room, dining room, kitchen, bathroom, front garden and a big backyard with patio and outdoor furniture.</p>

<p>Guests driving in can use the parking space on the property for free. There is free WiFi too.</p>

<p>Other facilities include washer/dryer, air conditioning and heating. After a day of sightseeing, guests can stay in and prepare meals in the kitchen. There is a TV in the living room.</p>

<p>This is a pet friendly house and guests are welcome to bring along their pets (charges may apply). All the areas are nonsmoking.</p>

<p>There are 2 bedrooms and the house can accommodate 7 persons. The quiet neighbourhood makes it a great place to stay.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are allowed on request, but charges may apply.</li>
        <li>There is no charge for extra beds.</li>
        <li>Children are welcome.</li>
        </ul>
        
        <p>Please click on the button provided below to know about availability and pricing.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/cozy-vacation-home.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
