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
<link rel="canonical" href="<?=SITEURL;?>/fantasy-holidays-sweet-honeywell" />
<title>Fantasy Holidays Sweet Honeywell – Niagara Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/fantasy-holidays-sweet-honeywell.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Fantasy Holidays Sweet Honeywell</h2>
    <h3><i class="fa fa-map-marker"></i> 7763 Hanniwell Street, Niagara Falls, ON L2G 0H5</h3>
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
        <h2>Fantasy Holidays Sweet Honeywell</h2>
        <address><i class="fa fa-map-marker"></i> 7763 Hanniwell Street, Niagara Falls, ON L2G 0H5</address>
         <p>Fantasy Holidays Sweet Honeywell is an independent/detached house with onsite parking space that is free for guests. The house has a spacious living room with a flat-screen TV, kitchen, dining area, 3 bedrooms, and bathrooms.</p>

<p>This vacation home has added amenities like washing machine, dishwasher, kitchen appliances, fridge, ironing facilities, hot tub, and WiFi – all at no extra cost.</p>

<p>Niagara Falls viewing area is about 3 km from the property; most of the attractions are a short drive away. Niagara Fallsview Casino Resort is 2.6 km from the home.</p>

<p>Families will love this property. Kids can have their own rooms and the family can gather together in the living room or dining area.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>All children under 12 years stay free of charge.</li>
        <li>Any additional older children or adults are charged CAD 50 per night for extra beds.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
        <p>For more details regarding Fantasy Holidays Sweet Honeywell, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/fantasy-holidays-sweet-honeywell.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
