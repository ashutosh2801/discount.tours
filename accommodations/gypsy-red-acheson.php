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
<meta name="description" content="Have a fun family vacation at Fantasy Holidays Sweet Honeywell, a 3 bedroom home in Niagara Falls, Canada. Kitchen, free parking, free WiFi. Sleeps 6 persons. A 10-minute drive from tourist attractions."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/gypsy-red-acheson" />
<title>Fantasy Holidays Sweet Honeywell – Niagara Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/gypsy-red-acheson.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Gypsy Red Acheson</h2>
    <h3><i class="fa fa-map-marker"></i> 4083 Acheson Avenue, Niagara Falls, ON L2E 3L8</h3>
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
        <h2>Gypsy Red Acheson</h2>
        <address><i class="fa fa-map-marker"></i> 4083 Acheson Avenue, Niagara Falls, ON L2E 3L8</address>
         <p>This 2-bedroom apartment is in a quiet neighbourhood that is just 0.5 km from Whirlpool Aero Car. The free onsite parking is an added bonus as most hotels in the Fallsview area charge guests for parking.</p>

<p>The property has a living area with flat-screen TV, a fully equipped kitchen, dining area, 2 bedrooms and a bathroom. The property has a nice backyard with patio and outdoor furniture and BBQ facilities.</p>

<p>Free WiFi is available in all areas of the house.</p>

<p>Niagara Falls is just a 10-minute drive from the property.</p>

<p>Guests can visit the nearby Great Wolf Lodge (just 100 metres away) for some fun time at the resort's water park and other activities.</p>

<p>Have a comfortable stay in Niagara Falls, Canada, by booking this property.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Only 1 extra bed is allowed per room.</li>
        </ul>
        
        <p>For more information on Gypsy Red Acheson, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/gypsy-red-acheson.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
