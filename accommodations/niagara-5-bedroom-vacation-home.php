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
<meta name="description" content="Two-storied house with 5 bedrooms, free WiFi, free parking, sleeps 16 guests. A short drive to all tourists sights in Niagara Falls, Canada."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-5-bedroom-vacation-home" />
<title>Niagara 5 Bedroom Vacation Home – Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-5-bedroom-vacation-home.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara 5 Bedroom Vacation Home</h2>
    <h3><i class="fa fa-map-marker"></i> 4779 Zimmerman Avenue, Niagara Falls, ON L2E 3M8</h3>
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
        <h2>Niagara 5 Bedroom Vacation Home</h2>
        <address><i class="fa fa-map-marker"></i> 4779 Zimmerman Avenue, Niagara Falls, ON L2E 3M8</address>
         <p>Niagara 5 Bedroom Vacation Home is about 0.5 km from Greyhoud Canada, Amtrack/Via Train Station, Whirlpool State Park and Niagara Gorge Trail. Niagara Falls and other attractions are a 10-minute drive from the vacation home.</p>

<p>The property is located in the main part of Niagara Falls, Canada, in a lovely neighbourhood. Skylon Tower is about 2.5 km while Niagara Falls is around 3 km from the house.</p>

<p>Free WiFi is available throughout the house. There is a living room with TV, dining area and 5 bedrooms. The property is nonsmoking, ideal for families or a large group.</p>

<p>There are many restaurants and supermarkets in the area.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>One child below 12 years is charged per night when using existing beds.</li>
        <li>Guests have exclusive use of the main part of the house, but the owner lives in a separate part of the property.</li>
        </ul>
        
        <p>For more details regarding pricing and booking of this property, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-5-bedroom-villa.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
